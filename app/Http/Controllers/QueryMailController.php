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
        //
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
        $request->validate([
            'query_id' => 'required|exists:queries,id',
            'to' => 'required|email',
            'cc' => 'nullable|string',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'attachment' => 'nullable|file|max:10240',
        ]);


        // dd($request);
        $attachmentPath = null;

        if ($request->hasFile('attachment')) {
            $attachmentPath = $request->file('attachment')
                ->store('email-attachments', 'public');
        }

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

        try {
            $sent = \App\Services\MailService::sendMail(
                $request->to,
                $request->subject,
                $request->message,
                $request->cc,
                $attachmentPath ? storage_path('app/public/' . $attachmentPath) : null
            );

            if (!$sent) {
                $emailLog->update([
                    'status' => 'failed',
                    'error_message' => 'MailService returned false',
                ]);

                return back()->with('error', 'Mail sending failed.');
            }

            $emailLog->update([
                'from_email' => config('mail.from.address'),
                'status' => 'sent',
            ]);

            return back()->with('success', 'Mail sent successfully.');
        } catch (\Exception $e) {
            $emailLog->update([
                'status' => 'failed',
                'error_message' => $e->getMessage(),
            ]);

            return back()->with('error', $e->getMessage());
        }
    }
    // public function store(Request $request)
    // {
    //     // dd($request->all());
    //     $request->validate([
    //         'query_id' => 'required|exists:queries,id',
    //         'to' => 'required|email',
    //         'cc' => 'nullable|string',
    //         'subject' => 'required|string|max:255',
    //         'message' => 'required|string',
    //         'attachment' => 'nullable|file|max:10240',
    //     ]);

    //     if (!MailService::configure()) {
    //         return back()->with('error', 'SMTP configuration failed.');
    //     }

    //     $attachmentPath = null;

    //     if ($request->hasFile('attachment')) {
    //         $attachmentPath = $request->file('attachment')
    //             ->store('email-attachments', 'public');
    //     }

    //     $emailLog = EmailLog::create([
    //         'query_id' => $request->query_id,
    //         'from_email' => config('mail.from.address'),
    //         'to_email' => $request->to,
    //         'cc' => $request->cc,
    //         'subject' => $request->subject,
    //         'message' => $request->message,
    //         'attachment' => $attachmentPath,
    //         'status' => 'pending',
    //         'created_by' => auth()->id(),
    //     ]);

    //     try {
    //         Mail::send([], [], function ($mail) use ($request, $attachmentPath) {
    //             $mail->from(config('mail.from.address'), config('mail.from.name'))
    //                 ->to($request->to)
    //                 ->subject($request->subject)
    //                 ->html($request->message);

    //             if ($request->filled('cc')) {
    //                 $ccEmails = array_filter(array_map('trim', explode(',', $request->cc)));
    //                 $mail->cc($ccEmails);
    //             }

    //             if ($attachmentPath) {
    //                 $mail->attach(storage_path('app/public/' . $attachmentPath));
    //             }
    //         });

    //         $emailLog->update([
    //             'status' => 'sent',
    //         ]);

    //         return back()->with('success', 'Mail sent successfully.');
    //     } catch (\Exception $e) {
    //         $emailLog->update([
    //             'status' => 'failed',
    //             'error_message' => $e->getMessage(),
    //         ]);

    //         return back()->with('error', $e->getMessage());
    //     }
    // }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
