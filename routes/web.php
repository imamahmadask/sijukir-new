<?php

use App\Livewire\Lokasi\CreateLokasi;
use App\Livewire\Lokasi\EditLokasi;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
        'auth:sanctum', config('jetstream.auth_session'), 'verified',
    ])->group(function () {    
    Route::view('admin/dashboard', 'pages.dashboard')->name('dashboard');
    
    Route::view('admin/lokasi', 'pages.lokasi.index')->name('lokasi');
    Route::get('admin/lokasi/create', CreateLokasi::class)->name('lokasi.create');
    Route::get('admin/lokasi/edit/{id}', EditLokasi::class)->name('lokasi.edit');
    
    Route::view('admin/jukir', 'pages.jukir')->name('jukir');
    Route::view('admin/tunai', 'pages.tunai')->name('tunai');
    Route::view('admin/nontunai', 'pages.nontunai')->name('nontunai');
});
