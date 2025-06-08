<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Pages\HomeController;
use App\Http\Controllers\Pages\ProfileController;
use App\Http\Controllers\System\LocaleController;
use App\Http\Controllers\Pages\Settings\SiteSettingController;
use App\Http\Controllers\Pages\Permissions\PermissionController;
use App\Http\Controllers\Pages\Role\RoleController;

Route::middleware(['auth', 'verified', 'locale'])->group(function () {

    Route::redirect('/home', '/dashboard/home', 301 );
    Route::redirect('/dashboard', '/dashboard/home', 301 );
    
    Route::prefix('dashboard')->group(function () {

        Route::resource('/home', HomeController::class);
        
        Route::resource('/profile', ProfileController::class);

        Route::resource('/permissions', PermissionController::class);

        route::resource('/roles', RoleController::class);


    });

    Route::get('/settings/site-settings', [SiteSettingController::class, 'index'])->name('site.settings');
    Route::put('/settings/site-settings', [SiteSettingController::class, 'update'])->name('site.settings.update');

});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/logout', function () {
    Auth::logout();
    return redirect(route('login'));
});

Route::get('/command/{command}', function ($command) {

    $not_allowed = ['down'];

    if (in_array($command, $not_allowed)) {
        abort(403);
    }

    Artisan::call($command);

    $otuput = Artisan::output();

    return nl2br($otuput);
});

Route::get('/locale/{locale}', [LocaleController::class, 'setLocale'])->name('locale');
