<?php

use App\Livewire\Analisa\IndexAnalisa;
use App\Livewire\Berlangganan\CreateBerlangganan;
use App\Livewire\Berlangganan\EditBerlangganan;
use App\Livewire\Berlangganan\IndexBerlangganan;
use App\Livewire\Dashboard\IndexDashboard;
use App\Livewire\Jukir\CreateJukir;
use App\Livewire\Jukir\EditJukir;
use App\Livewire\Jukir\IndexJukir;
use App\Livewire\Jukir\ShowJukir;
use App\Livewire\Korlap\CreateKorlap;
use App\Livewire\Korlap\EditKorlap;
use App\Livewire\Korlap\IndexKorlap;
use App\Livewire\Lokasi\CreateLokasi;
use App\Livewire\Lokasi\EditLokasi;
use App\Livewire\Lokasi\IndexLokasi;
use App\Livewire\Lokasi\ShowLokasi;
use App\Livewire\Merchant\CreateMerchant;
use App\Livewire\Merchant\EditMerchant;
use App\Livewire\Merchant\IndexMerchant;
use App\Livewire\Tunai\CreateTunai;
use App\Livewire\Tunai\EditTunai;
use App\Livewire\Tunai\IndexTunai;
use App\Livewire\Nontunai\IndexNonTunai;
use App\Livewire\Nontunai\ShowNontunai;
use App\Livewire\Peringatan\CreatePeringatan;
use App\Livewire\Peringatan\EditPeringatan;
use App\Livewire\Peringatan\IndexPeringatan;
use App\Livewire\Peringatan\ShowPeringatan;
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

    Route::get('admin/analisa', IndexAnalisa::class)->name('analisa.index');

    Route::get('admin/lokasi', IndexLokasi::class)->name('lokasi.index');
    Route::get('admin/lokasi/create', CreateLokasi::class)->name('lokasi.create');
    Route::get('admin/lokasi/{id}/edit', EditLokasi::class)->name('lokasi.edit');
    Route::get('admin/lokasi/{lokasi}', ShowLokasi::class)->name('lokasi.show');

    Route::get('admin/jukir', IndexJukir::class)->name('jukir.index');
    Route::get('admin/jukir/create', CreateJukir::class)->name('jukir.create');
    Route::get('admin/jukir/{id}/edit', EditJukir::class)->name('jukir.edit');
    Route::get('admin/jukir/{jukir}', ShowJukir::class)->name('jukir.show');

    Route::get('admin/tunai', IndexTunai::class)->name('tunai.index');
    Route::get('admin/tunai/create', CreateTunai::class)->name('tunai.create');
    Route::get('admin/tunai/{id}/edit', EditTunai::class)->name('tunai.edit');

    Route::get('admin/nontunai', IndexNonTunai::class)->name('nontunai.index');
    Route::view('admin/nontunai/{merchant_id}', 'pages.nontunai')->name('nontunai.show');
    // Route::get('admin/nontunai/{merchant_id}', ShowNontunai::class, 'detailNonTunai')->name('nontunai.show');

    Route::get('admin/korlap', IndexKorlap::class)->name('korlap.index');
    Route::get('admin/korlap/create', CreateKorlap::class)->name('korlap.create');
    Route::get('admin/korlap/{id}/edit', EditKorlap::class)->name('korlap.edit');

    Route::get('admin/merchant', IndexMerchant::class)->name('merchant.index');
    Route::get('admin/merchant/create', CreateMerchant::class)->name('merchant.create');
    Route::get('admin/merchant/{id}/edit', EditMerchant::class)->name('merchant.edit');

    Route::get('admin/berlangganan', IndexBerlangganan::class)->name('berlangganan.index');
    Route::get('admin/berlangganan/create', CreateBerlangganan::class)->name('berlangganan.create');
    Route::get('admin/berlangganan/{id}/edit', EditBerlangganan::class)->name('berlangganan.edit');

    Route::get('admin/peringatan', IndexPeringatan::class)->name('peringatan.index');
    Route::get('admin/peringatan/create', CreatePeringatan::class)->name('peringatan.create');
    Route::get('admin/peringatan/{id}/edit', EditPeringatan::class)->name('peringatan.edit');
    Route::get('admin/peringatan/{peringatan}', ShowPeringatan::class)->name('peringatan.show');
});
