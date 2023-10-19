<?php

use App\Livewire\Dashboard\IndexDashboard;
use App\Livewire\Jukir\CreateJukir;
use App\Livewire\Jukir\EditJukir;
use App\Livewire\Jukir\IndexJukir;
use App\Livewire\Korlap\CreateKorlap;
use App\Livewire\Korlap\EditKorlap;
use App\Livewire\Korlap\IndexKorlap;
use App\Livewire\Lokasi\CreateLokasi;
use App\Livewire\Lokasi\EditLokasi;
use App\Livewire\Lokasi\IndexLokasi;
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
    Route::get('admin/dashboard', IndexDashboard::class)->name('dashboard.index');
    
    Route::get('admin/lokasi', IndexLokasi::class)->name('lokasi.index');
    Route::get('admin/lokasi/create', CreateLokasi::class)->name('lokasi.create');
    Route::get('admin/lokasi/edit/{id}', EditLokasi::class)->name('lokasi.edit');
    
    Route::get('admin/jukir', IndexJukir::class)->name('jukir.index');
    Route::get('admin/jukir/create', CreateJukir::class)->name('jukir.create');
    Route::get('admin/jukir/edit/{id}', EditJukir::class)->name('jukir.edit');

    Route::view('admin/tunai', 'pages.tunai')->name('tunai.index');
    Route::view('admin/nontunai', 'pages.nontunai')->name('nontunai.index');

    Route::get('admin/korlap', IndexKorlap::class)->name('korlap.index');
    Route::get('admin/korlap/create', CreateKorlap::class)->name('korlap.create');
    Route::get('admin/korlap/edit/{id}', EditKorlap::class)->name('korlap.edit');

});
