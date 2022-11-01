<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\qlsx\KeHoachController;
use App\Http\Controllers\qlsx\QuanTriVienController;
use App\Http\Controllers\qlsx\DauVaoController;
use App\Http\Controllers\qlsx\LoController;
use App\Http\Controllers\SanPhamController;
use App\Http\Middleware\KiemTraDangNhapMiddleware;
use App\Models\KeHoach;
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

Route::group(['prefix' => 'quan-ly-lo', 'middleware' => KiemTraDangNhapMiddleware::class], function () {
    Route::get('/', [LoController::class, 'index'])->name('lo.index');
    Route::get('/create', [LoController::class, 'create'])->name('lo.create');
    Route::post('/store', [LoController::class, 'store'])->name('lo.store');
    Route::get('/edit/{lo}', [LoController::class, 'edit'])->name('lo.edit');
    Route::put('/update/{lo}', [LoController::class, 'update'])->name('lo.update');
    Route::delete('/delete/{lo}', [LoController::class, 'destroy'])->name('lo.delete');
});

Route::group(['prefix' => 'quan-ly-dau-vao', 'middleware' => KiemTraDangNhapMiddleware::class], function () {
    Route::get('/', [DauVaoController::class, 'index'])->name('dauvao.index');
    Route::get('/create', [DauVaoController::class, 'create'])->name('dauvao.create');
    Route::post('/store', [DauVaoController::class, 'store'])->name('dauvao.store');
    Route::get('/edit/{dauvao}', [DauVaoController::class, 'edit'])->name('dauvao.edit');
    Route::put('/update/{dauvao}', [DauVaoController::class, 'update'])->name('dauvao.update');
    Route::delete('/delete/{dauvao}', [DauVaoController::class, 'destroy'])->name('dauvao.delete');
});

Route::group(['prefix' => 'quan-ly-kho', 'middleware' => KiemTraDangNhapMiddleware::class], function () {
    Route::group(['prefix' => 'san-pham'], function () {
        Route::get('/', [SanPhamController::class, 'index'])->name('sanpham.index');
    });
});
