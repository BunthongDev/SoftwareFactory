<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

// Admin routes

Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout'); // This route handles the admin logout functionality
Route::post('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login'); // This route handles the admin login functionality

Route::get('verify', [AdminController::class, 'ShowVerification'])->name('custom.verification.form'); // This route shows the verification form
Route::post('verify', [AdminController::class, 'VerificationVerify'])->name('custom.verification.verify'); // This route verifies the code entered by the user




Route::middleware('auth')->group(function () {
    Route::get('/admin/profile', [ProfileController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/profile/store', [ProfileController::class, 'ProfileStore'])->name('profile.store');

    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
