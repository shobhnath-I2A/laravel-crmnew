<?php

namespace App\Services;

use App\Models\AppSetting;
use Illuminate\Support\Facades\Cache;

class AppSettingService
{
    public function getCountryCode(): string
    {
        return (string) (auth()->user()->user_country ?? '1550');
    }

    public function saveGroup(string $groupName, array $data, ?string $countryCode = null): void
    {
        $countryCode = $countryCode ?? $this->getCountryCode();

        foreach ($data as $key => $value) {
            AppSetting::updateOrCreate(
                [
                    'country_code' => $countryCode,
                    'group_name'   => $groupName,
                    'key_name'     => $key,
                ],
                [
                    'value' => is_array($value) ? json_encode($value) : $value,
                ]
            );
        }

        Cache::forget("settings_{$countryCode}_{$groupName}");
    }

    public function getGroup(string $groupName, ?string $countryCode = null)
    {
        $countryCode = $countryCode ?? $this->getCountryCode();

        return Cache::remember("settings_{$countryCode}_{$groupName}", 3600, function () use ($countryCode, $groupName) {
            return AppSetting::where('country_code', $countryCode)
                ->where('group_name', $groupName)
                ->pluck('value', 'key_name');
        });
    }

    public function get(string $groupName, string $keyName, $default = null, ?string $countryCode = null)
    {
        $settings = $this->getGroup($groupName, $countryCode);

        return $settings[$keyName] ?? $default;
    }
}
