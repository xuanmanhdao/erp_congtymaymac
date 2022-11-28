<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatLieuController;
use App\Http\Controllers\ChiTietXuatKhoController;
use App\Http\Controllers\LoaiController;
use App\Http\Controllers\LoaiQuyTrinhController;
use App\Http\Controllers\NguyenVatLieuController;
use App\Http\Controllers\qlsx\KeHoachController;
use App\Http\Controllers\qlsx\QuanTriVienController;
use App\Http\Controllers\qlsx\XuongController;
use App\Http\Controllers\qlsx\VatTuConTroller;
use App\Http\Controllers\NhanVienController;
use App\Http\Controllers\ChucVuController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\TinhTrangXuatKhoController;
use App\Http\Middleware\KiemTraDangNhapMiddleware;
use App\Models\KeHoach;
use App\Models\DonViPhanPhoi;
use App\Models\NhapKho;


use App\Http\Controllers\qlsx\DonViPhanPhoiController;
use App\Http\Controllers\qlsx\NhapKhoController;
use Illuminate\Support\Facades\Route;



use App\Http\Controllers\qlsx\ChiTietNhapKhoController;
use App\Http\Controllers\XuatKhoController;
use App\Models\ChiTietXuatKho;
use App\Models\SanPham;

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
    // Route::delete('/delete/{kehoach}', [VatTuConTroller::class, 'destroy'])->name('kehoach.delete');
});

Route::group(['prefix' => 'quan-ly-don-vi-phan-phoi', 'middleware' => KiemTraDangNhapMiddleware::class], function () {
    Route::get('/', [DonViPhanPhoiController::class, 'index'])->name('donviphanphoi.index');
    Route::get('/create', [DonViPhanPhoiController::class, 'create'])->name('donviphanphoi.create');
    Route::post('/store', [DonViPhanPhoiController::class, 'store'])->name('donviphanphoi.store');
    Route::get('/edit/{donviphanphoi}', [DonViPhanPhoiController::class, 'edit'])->name('donviphanphoi.edit');
    Route::put('/update/{donviphanphoi}', [DonViPhanPhoiController::class, 'update'])->name('donviphanphoi.update');
    // Route::delete('/delete/{kehoach}', [VatTuConTroller::class, 'destroy'])->name('kehoach.delete');
});

Route::group(['prefix' => 'quan-ly-nhap-kho', 'middleware' => KiemTraDangNhapMiddleware::class], function () {
    Route::get('/', [NhapKhoController::class, 'index'])->name('nhapkho.index');
    Route::get('/create', [NhapKhoController::class, 'create'])->name('nhapkho.create');
    Route::post('/store', [NhapKhoController::class, 'store'])->name('nhapkho.store');
    Route::get('/edit/{nhapkho}', [NhapKhoController::class, 'edit'])->name('nhapkho.edit');
    Route::put('/update/{nhapkho}', [NhapKhoController::class, 'update'])->name('nhapkho.update');
    // Route::delete('/delete/{kehoach}', [VatTuConTroller::class, 'destroy'])->name('kehoach.delete');
});
Route::group(['prefix' => 'quan-ly-chi-tiet-nhap-kho', 'middleware' => KiemTraDangNhapMiddleware::class], function () {
    Route::get('/', [ChiTietNhapKhoController::class, 'index'])->name('chitietnhapkho.index');
    Route::get('/create', [ChiTietNhapKhoController::class, 'create'])->name('chitietnhapkho.create');
    Route::post('/store', [ChiTietNhapKhoController::class, 'store'])->name('chitietnhapkho.store');
    Route::get('/edit/{chitietnhapkho}', [ChiTietNhapKhoController::class, 'edit'])->name('chitietnhapkho.edit');
    Route::put('/update/{chitietnhapkho}', [ChiTietNhapKhoController::class, 'update'])->name('chitietnhapkho.update');
    // Route::delete('/delete/{kehoach}', [VatTuConTroller::class, 'destroy'])->name('kehoach.delete');
});


