<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\EnsureUserIsAuthenticated;
/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('auth.login');
})->name('login');

Route::get('/sign-up', [AuthController::class, 'showRegisterForm'])->name('sign_up.form');
Route::post('/sign-up', [AuthController::class, 'sign_up'])->name('sign_up');
Route::get('/verify-email', [AuthController::class, 'verificationNotice'])->name('verification.notice');
Route::post('/verify-code', [AuthController::class, 'verifyCode'])->name('verify.code');


Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});


Route::get('/thank-you', function () {
    return view('auth.thank_you');
})->name('thank_you.form');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('auth.login');


Route::post('/logout', function () {
    Auth::logout();
    session()->invalidate();
    session()->regenerateToken();
    return redirect('/'); 
})->name('logout');

// Authenticated routes
Route::middleware('auth')->group(function () {
    // Characters route with optional ID
    Route::post('/', [AuthController::class, 'login'])->name('auth.login.post'); 
    Route::get('/characters/{id?}', [DashboardController::class, 'index'])->name('characters');
    Route::post('/characters/save', [DashboardController::class, 'saveCharacter'])->name('savedetails');
    Route::delete('/characters/delete/{id}', [DashboardController::class, 'deleteCharacter'])->name('characters.delete');

    // Saved Characters
    Route::get('/user/characters/{id?}', [DashboardController::class, 'display_char'])->name('user.characters');
    Route::delete('/user/characters/delete/{id}', [DashboardController::class, 'deleteCharacter'])->name('deletesaveuser');
});

