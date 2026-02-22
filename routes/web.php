<?php

use Illuminate\Support\Facades\Route;
use resources\pages\auth\login;

Route::get('/', function () {
    return view('welcome');
});

Route::livewire('/login', 'pages::auth.login')->name('auth.login');

// Rute untuk halaman Login
// Route::get('/login', function () {
//     return view('auth.login');
// })->name('login');

// // Contoh rute setelah login sukses (Dashboard)
// Route::middleware(['auth'])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