Route::group(['prefix' => 'quan-ly-quy-trinh', 'middleware' => KiemTraDangNhapMiddleware::class], function () {
    Route::get('/', [LoaiQuyTrinhController::class, 'index'])->name('quytrinh.index');
    Route::get('/create', [LoaiQuyTrinhController::class, 'create'])->name('quytrinh.create');
    Route::post('/store', [LoaiQuyTrinhController::class, 'store'])->name('quytrinh.store');
    Route::get('/edit/{quytrinh}', [LoaiQuyTrinhController::class, 'edit'])->name('quytrinh.edit');
    Route::put('/update/{quytrinh}', [LoaiQuyTrinhController::class, 'update'])->name('quytrinh.update');
    // Route::delete('/delete/{quytrinh}', [quytrinhController::class, 'destroy'])->name('xuong.delete');
});

Route::group(['prefix' => 'quan-ly-nguyen-vat-lieu', 'middleware' => KiemTraDangNhapMiddleware::class], function () {
    Route::get('/', [NguyenVatLieuController::class, 'index'])->name('nguyenvatlieu.index');
    Route::get('/create', [NguyenVatLieuController::class, 'create'])->name('nguyenvatlieu.create');
    Route::post('/store', [NguyenVatLieuController::class, 'store'])->name('nguyenvatlieu.store');
    Route::get('/edit/{nguyenvatlieu}', [NguyenVatLieuController::class, 'edit'])->name('nguyenvatlieu.edit');
    Route::put('/update/{nguyenvatlieu}', [NguyenVatLieuController::class, 'update'])->name('nguyenvatlieu.update');
    // Route::delete('/delete/{kehoach}', [VatTuConTroller::class, 'destroy'])->name('kehoach.delete');
});


Route::group(['prefix' => 'quan-ly-nhan-vien', 'middleware' => KiemTraDangNhapMiddleware::class], function () {
    Route::get('/', [NhanVienController::class, 'index'])->name('nhanvien.index');
    Route::get('/create', [NhanVienController::class, 'create'])->name('nhanvien.create');
    Route::post('/store', [NhanVienController::class, 'store'])->name('nhanvien.store');
    Route::get('/edit/{nhanvien}', [NhanVienController::class, 'edit'])->name('nhanvien.edit');
    Route::put('/update/{nhanvien}', [NhanVienController::class, 'update'])->name('nhanvien.update');
    // Route::delete('/delete/{kehoach}', [VatTuConTroller::class, 'destroy'])->name('kehoach.delete');
});


Route::group(['prefix' => 'quan-ly-chuc-vu', 'middleware' => KiemTraDangNhapMiddleware::class], function () {
    Route::get('/', [ChucVuController::class, 'index'])->name('chucvu.index');
    Route::get('/create', [ChucVuController::class, 'create'])->name('chucvu.create');
    Route::post('/store', [ChucVuController::class, 'store'])->name('chucvu.store');
    Route::get('/edit/{chucvu}', [ChucVuController::class, 'edit'])->name('chucvu.edit');
    Route::put('/update/{chucvu}', [ChucVuController::class, 'update'])->name('chucvu.update');
    // Route::delete('/delete/{kehoach}', [VatTuConTroller::class, 'destroy'])->name('kehoach.delete');
});

Route::group(['prefix' => 'chat-lieu', 'middleware' => KiemTraDangNhapMiddleware::class], function () {
    Route::get('/', [ChatLieuController::class, 'index'])->name('chatlieu.index');
    Route::get('/create', [ChatLieuController::class, 'create'])->name('chatlieu.create');
    Route::post('/store', [ChatLieuController::class, 'store'])->name('chatlieu.store');
    Route::get('/edit/{chatlieu}', [ChatLieuController::class, 'edit'])->name('chatlieu.edit');
    Route::put('/update/{chatlieu}', [ChatLieuController::class, 'update'])->name('chatlieu.update');
    // Route::delete('/delete/{kehoach}', [VatTuConTroller::class, 'destroy'])->name('kehoach.delete');
});

Route::group(['prefix' => 'quan-ly-tinh-trang-xuat-kho', 'middleware' => KiemTraDangNhapMiddleware::class], function () {
    Route::get('/', [TinhTrangXuatKhoController::class, 'index'])->name('tinhtrangxuatkho.index');
    Route::get('/create', [TinhTrangXuatKhoController::class, 'create'])->name('tinhtrangxuatkho.create');
    Route::post('/store', [TinhTrangXuatKhoController::class, 'store'])->name('tinhtrangxuatkho.store');
    Route::get('/edit/{tinhtrangxuatkho}', [TinhTrangXuatKhoController::class, 'edit'])->name('tinhtrangxuatkho.edit');
    Route::put('/update/{tinhtrangxuatkho}', [TinhTrangXuatKhoController::class, 'update'])->name('tinhtrangxuatkho.update');
    // Route::delete('/delete/{kehoach}', [VatTuConTroller::class, 'destroy'])->name('kehoach.delete');
    });

