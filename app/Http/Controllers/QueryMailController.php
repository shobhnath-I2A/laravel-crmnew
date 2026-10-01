<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmailLog;
use App\Models\Query;
use App\Services\MailService;
use Illuminate\Support\Facades\Mail;

class QueryMailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $query = Query::findOrFail($request->query_id);

        return view('mails.compose-mail', [
            'queryId' => $query->id,
            'email' => $query->email,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->filled('supplier_id')) {
            abort_unless(auth()->user()->canView('Supplier'), 403);
            $request->validate(['supplier_id' => 'required|integer|exists:suppliers,id']);
            $supplier = \App\Models\Supplier::where('status', 1)->findOrFail($request->supplier_id);
            $request->merge(['to' => $supplier->email]);
        }
        $request->validate([
            'query_id' => 'required|exists:queries,id',
            'to' => 'required|email',
            'cc' => 'nullable|string',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'attachment' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx,xls,xlsx,txt,csv|max:10240',
        ]);


        if ($request->filled('cc')) {
            validator(['cc' => array_map('trim', explode(',', $request->cc))], ['cc' => 'array|max:20', 'cc.*' => 'required|email'])->validate();
        }
        if ($request->filled('supplier_id')) { $request->merge(['message' => nl2br(e($request->message))]); }
        $attachmentPath = null;

        if ($request->hasFile('attachment')) {
            $attachmentPath = $request->file('attachment')
                ->store('private-mail', 'local');
            abort_unless($attachmentPath, 500, 'Attachment could not be stored.');
        }

        try {
        $emailLog = EmailLog::create([
            'query_id' => $request->query_id,
            'from_email' => config('mail.from.address'),
            'to_email' => $request->to,
            'cc' => $request->cc,
            'subject' => $request->subject,
            'message' => $request->message,
            'attachment' => $attachmentPath,
            'status' => 'pending',
            'created_by' => auth()->id(),
        ]);
        } catch (\Throwable $e) {
            if ($attachmentPath) { \Illuminate\Support\Facades\Storage::disk('local')->delete($attachmentPath); }
            throw $e;
        }
        $sent = false;

        try {
            $sent = \App\Services\MailService::sendMail(
                $request->to,
                $request->subject,
                $request->message,
                $request->cc,
                $attachmentPath ? \Illuminate\Support\Facades\Storage::disk('local')->path($attachmentPath) : null
            );

            if (!$sent) {
                $emailLog->update([
                    'status' => 'failed',
                    'error_message' => 'MailService returned false',
                ]);

                return back()->with('error', 'Mail sending failed.');
            }

            \Illuminate\Support\Facades\DB::transaction(function () use ($emailLog) {
            $emailLog->update([
                'from_email' => config('mail.from.address'),
                'status' => 'sent',
            ]);
            \App\Services\QueryHistory::record($emailLog->query_id, 'mail_sent', 'Email #'.$emailLog->id.' sent', $emailLog->subject);
            });

            return back()->with('success', 'Mail sent successfully.');
        } catch (\Exception $e) {
            if ($sent) {
                report($e);
                return back()->with('error', 'SMTP accepted the email, but its history could not be updated. Do not resend without checking delivery.');
            }
            $emailLog->update([
                'status' => 'failed',
                'error_message' => $e->getMessage(),
            ]);

            report($e);
            return back()->with('error', 'Mail sending failed.');
        }
    }











    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    }
}
