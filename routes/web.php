<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\qlsx\KeHoachController;
use App\Http\Controllers\qlsx\QuanTriVienController;

use App\Http\Controllers\qlsx\XuongController;
use App\Http\Controllers\qlsx\VatTuConTroller;
use App\Http\Controllers\SanPhamController;
use App\Http\Middleware\KiemTraDangNhapMiddleware;
use App\Models\KeHoach;
use App\Models\Xuong;
use App\Models\VatTu;
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

Route::get('/', [AuthController::class, 'dangNhap'])->name('dangnhap');
Route::post('duyet-dang-nhap', [AuthController::class, 'duyetDangNhap'])->name('duyetdangnhap');
Route::get('/quen-mat-khau', [AuthController::class, 'quenMatKhau'])->name('quenmatkhau');
Route::post('/quen-mat-khau', [AuthController::class, 'guiEmail'])->name('guiemail');
Route::get('/quen-mat-khau/{token}', [AuthController::class, 'duyetXacThucEmail'])->name('duyetxacthucemail');
Route::post('/doi-mat-khau', [AuthController::class, 'doiMatKhau'])->name('doimatkhau');

Route::group(['prefix' => 'quan-ly-ke-hoach', 'middleware' => KiemTraDangNhapMiddleware::class], function () {
    Route::get('/', [KeHoachController::class, 'index'])->name('kehoach.index');
    Route::get('/create', [KeHoachController::class, 'create'])->name('kehoach.create');
    Route::post('/store', [KeHoachController::class, 'store'])->name('kehoach.store');
    Route::get('/edit/{kehoach}', [KeHoachController::class, 'edit'])->name('kehoach.edit');
    Route::put('/update/{kehoach}', [KeHoachController::class, 'update'])->name('kehoach.update');
    Route::delete('/delete/{kehoach}', [KeHoachController::class, 'destroy'])->name('kehoach.delete');
});

Route::group(['prefix' => 'quan-ly-xuong', 'middleware' => KiemTraDangNhapMiddleware::class], function () {
    Route::get('/', [XuongController::class, 'index'])->name('xuong.index');
    Route::get('/create', [XuongController::class, 'create'])->name('xuong.create');
    Route::post('/store', [XuongController::class, 'store'])->name('xuong.store');
    Route::get('/edit/{xuong}', [XuongController::class, 'edit'])->name('xuong.edit'); 
    Route::put('/update/{xuong}', [XuongController::class, 'update'])->name('xuong.update');
    // Route::delete('/delete/{xuong}', [XuongController::class, 'destroy'])->name('xuong.delete');
});

Route::group(['prefix' => 'quan-ly-vat-tu', 'middleware' => KiemTraDangNhapMiddleware::class], function () {
    Route::get('/', [VatTuConTroller::class, 'index'])->name('vattu.index');
    Route::get('/create', [VatTuConTroller::class, 'create'])->name('vattu.create');
    Route::post('/store', [VatTuConTroller::class, 'store'])->name('vattu.store');
    Route::get('/edit/{vattu}', [VatTuConTroller::class, 'edit'])->name('vattu.edit'); 
    Route::put('/update/{vattu}', [VatTuConTroller::class, 'update'])->name('vattu.update');
    // Route::delete('/delete/{vattu}', [VatTuController::class, 'destroy'])->name('vattu.delete');
});

Route::group(['prefix' => 'quan-ly-kho', 'middleware' => KiemTraDangNhapMiddleware::class], function () {
    Route::group(['prefix' => 'san-pham'], function () {
        Route::get('/', [SanPhamController::class, 'index'])->name('sanpham.index');
    });
});
