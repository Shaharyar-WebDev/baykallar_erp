<?php

namespace App\Http\Controllers\Pages\Settings;

use Exception;
use App\Helpers\Flash;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Services\SettingsService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class SiteSettingController extends Controller
{
    //
    public function index(){
        return view('pages.settings.site-settings');
    }

    public function update(Request $request, SettingsService $setting){
        $validated_data = $request->validate([
            'site_name' => 'required|min:3',
            'site_slogan' => 'required|min:3',
            'site_logo' => 'nullable|image|mimes:webp|max:2048',
            'logo_width' => 'required|integer',
            'logo_height' => 'nullable|integer',
            'auth_logo_width' => 'required|integer',
            'auth_logo_height' => 'nullable|integer',
        ]);

        try{
        
        $setting->set('site.name', $validated_data['site_name']);
        $setting->set('site.slogan', $validated_data['site_slogan']);
        $setting->set('site.logo_width', $validated_data['logo_width']);
        $setting->set('site.logo_height', $validated_data['logo_height']);
        $setting->set('auth.logo_width', $validated_data['auth_logo_width']);
        $setting->set('auth.logo_height', $validated_data['auth_logo_height']);

        if($request->hasFile('site_logo')) {
            if(Storage::disk('public')->exists('storage/'.$setting->get('site.logo'))) {
                Storage::disk('public')->delete('storage/'.$setting->get('site.logo'));
            }
            $logo = $request->file('site_logo');
            $logo_ext = $logo->getClientOriginalExtension();
            $logo_name = 'baykallar_logo.' . $logo_ext;

            // Move the logo to the public directory
            $logo->move(public_path('storage/logo'), $logo_name);

            // Update the setting with the new logo path
            $setting->set('site.logo', 'logo/' . $logo_name);
        }

        Flash::success('Site settings updated successfully.');
        
        return back();

    }catch(Exception $e){
        
        Flash::error('An Error Occured: '. $e->getMessage());
        
        return back();

    }

    }
}
