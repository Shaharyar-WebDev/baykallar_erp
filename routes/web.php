<?php

use App\Http\Controllers\System\LocaleController;
use App\Livewire\Dashboard\Dashboard;
use App\Livewire\Pages\Home;
use App\Livewire\Pages\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;





Route::middleware(['auth', 'verified', 'locale'])->group(function () {

    Route::redirect('/home', 'dashboard/', 301 );
    
    Route::prefix('dashboard')->group(function () {

        Route::get('/', Home::class)->name('home');

        Route::get('/profile', Profile::class)->name('profile');

    });
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
