<?php 

namespace App\Services;

use App\Models\Setting;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class SettingsService
{
    public function all(): array
    {
        Cache::forget('settings.all');
        return Cache::remember('settings.all', '3600', function () {
            return Setting::pluck('value', 'key')->toArray();
        });
    }

    public function get(string $key, mixed $default = null): mixed
    {
        return $this->all()[$key] ?? $default;
    }

    public function set(string $key, mixed $value): void
    {
        try{
        DB::beginTransaction();
        Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        Cache::forget('settings.all');
        DB::commit();
        }catch(Exception $e){
            DB::rollBack();
            throw new Exception("Failed to update setting: {$key}", 0, $e);
        }
    }

    public function setMany(array $settings): void
    {
        foreach ($settings as $key => $value) {
            $this->set($key, $value);
        }
    }
}
