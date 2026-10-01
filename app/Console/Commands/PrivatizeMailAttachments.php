<?php
namespace App\Console\Commands;
use App\Models\EmailLog;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\{DB, Storage};
use Illuminate\Support\Str;

class PrivatizeMailAttachments extends Command
{
    protected $signature = 'crm:privatize-mail-attachments {--apply : Copy files privately, update logs, then remove public copies}';
    protected $description = 'Move legacy email attachments off the public disk. Back up files and database first.';
    public function handle(): int
    {
        $failed = false;
        EmailLog::whereNotNull('attachment')->where('attachment', 'like', 'email-attachments/%')->orderBy('id')->chunkById(100, function ($logs) use (&$failed) {
            foreach ($logs as $log) {
                $old = $log->attachment;
                if (str_contains($old, '..') || !Storage::disk('public')->exists($old)) { $this->warn('Missing or invalid attachment for email #'.$log->id); $failed = true; continue; }
                if (!$this->option('apply')) { $this->line('Would privatize attachment for email #'.$log->id); continue; }
                $new = 'private-mail/'.Str::uuid().'.'.pathinfo($old, PATHINFO_EXTENSION);
                $stream = Storage::disk('public')->readStream($old);
                if (!is_resource($stream)) { $failed = true; continue; }
                try { $stored = Storage::disk('local')->put($new, $stream); }
                finally { fclose($stream); }
                if (!$stored) { $failed = true; continue; }
                $changed = DB::transaction(function () use ($log, $old, $new) {
                    $locked = EmailLog::lockForUpdate()->findOrFail($log->id);
                    if ($locked->attachment !== $old) { return false; }
                    $locked->update(['attachment' => $new]);
                    return true;
                });
                if (!$changed) { Storage::disk('local')->delete($new); continue; }
                // Another historical log may reference the same public file.
                if (!EmailLog::where('attachment', $old)->exists() && !Storage::disk('public')->delete($old)) {
                    $this->warn('Private copy saved; public cleanup failed for email #'.$log->id); $failed = true;
                }
            }
        });
        return $failed ? self::FAILURE : self::SUCCESS;
    }
}
