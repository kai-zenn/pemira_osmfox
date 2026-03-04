<?php

use Illuminate\Support\Facades\Route;
use resources\pages\auth\login;

Route::livewire('/', 'pages::guest.landing')->name('landingPage');
Route::middleware(['auth'])->group(function (){
    Route::livewire('/home', 'pages::main.home')->name('home');
});

// Route::get('/', function () {
//     return view('welcome');
// });


// Rute untuk halaman Login
// Route::get('/login', function () {
//     return view('auth.login');
// })->name('login');

// // Contoh rute setelah login sukses (Dashboard)
// Route::middleware(['auth'])->group(function () {
//     Route::get('/admin', function () {
//         return view('admin');
//     })->name('dashboard');
// });
