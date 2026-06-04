1. User fills form
   - Name
   - Email
   - WhatsApp number
   - Required details

2. Submit form
   - Save lead in CRM
   - Status: form_submitted

3. Generate PDF
   - Create PDF from lead data
   - Save PDF in storage
   - Status: pdf_generated

4. Send WhatsApp message
   - First message should not send PDF directly
   - Ask confirmation / consent first

5. Chatbot asks questions
   Example:
   “Please confirm:
   1. I accept Terms & Conditions
   2. I do not accept”

6. User accepts Terms & Conditions
   - Save acceptance time
   - Save WhatsApp reply
   - Status: terms_accepted

7. PDF shared on WhatsApp
   - Send PDF link or document
   - Status: pdf_sent_whatsapp

8. CRM status updated
   Final status:
   completed




Form submit
↓
Generate PDF
↓
Save PDF public URL
↓
Send WhatsApp template message asking consent
↓
User replies / clicks button
↓
Webhook receives response
↓
If accepted, send PDF document
↓
Update CRM status



WHATSAPP_PHONE_NUMBER_ID=xxxxxxxxxxxx
WHATSAPP_ACCESS_TOKEN=EAAGxxxxxxxx
WHATSAPP_VERIFY_TOKEN=my_secure_token



https://graph.facebook.com/v20.0/{PHONE_NUMBER_ID}/messages


public function sendWhatsAppText($phone, $message)
{
    $url = 'https://graph.facebook.com/v20.0/' . env('WHATSAPP_PHONE_NUMBER_ID') . '/messages';

    $payload = [
        'messaging_product' => 'whatsapp',
        'to' => $phone,
        'type' => 'text',
        'text' => [
            'body' => $message
        ]
    ];

    return Http::withToken(env('WHATSAPP_ACCESS_TOKEN'))
        ->post($url, $payload)
        ->json();
}


public function sendWhatsAppPdf($phone, $pdfUrl)
{
    $url = 'https://graph.facebook.com/v20.0/' . env('WHATSAPP_PHONE_NUMBER_ID') . '/messages';

    $payload = [
        'messaging_product' => 'whatsapp',
        'to' => $phone,
        'type' => 'document',
        'document' => [
            'link' => $pdfUrl,
            'filename' => 'document.pdf'
        ]
    ];

    return Http::withToken(env('WHATSAPP_ACCESS_TOKEN'))
        ->post($url, $payload)
        ->json();
}

Webhook route:

Route::get('/webhook/whatsapp', [WhatsAppWebhookController::class, 'verify']);
Route::post('/webhook/whatsapp', [WhatsAppWebhookController::class, 'receive']);



Below is a production-level Laravel structure for WhatsApp Business Cloud API.

1. .env

WHATSAPP_API_VERSION=v20.0
WHATSAPP_PHONE_NUMBER_ID=123456789
WHATSAPP_ACCESS_TOKEN=EAAGxxxx
WHATSAPP_VERIFY_TOKEN=my_secure_verify_token
WHATSAPP_DEFAULT_COUNTRY_CODE=91
APP_URL=https://yourdomain.com


2. config/services.php  

'whatsapp' => [
    'api_version' => env('WHATSAPP_API_VERSION', 'v20.0'),
    'phone_number_id' => env('WHATSAPP_PHONE_NUMBER_ID'),
    'access_token' => env('WHATSAPP_ACCESS_TOKEN'),
    'verify_token' => env('WHATSAPP_VERIFY_TOKEN'),
    'default_country_code' => env('WHATSAPP_DEFAULT_COUNTRY_CODE', '91'),
],

3. Migration fields

Schema::table('leads', function (Blueprint $table) {
    $table->string('whatsapp_number', 20)->nullable();
    $table->string('pdf_path')->nullable();

    $table->string('whatsapp_status')->default('pending');
    $table->string('chatbot_status')->default('not_started');
    $table->string('final_status')->default('form_submitted');

    $table->boolean('terms_accepted')->default(false);
    $table->timestamp('terms_accepted_at')->nullable();

    $table->json('whatsapp_last_response')->nullable();
});

4. Routes

use App\Http\Controllers\LeadFormController;
use App\Http\Controllers\WhatsAppWebhookController;

Route::post('/lead-submit', [LeadFormController::class, 'submit'])
    ->name('lead.submit');

