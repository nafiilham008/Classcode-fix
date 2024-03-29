<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::get('about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');

Route::get('email', [App\Http\Controllers\HomeController::class, 'welcome'])->name('welcome');

// Route::get('/test', function () {
//     return view('home.landingPage');
// });
// Route::get('/404', function () {
//     return view('home.notfound');
// });

Auth::routes();

// Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::post('login', [App\Http\Controllers\HomeController::class, 'login'])->name('kirim');

Route::get('search', [App\Http\Controllers\HomeController::class, 'search'])->name('home.search');

Route::prefix('kelas')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'kelas'])->name('kelas.index');

    Route::get('{slug_url}', [App\Http\Controllers\HomeController::class, 'detail'])->name('kelas.detail');
    Route::get('detail', [App\Http\Controllers\HomeController::class, 'kelas']);
});

Route::prefix('promo')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'promo'])->name('promo.index');
    Route::get('promo/{id}/info', [App\Http\Controllers\HomeController::class, 'get_info'])->name('ambil_promo');
    Route::get('promo/{id}/kupon', [App\Http\Controllers\HomeController::class, 'get_coupon'])->name('ambil_kupon');
});

// Route::get('/sukses', [App\Http\Controllers\HomeController::class, 'cek_ui'])->name('payment.sukses');
    
// admin dashboard
// ['middleware' => ['role:admin']]
Route::group(['middleware' => ['role:admin|mentor']], function () {
    Route::prefix('admin')->group(function () {
        // USER 
        Route::get('/', [App\Http\Controllers\Backend\AdminController::class, 'index'])->name('admin.index');
        // Route::get('/', [App\Http\Controllers\Backend\AdminController::class, 'tampilPromo'])->name('admin.index');
        // Route::get('/', [App\Http\Controllers\Backend\AdminController::class, 'tampilUser'])->name('admin.index');


        Route::get('user/buat', [App\Http\Controllers\Backend\UserController::class, 'create'])->name('admin.user.buat');
        Route::post('user/simpan', [App\Http\Controllers\Backend\UserController::class, 'store'])->name('admin.user.store');
        Route::get('user', [App\Http\Controllers\Backend\UserController::class, 'index'])->name('admin.user');
        Route::get('user/{id}/hapus', [App\Http\Controllers\Backend\UserController::class, 'hapus'])->name('admin.user.hapus');
        Route::get('user/{id}/edit', [App\Http\Controllers\Backend\UserController::class, 'edit'])->name('admin.user.edit');
        // Route::get('user/{id}/edit', [App\Http\Controllers\Backend\UserController::class, 'editRole'])->name('admin.user.edit.role');
        Route::patch('user/{id}/edit', [App\Http\Controllers\Backend\UserController::class, 'update'])->name('admin.user.update');
        Route::patch('user/{id}/edit/role', [App\Http\Controllers\Backend\UserController::class, 'updateRole'])->name('admin.user.update.role');

        Route::get('mentor/setting', [App\Http\Controllers\Backend\UserController::class, 'settingMentor'])->name('admin.user.setting.mentor');

        Route::get('mentor/{id}/edit', [App\Http\Controllers\Backend\UserController::class, 'editMentor'])->name('admin.user.setting.edit.mentor');
        Route::patch('mentor/{id}/edit', [App\Http\Controllers\Backend\UserController::class, 'updateMentor'])->name('admin.user.setting.update.mentor');


        // KELAS ADMIN dan MENTOR
        Route::get('kelas', [App\Http\Controllers\Backend\KelasController::class, 'index'])->name('admin.kelas');
        Route::get('kelas/buat', [App\Http\Controllers\Backend\KelasController::class, 'create'])->name('admin.kelas.buat');

        Route::get('kelas/{id}/hapus', [App\Http\Controllers\Backend\KelasController::class, 'hapus'])->name('admin.kelas.hapus');
        Route::get('kelas/{id}/edit', [App\Http\Controllers\Backend\KelasController::class, 'edit'])->name('admin.kelas.edit');
        Route::post('kelas', [App\Http\Controllers\Backend\KelasController::class, 'store'])->name('admin.kelas.store');
        Route::patch('kelas/{id}/edit', [App\Http\Controllers\Backend\KelasController::class, 'update'])->name('admin.kelas.update');

        // Pending
        Route::get('pending', [App\Http\Controllers\Backend\PendingKelasController::class, 'index'])->name('admin.pending.kelas');
        Route::patch('pending/update/{id}', [App\Http\Controllers\Backend\PendingKelasController::class, 'updateStatus'])->name('admin.pending.kelas.update');

        // Kerjasama
        Route::get('partner', [App\Http\Controllers\Backend\PartnershipController::class, 'index'])->name('admin.partner');
        Route::get('partner/buat', [App\Http\Controllers\Backend\PartnershipController::class, 'create'])->name('admin.partner.buat');

        Route::get('partner/{id}/hapus', [App\Http\Controllers\Backend\PartnershipController::class, 'hapus'])->name('admin.partner.hapus');
        Route::get('partner/{id}/edit', [App\Http\Controllers\Backend\PartnershipController::class, 'edit'])->name('admin.partner.edit');
        Route::post('partner', [App\Http\Controllers\Backend\PartnershipController::class, 'store'])->name('admin.partner.store');
        Route::patch('partner/{id}/edit', [App\Http\Controllers\Backend\PartnershipController::class, 'update'])->name('admin.partner.update');


        // Master Kelas
        Route::get('kelas/{url_kelas}/materi', [App\Http\Controllers\Backend\MasterKelasController::class, 'index'])->name('admin.masterkelas.index');
        Route::get('kelas/{url_kelas}/materi/buat', [App\Http\Controllers\Backend\MasterKelasController::class, 'create'])->name('admin.masterkelas.buat');
        Route::post('kelas/{url_kelas}/materi/buat', [App\Http\Controllers\Backend\MasterKelasController::class, 'store'])->name('admin.masterkelas.kirim');

        Route::get('kelas/{url_kelas}/materi/hapus/{id}', [App\Http\Controllers\Backend\MasterKelasController::class, 'hapus'])->name('admin.masterkelas.hapus');
        Route::get('kelas/{url_kelas}/materi/edit/{id}', [App\Http\Controllers\Backend\MasterKelasController::class, 'edit'])->name('admin.masterkelas.edit');
        Route::patch('kelas/{url_kelas}/materi/update/{id}', [App\Http\Controllers\Backend\MasterKelasController::class, 'update'])->name('admin.masterkelas.update');


        // PROMO
        Route::get('promo', [App\Http\Controllers\Backend\PromoController::class, 'index'])->name('admin.promo');
        Route::get('promo/buat', [App\Http\Controllers\Backend\PromoController::class, 'create'])->name('admin.promo.buat');

        Route::post('promo', [App\Http\Controllers\Backend\PromoController::class, 'store'])->name('admin.promo.store');
        Route::get('promo/{id}/hapus', [App\Http\Controllers\Backend\PromoController::class, 'hapus'])->name('admin.promo.hapus');
        Route::get('promo/{id}/edit', [App\Http\Controllers\Backend\PromoController::class, 'edit'])->name('admin.promo.edit');
        Route::patch('promo/{id}/edit', [App\Http\Controllers\Backend\PromoController::class, 'update'])->name('admin.promo.update');

        // PAYMENT
        Route::get('payment', [App\Http\Controllers\Backend\PaymentController::class, 'index'])->name('admin.payment');
        Route::get('payment/buat', [App\Http\Controllers\Backend\PaymentController::class, 'create'])->name('admin.payment.buat');

        Route::post('payment', [App\Http\Controllers\Backend\PaymentController::class, 'store'])->name('admin.payment.store');
        Route::get('payment/{id}/hapus', [App\Http\Controllers\Backend\PaymentController::class, 'hapus'])->name('admin.payment.hapus');
        Route::get('payment/{id}/edit', [App\Http\Controllers\Backend\PaymentController::class, 'edit'])->name('admin.payment.edit');
        Route::patch('payment/{id}/edit', [App\Http\Controllers\Backend\PaymentController::class, 'update'])->name('admin.payment.update');
    });
});

