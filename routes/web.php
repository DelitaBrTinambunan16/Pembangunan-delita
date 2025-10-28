<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TahapanProyekController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

// Homepage
Route::get('/', function () {
    return view('welcome');
});

// Login
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

//Register
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout.admin');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.admin');

// Resource routes
Route::resource('users', UserController::class);
Route::resource('warga', WargaController::class);
Route::resource('proyek', ProyekController::class);
Route::get('/tahapan-proyek', [TahapanProyekController::class, 'index'])->name('tahapan.proyek');

// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/buat-admin', function () {
    $user = new User();
    $user->name = 'Admin';
    $user->email = 'admin@gmail.com';
    $user->password = Hash::make('Admin123');
    $user->save();
    return 'Akun admin berhasil dibuat!';
});