Route::group(['prefix' => 'quan-ly-kho', 'middleware' => KiemTraDangNhapMiddleware::class], function () {
    Route::group(['prefix' => 'san-pham'], function () {
        Route::get('/', [SanPhamController::class, 'index'])->name('sanpham.index');
        Route::get('/ajax-index', [SanPhamController::class, 'ajaxSanPhamIndex'])->name('sanpham.ajax.index');
        Route::get('/create', [SanPhamController::class, 'create'])->name('sanpham.create');
        Route::post('/store', [SanPhamController::class, 'store'])->name('sanpham.store');

        Route::get('/test', [SanPhamController::class, 'test'])->name('sanpham.test');
    });
    Route::group(['prefix' => 'loai-san-pham'], function () {
        Route::get('/', [LoaiController::class, 'index'])->name('loaisanpham.index');
        Route::get('/order-by-column', [LoaiController::class, 'orderByColumn'])->name('loaisanpham.orderbycolumn');
        Route::get('/tim-kiem', [LoaiController::class, 'show'])->name('loaisanpham.search');
        Route::post('/store', [LoaiController::class, 'store'])->name('loaisanpham.store');
        Route::get('/edit/{loai}', [LoaiController::class, 'edit'])->name('loaisanpham.edit');
        Route::put('/update-loai-san-pham/{loai}', [LoaiController::class, 'update'])->name('loaisanpham.update');
        Route::get('/export', [LoaiController::class, 'export'])->name('loaisanpham.export');
    });
    Route::group(['prefix' => 'nhap-san-pham'], function () {
        Route::get('/', [XuatKhoController::class, 'index'])->name('nhapsanpham.index');
        Route::get('/ajax-index', [XuatKhoController::class, 'ajaxXuatKhoIndex'])->name('nhapsanpham.ajax.index');

        Route::get('/auto-fill-ma-xuat-kho-last', [XuatKhoController::class, 'getMaXuatKhoLast'])->name('nhapsanpham.getmaxuatkholast');
        Route::get('/create', [XuatKhoController::class, 'create'])->name('nhapsanpham.create');
        Route::post('/store', [XuatKhoController::class, 'store'])->name('nhapsanpham.store');
        Route::get('/edit/{xuatKho}', [XuatKhoController::class, 'edit'])->name('nhapsanpham.edit');
        Route::put('/update/{xuatKho}', [XuatKhoController::class, 'update'])->name('nhapsanpham.update');
    });
    Route::group(['prefix' => 'chi-tiet-nhap-san-pham'], function () {
        Route::get('/create', [ChiTietXuatKhoController::class, 'create'])->name('chitietnhapsanpham.create');
        Route::post('/store', [ChiTietXuatKhoController::class, 'store'])->name('chitietnhapsanpham.store');
        Route::get('/chi-tiet-hoa-don-nhap-san-pham/{maXuatKho}', [ChiTietXuatKhoController::class, 'show'])->name('chitietnhapsanpham.show');
        Route::get('/chi-tiet-hoa-don-nhap-san-pham/ajax/{maXuatKho}', [ChiTietXuatKhoController::class, 'ajaxShowForMaXuatKho'])->name('chitietnhapsanpham.ajax.show');
    });

    // Nguyen vat lieu
    Route::group(['prefix' => 'loai-nguyen-vat-lieu'], function () {
        Route::get('/', [ChatLieuController::class, 'index'])->name('loainguyenvatlieu.index');
        Route::get('/ajax-index', [ChatLieuController::class, 'ajaxLoaiNguyenVatLieuIndex'])->name('loainguyenvatlieu.ajax.index');
        Route::post('/store', [ChatLieuController::class, 'store'])->name('loainguyenvatlieu.store');
        Route::get('/edit/{chatLieu}', [ChatLieuController::class, 'edit'])->name('loainguyenvatlieu.edit');
        Route::put('/update/{chatLieu}', [ChatLieuController::class, 'update'])->name('loainguyenvatlieu.update');

     
    });

   
 
});