Route::group(['middleware' => ['role:user']], function () {
    Route::get('checkout/{url_kelas}', [App\Http\Controllers\HomeController::class, 'checkout'])->name('checkout.index');
    Route::post('checkout/{url_kelas}', [App\Http\Controllers\HomeController::class, 'check_promo'])->name('check_promo');
    Route::get('cancel_checkout/{slug_url}', [App\Http\Controllers\HomeController::class, 'cancel_checkout'])->name('cancel_checkout');
    // Payment
    // Route::get('payment', [App\Http\Controllers\HomeController::class, 'payment'])->name('payment.index');
    Route::get('checkout/{url_kelas}/pay', [App\Http\Controllers\HomeController::class, 'pay'])->name('bayar');
    Route::post('checkout/{url_kelas}/pay', [App\Http\Controllers\HomeController::class, 'konfirmasi'])->name('bayar.konfirmasi');
    Route::get('checkout/{url_kelas}/pay/sukses', [App\Http\Controllers\HomeController::class, 'konfirmasi'])->name('payment.sukses');
    Route::get('checkout/{url_kelas}/pay/gagal', [App\Http\Controllers\HomeController::class, 'konfirmasi'])->name('payment.gagal');


    Route::get('sukses', [App\Http\Controllers\HomeController::class, 'sukses'])->name('payment.index');


    Route::prefix('dashboard')->group(function () {
        // Dashboard User
        Route::get('/', [App\Http\Controllers\Dashboard\DashboardController::class, 'index'])->name('dashboard.index');

        Route::get('setting', [App\Http\Controllers\Dashboard\SettingController::class, 'index'])->name('dashboard.setting.index');

        Route::get('setting/{id}/edit', [App\Http\Controllers\Dashboard\SettingController::class, 'edit'])->name('dashboard.setting.edit');
        Route::patch('setting/{id}/edit', [App\Http\Controllers\Dashboard\SettingController::class, 'update'])->name('dashboard.setting.update');

        // Route::get('kelas', [App\Http\Controllers\DashboardController::class, 'kelas'])->name('kelas.index');

        Route::get('kelas/{slug_url}', [App\Http\Controllers\Dashboard\DashboardController::class, 'detail_kelas'])->name('dashboard.kelas.index');
        Route::get('kelas/{slug_url}/materi/{slug_materi}', [App\Http\Controllers\Dashboard\DashboardController::class, 'materi'])->name('dashboard.kelas.materi');
    });
});
