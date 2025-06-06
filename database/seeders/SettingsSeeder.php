<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $settings = collect([
            [
                'key' => 'site.name',
                'value' => 'Baykallar Yazılım',
                'group' => 'site'
            ],
            [
                'key' => 'site.logo',
                'value' => 'logo/logo.webp',
                'group' => 'site'
            ],
            [
                'key' => 'site.slogan',
                'value' => 'Baykallar Yazılım Guvenlik Systemleri',
                'group' => 'site'
            ],
            [
                'key' => 'site.logo_width',
                'value' => '120',
                'group' => 'site'
            ],
            [
                'key' => 'site.logo_height',
                'value' => null,
                'group' => 'site'
            ],
            [
                'key' => 'auth.logo_width',
                'value' => 176,
                'group' => 'site'
            ],
            [
                'key' => 'auth.logo_height',
                'value' => null,
                'group' => 'site'
            ],
        ]);

        $settings->each(function($setting){
            Setting::create($setting);
        });
    }
}
