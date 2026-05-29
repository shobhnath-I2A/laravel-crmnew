<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SmtpSetting;
class SmtpSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countryCode = auth()->user()->country_code ?? auth()->user()->userCountry ?? config('crm.default_country_code');
        $smtpSetting = SmtpSetting::where('country_code', $countryCode)->first();
        return view('setting.smtp-settings.index', compact('smtpSetting', 'countryCode'));
    }
    /**
     * Show the form for creating a new resource.
     */
     public function create()
    {
        return view('setting.smtp-settings.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'from_name' => 'required|string|max:100',
            'email_account' => 'required|email|max:255',
            'email_password' => 'required|string',
            'smtp_server' => 'required|string|max:255',
            'email_port' => 'required|integer|min:1|max:65535',
            'security_type' => 'required|in:none,ssl,tls',
            'status' => 'nullable|boolean',
        ]);

        SmtpSetting::create([
            'from_name' => $request->from_name,
            'email_account' => $request->email_account,
            'email_password' => $request->email_password,
            'smtp_server' => $request->smtp_server,
            'email_port' => $request->email_port,
            'security_type' => $request->security_type,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        return redirect()->route('smtp-setting.index')
            ->with('success', 'SMTP setting saved successfully.');
    }

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
    public function edit(SmtpSetting $smtpSetting)
    {

        return view('setting.smtp-settings.index', compact('smtpSetting'));
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, SmtpSetting $smtpSetting)
    {
        $request->validate([
            'from_name' => 'required|string|max:100',
            'email_account' => 'required|email|max:255',
            'email_password' => 'nullable|string',
            'smtp_server' => 'required|string|max:255',
            'email_port' => 'required|integer|min:1|max:65535',
            'security_type' => 'required|in:none,ssl,tls',
            'status' => 'nullable|boolean',
        ]);

        $data = [
            'from_name' => $request->from_name,
            'email_account' => $request->email_account,
            'smtp_server' => $request->smtp_server,
            'email_port' => $request->email_port,
            'security_type' => $request->security_type,
            'status' => $request->has('status') ? 1 : 0,
        ];

        if (!empty($request->email_password)) {
            $data['email_password'] = $request->email_password;
        }

        $smtpSetting->update($data);

        return redirect()->route('smtp-setting.index')
            ->with('success', 'SMTP setting updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
     public function destroy(SmtpSetting $smtpSetting)
    {
        $smtpSetting->delete();

        return redirect()->route('smtp-setting.index')
            ->with('success', 'SMTP setting deleted successfully.');
    }
}
