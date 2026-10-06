<?php

namespace App\Services;

use App\Models\SmtpSetting;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Models\EmailLog;
use Exception;

class MailService
{
    public static function configure(): bool
    {
        $countryCode = auth()->check()
            ? (auth()->user()->country_code ?? auth()->user()->user_country ?? 91)
            : 91;

        $smtp = SmtpSetting::where('country_code', $countryCode)
            ->where('status', 1)
            ->first();

        if (!$smtp) {
            $smtp = SmtpSetting::where('status', 1)->first();
        }

        if (!$smtp || empty($smtp->email_account)) {
            return false;
        }

        Config::set('mail.default', 'smtp');

        Config::set('mail.mailers.smtp', [
            'transport'  => 'smtp',
            'host'       => $smtp->smtp_server,
            'port'       => (int) $smtp->email_port,
            'encryption' => strtolower($smtp->security_type) === 'none'
                ? null
                : strtolower($smtp->security_type),
            'username'   => $smtp->email_account,
            'password'   => $smtp->email_password,
            'timeout'    => null,
            'auth_mode'  => null,
        ]);

        Config::set('mail.from', [
            'address' => $smtp->email_account,
            'name' => $smtp->from_name,
        ]);

        Mail::purge('smtp');

        return true;
    }
    public static function sendMail(
        string $to,
        string $subject,
        string $message,
        ?string $cc = null,
        ?string $attachment = null
    ): bool {
        try {
            if (!self::configure()) {
                Log::error('SMTP configure failed');
                return false;
            }

            Mail::html($message, function ($mail) use ($to, $subject, $cc, $attachment) {
                $mail->from(config('mail.from.address'), config('mail.from.name'))
                    ->to($to)
                    ->subject($subject);

                if (!empty($cc)) {
                    $ccEmails = array_filter(array_map('trim', explode(',', $cc)));
                    $mail->cc($ccEmails);
                }

                if (!empty($attachment) && file_exists($attachment)) {
                    $mail->attach($attachment);
                }
            });

            return true;
        } catch (\Exception $e) {
            Log::error('Mail send failed', [
                'error' => $e->getMessage(),
                'to' => $to,
            ]);

            return false;
        }
    }

    // public static function sendMail(string $to, string $subject, string $message): bool
    // {

    //     $log = EmailLog::create([
    //         'from_email' => config('mail.from.address'),
    //         'to_email' => $to,
    //         'subject' => $subject,
    //         'message' => $message,
    //         'status' => 'pending',
    //         'created_by' => auth()->id(),
    //     ]);

    //     try {

    //         if (!self::configure()) {

    //             $log->update([
    //                 'status' => 'failed',
    //                 'error_message' => 'SMTP configuration failed'
    //             ]);

    //             return false;
    //         }

    //         Mail::html($message, function ($mail) use ($to, $subject) {

    //             $mail->from(
    //                 config('mail.from.address'),
    //                 config('mail.from.name')
    //             );

    //             $mail->to($to)
    //                 ->subject($subject);
    //         });

    //         $log->update([
    //             'status' => 'sent'
    //         ]);

    //         return true;
    //     } catch (\Exception $e) {

    //         $log->update([
    //             'status' => 'failed',
    //             'error_message' => $e->getMessage()
    //         ]);

    //         Log::error('Mail Failed', [
    //             'error' => $e->getMessage()
    //         ]);

    //         return false;
    //     }
    // }
    // public static function sendMail(string $to, string $subject, string $message): bool
    // {
    //     try {
    //         if (!self::configure()) {
    //             Log::error('SMTP configure failed');
    //             return false;
    //         }

    //         Mail::html($message, function ($mail) use ($to, $subject) {
    //             $mail->from(config('mail.from.address'), config('mail.from.name'))
    //                 ->to($to)
    //                 ->subject($subject);
    //         });

    //         Log::info('Email sent successfully', [
    //             'to' => $to,
    //             'from' => config('mail.from.address'),
    //         ]);

    //         return true;
    //     } catch (Exception $e) {
    //         Log::error('Email sending failed', [
    //             'error' => $e->getMessage(),
    //             'to' => $to,
    //             'from' => config('mail.from.address'),
    //         ]);

    //         return false;
    //     }
    // }
}