Route::get('/webhook/whatsapp', [WhatsAppWebhookController::class, 'verify']);
Route::post('/webhook/whatsapp', [WhatsAppWebhookController::class, 'receive']);


5. WhatsApp Service
app/Services/WhatsAppService.php

<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WhatsAppService
{
    protected string $baseUrl;

    public function __construct()
    {
        $this->baseUrl = 'https://graph.facebook.com/'
            . config('services.whatsapp.api_version')
            . '/'
            . config('services.whatsapp.phone_number_id')
            . '/messages';
    }

    public function sendText(string $phone, string $message): array
    {
        return $this->send([
            'messaging_product' => 'whatsapp',
            'to' => $this->formatPhone($phone),
            'type' => 'text',
            'text' => [
                'preview_url' => false,
                'body' => $message,
            ],
        ]);
    }

    public function sendPdf(string $phone, string $pdfUrl, string $filename = 'document.pdf'): array
    {
        return $this->send([
            'messaging_product' => 'whatsapp',
            'to' => $this->formatPhone($phone),
            'type' => 'document',
            'document' => [
                'link' => $pdfUrl,
                'filename' => $filename,
            ],
        ]);
    }

    public function sendConsentQuestion(string $phone, string $leadCode): array
    {
        $message = "Thank you for submitting your form.\n\n"
            . "Before we share your PDF, please confirm:\n\n"
            . "Reply YES to accept Terms & Conditions.\n"
            . "Reply NO to cancel.\n\n"
            . "Lead Ref: {$leadCode}";

        return $this->sendText($phone, $message);
    }

    private function send(array $payload): array
    {
        try {
            $response = Http::withToken(config('services.whatsapp.access_token'))
                ->timeout(20)
                ->retry(2, 1000)
                ->post($this->baseUrl, $payload);

            if (!$response->successful()) {
                Log::error('WhatsApp API Error', [
                    'status' => $response->status(),
                    'body' => $response->json(),
                    'payload' => $payload,
                ]);
            }

            return [
                'success' => $response->successful(),
                'status' => $response->status(),
                'data' => $response->json(),
            ];

        } catch (\Throwable $e) {
            Log::error('WhatsApp API Exception', [
                'message' => $e->getMessage(),
                'payload' => $payload,
            ]);

            return [
                'success' => false,
                'status' => 500,
                'data' => [
                    'error' => $e->getMessage(),
                ],
            ];
        }
    }

    public function formatPhone(string $phone): string
    {
        $phone = preg_replace('/[^0-9]/', '', $phone);

        if (strlen($phone) === 10) {
            return config('services.whatsapp.default_country_code') . $phone;
        }

        return $phone;
    }
}


6. Lead submit controller

<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Services\WhatsAppService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class LeadFormController extends Controller
{
    public function submit(Request $request, WhatsAppService $whatsapp)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:150',
            'email' => 'required|email|max:150',
            'phone' => 'required|string|max:20',
        ]);

        $lead = Lead::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'whatsapp_number' => $validated['phone'],
            'final_status' => 'form_submitted',
            'whatsapp_status' => 'pending',
            'chatbot_status' => 'not_started',
        ]);

        $pdf = Pdf::loadView('pdf.lead', compact('lead'));

        $pdfPath = 'lead-pdfs/lead-' . $lead->id . '.pdf';
        Storage::disk('public')->put($pdfPath, $pdf->output());

        $lead->update([
            'pdf_path' => $pdfPath,
            'final_status' => 'pdf_generated',
        ]);

        // Optional email
        // Mail::to($lead->email)->send(new LeadPdfMail($lead));

        $response = $whatsapp->sendConsentQuestion(
            $lead->whatsapp_number,
            'LEAD-' . $lead->id
        );

        $lead->update([
            'whatsapp_status' => $response['success'] ? 'consent_question_sent' : 'failed',
            'chatbot_status' => $response['success'] ? 'waiting_for_terms' : 'failed',
            'final_status' => $response['success'] ? 'waiting_for_terms' : 'whatsapp_failed',
            'whatsapp_last_response' => $response,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Form submitted successfully. Consent message sent on WhatsApp.',
            'lead_id' => $lead->id,
        ]);
    }
}


7. WhatsApp webhook controller

