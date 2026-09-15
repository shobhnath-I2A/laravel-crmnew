<?php

namespace Tests\Unit;

use App\Models\SmtpSetting;
use App\Services\MailService;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class MailServiceTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        if (Schema::hasTable('smtp_settings')) {
            SmtpSetting::query()->delete();
        }
    }

    public function test_it_falls_back_to_env_smtp_configuration_when_no_database_record_exists(): void
    {
        Config::set('mail.default', 'smtp');
        Config::set('mail.mailers.smtp', [
            'transport' => 'smtp',
            'host' => 'smtp.gmail.com',
            'port' => 587,
            'encryption' => 'tls',
            'username' => 'user@gmail.com',
            'password' => 'app-password',
            'timeout' => null,
            'auth_mode' => null,
        ]);
        Config::set('mail.from', [
            'address' => 'user@gmail.com',
            'name' => 'CRM Test',
        ]);

        $this->assertTrue(MailService::configure());
        $this->assertSame('smtp.gmail.com', config('mail.mailers.smtp.host'));
        $this->assertSame('user@gmail.com', config('mail.from.address'));
    }
}
