<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminUserController;


// Redirect root URL to login page
Route::get('/', function () {
    return redirect('/welcome');
});

// Welcome page
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

// Auth routes
Route::get('/login', function () {
    return view('auth.login');
});
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/verify/{token}', [AuthController::class, 'verify']);

Route::middleware(['admin'])->prefix('admin')->group(function () {
    Route::get('/users/create', [AdminUserController::class, 'create'])->name('admin.users.create');
    Route::post('/users', [AdminUserController::class, 'store'])->name('admin.users.store');
});


// OTP Verification
Route::get('/verify-otp', function () {
    return view('auth.verify-otp');
});
Route::post('/verify-otp', [AuthController::class, 'verifyOtp'])->name('verify.otp');

// Forgot/Reset Password
Route::get('/forgot-password', [PasswordResetController::class, 'showForgotForm'])->name('password.request');
Route::post('/forgot-password', [PasswordResetController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [PasswordResetController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [PasswordResetController::class, 'resetPassword'])->name('password.update');

// Profile routes
Route::get('/profile', [AuthController::class, 'showProfile'])->name('profile.edit');
Route::post('/profile', [AuthController::class, 'updateProfile'])->name('profile.update'); // Only POST is needed

Route::get('/change-password', [AuthController::class, 'showChangePasswordForm'])->name('profile.password.edit');
Route::post('/change-password', [AuthController::class, 'updatePassword'])->name('profile.password.update');

// Logs
Route::get('/logs', [ActivityLogController::class, 'index'])->name('logs.index');

// Dashboards
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});
Route::get('/user/dashboard', function () {
    return view('user.dashboard');
});

// routes/web.php
Route::get('/test-email', function () {
    \Mail::raw('This is a test email from Laravel Lab 4 using Brevo SMTP.', function ($message) {
        $message->to('bukcaremanagement2025@gmail.com')
                ->subject('Test Email via Brevo SMTP');
    });

    return 'Test email sent!';
});

Route::get('/test-smtp', function () {
    try {
        \Mail::raw('✅ This is a test email from your Laravel Lab 4 SMTP setup.', function ($message) {
            $message->to('bukcaremanagement2025@gmail.com');
            $message->subject('SMTP Test - Laravel Lab 4');
        });

        return '📨 Test email sent successfully!';
    } catch (\Exception $e) {
        return '❌ Error sending email: ' . $e->getMessage();
    }
});


Route::get('/test-fast', function () {
    return 'Laravel is alive!';
});



//add picture
Route::put('/profile', [AuthController::class, 'updateProfile'])->name('profile.update');

Route::middleware(['admin'])->prefix('admin')->group(function () {
    Route::get('/users', [AdminUserController::class, 'index'])->name('admin.users.index');
    Route::get('/users/create', [AdminUserController::class, 'create'])->name('admin.users.create');
    Route::post('/users', [AdminUserController::class, 'store'])->name('admin.users.store');
    Route::get('/users/{user}/edit', [AdminUserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/users/{user}', [AdminUserController::class, 'update'])->name('admin.users.update');
    Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');
    Route::get('/users/{user}', [AdminUserController::class, 'show'])->name('admin.users.show'); // optional
});