<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Services\WhatsAppService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class WhatsAppWebhookController extends Controller
{
    public function verify(Request $request)
    {
        $mode = $request->query('hub_mode') ?? $request->query('hub.mode');
        $token = $request->query('hub_verify_token') ?? $request->query('hub.verify_token');
        $challenge = $request->query('hub_challenge') ?? $request->query('hub.challenge');

        if ($mode === 'subscribe' && $token === config('services.whatsapp.verify_token')) {
            return response($challenge, 200);
        }

        return response('Invalid verify token', 403);
    }

    public function receive(Request $request, WhatsAppService $whatsapp)
    {
        $payload = $request->all();

        Log::info('WhatsApp Webhook Received', $payload);

        $message = data_get($payload, 'entry.0.changes.0.value.messages.0');

        if (!$message) {
            return response()->json(['status' => 'ignored']);
        }

        $from = data_get($message, 'from');
        $text = strtolower(trim(data_get($message, 'text.body', '')));

        if (!$from || !$text) {
            return response()->json(['status' => 'no_text']);
        }

        $lead = Lead::where('whatsapp_number', 'like', '%' . substr($from, -10))
            ->latest()
            ->first();

        if (!$lead) {
            Log::warning('WhatsApp lead not found', [
                'from' => $from,
                'text' => $text,
            ]);

            return response()->json(['status' => 'lead_not_found']);
        }

        if (in_array($text, ['yes', 'y', 'accept', 'accepted', '1'])) {
            $lead->update([
                'terms_accepted' => true,
                'terms_accepted_at' => now(),
                'chatbot_status' => 'terms_accepted',
                'final_status' => 'terms_accepted',
            ]);

            if (!$lead->pdf_path || !Storage::disk('public')->exists($lead->pdf_path)) {
                $whatsapp->sendText($from, 'Sorry, your PDF is not available right now. Our team will contact you.');
                
                $lead->update([
                    'whatsapp_status' => 'pdf_missing',
                    'final_status' => 'pdf_missing',
                ]);

                return response()->json(['status' => 'pdf_missing']);
            }

            $pdfUrl = asset('storage/' . $lead->pdf_path);

            $response = $whatsapp->sendPdf(
                $from,
                $pdfUrl,
                'lead-' . $lead->id . '.pdf'
            );

            $lead->update([
                'whatsapp_status' => $response['success'] ? 'pdf_sent_whatsapp' : 'pdf_send_failed',
                'chatbot_status' => $response['success'] ? 'completed' : 'failed',
                'final_status' => $response['success'] ? 'completed' : 'pdf_send_failed',
                'whatsapp_last_response' => $response,
            ]);

            return response()->json(['status' => 'pdf_sent']);
        }

        if (in_array($text, ['no', 'n', 'cancel', '2'])) {
            $lead->update([
                'terms_accepted' => false,
                'chatbot_status' => 'terms_rejected',
                'final_status' => 'terms_rejected',
            ]);

            $whatsapp->sendText($from, 'No problem. Your request has been cancelled.');

            return response()->json(['status' => 'terms_rejected']);
        }

        $whatsapp->sendText($from, "Please reply YES to accept Terms & Conditions or NO to cancel.");

        return response()->json(['status' => 'invalid_reply']);
    }
}

8. PDF view

resources/views/pdf/lead.blade.php
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Lead PDF</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 14px;
            color: #222;
        }

        .box {
            border: 1px solid #ddd;
            padding: 20px;
        }

        h1 {
            font-size: 22px;
        }
    </style>
</head>
<body>
    <div class="box">
        <h1>Form Submission Details</h1>

        <p><strong>Name:</strong> {{ $lead->name }}</p>
        <p><strong>Email:</strong> {{ $lead->email }}</p>
        <p><strong>WhatsApp:</strong> {{ $lead->whatsapp_number }}</p>
        <p><strong>Date:</strong> {{ now()->format('d M Y h:i A') }}</p>
    </div>
</body>
</html>


9. Install PDF package
composer require barryvdh/laravel-dompdf

php artisan storage:link


10. CRM status logic
Use these statuses:
form_submitted
pdf_generated
waiting_for_terms
terms_accepted
pdf_sent_whatsapp
completed
terms_rejected
whatsapp_failed
pdf_missing
pdf_send_failed

This is the correct production flow:
Form Submit
→ Save Lead
→ Generate PDF
→ Send WhatsApp Consent
→ Webhook receives YES
→ Mark Terms Accepted
→ Send PDF
→ Update CRM Completed