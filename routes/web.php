<?php

use App\Http\Controllers\loginUserController;
use App\Http\Controllers\registerUserController;
use App\Http\Controllers\ForgotPasswordController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Mail\UserMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Http\Request;

//Auth::routes();

Route::get('/', function () {
    return view('view.index');
})->name('view.index');

Route::middleware('auth')->group(function () {
    Route::post('/logout', [loginUserController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [registerUserController::class, 'register'])->name('register');
    Route::post('/register', [registerUserController::class, 'store'])->name('register.store');

    Route::get('/login', [loginUserController::class, 'login'])->name('login');
    Route::post('/login', [loginUserController::class, 'store'])->name('login.store');



Route::get('forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('forgot-password.form');
Route::post('forgot-password', [ForgotPasswordController::class, 'sendOTP'])->name('forgot-password.send');
Route::get('verify-otp', [ForgotPasswordController::class, 'showVerifyOTPForm'])->name('verify-otp.form');
Route::post('verify-otp', [ForgotPasswordController::class, 'verifyOTP'])->middleware('throttle:otp')->name('verify-otp.verify');
Route::get('reset-password', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset-password.form');
Route::post('reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('reset-password.reset');

});


Route::get('/send-test-mail', function () {
    $data = [
        'username' => 'Test User',
        'email' => 'test@example.com',
    ];

    Mail::to('recipient@example.com')->send(new UserMail($data));

    return 'Mail sent!';
});


Route::get('test-rate-limiter', function (Request $request) {
    $key = $request->ip(); // Or use $request->email
    return response()->json([
        'remaining' => RateLimiter::remaining($key, 5),
        'available_in' => RateLimiter::availableIn($key)
    ]);
})->middleware('throttle:otp');


