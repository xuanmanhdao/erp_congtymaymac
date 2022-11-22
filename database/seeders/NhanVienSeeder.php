<?php

namespace Database\Seeders;

use App\Models\NhanVien;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NhanVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // NhanVien::factory()->count(50)->create();

        // DB::insert(
        //     'insert into nhanvien (MaNhanVien, TenNhanVien, NgaySinh, CanCuocCongDan, GioiTinh, DiaChi, Email, SoDienThoai, MaChucVu, MaXuong) values (?, ?, ?, ?, ?, ?, ?, ?, ?,?)',
        //     ['Superadmin', 'Nhân viên số 1', '2001-12-19', '001200000000', '1', 'Hà Nội', 'xuanmanhdao2001@gmail.com', '0365666666', 'Superadmin', 'Xuong01'],
        //     ['QuanLyKhoAdmin', 'Nhân viên số 2', '2001-12-19', '001200000000', '0', 'Hà Nội', 'xmanh2k1@gmail.com', '0365666666', 'QuanLyKho', 'Xuong01'],
        //     ['QuanLySanXuatAdmin1', 'Nhân viên số 3', '2001-11-16', '001200000000', '1', 'Hà Nội', 'long2001@gmail.com', '0365666666', 'QuanLySanXuat', 'Xuong02'],
        //     ['QuanLySanXuatAdmin2', 'Nhân viên số 4', '2001-10-16', '001200000000', '1', 'Hà Nội', 'quyet2001@gmail.com', '0365666666', 'QuanLySanXuat', 'Xuong02'],
        //     ['QuanLySanXuatAdmin3', 'Nhân viên số 5', '2001-09-16', '001200000000', '1', 'Hà Nội', 'tuyen2001@gmail.com', '0365666666', 'QuanLySanXuat', 'Xuong02'],
        // );

        $arrayInsert = [
            ['MaNhanVien' => 'Superadmin', 'TenNhanVien' => 'Nhân viên số 1', 'NgaySinh' => '2001-12-19', 'CanCuocCongDan' => '001200000000', 'GioiTinh' => '1', 'DiaChi' => 'Hà Nội', 'Email' => 'xuanmanhdao2001@gmail.com', 'SoDienThoai' => '0365666666', 'MaChucVu' => 'Superadmin', 'MaXuong' => 'Xuong01'],
            ['MaNhanVien' => 'QuanLyKhoAdmin', 'TenNhanVien' => 'Nhân viên số 2', 'NgaySinh' => '2001-11-19', 'CanCuocCongDan' => '001200000000', 'GioiTinh' => '0', 'DiaChi' => 'Hà Nội', 'Email' => 'xmanh2k1@gmail.com', 'SoDienThoai' => '0365666666', 'MaChucVu' => 'QuanLyKho', 'MaXuong' => 'Xuong01'],
            ['MaNhanVien' => 'QuanLySanXuatAdmin1', 'TenNhanVien' => 'Nhân viên số 3', 'NgaySinh' => '2001-10-19', 'CanCuocCongDan' => '001200000000', 'GioiTinh' => '1', 'DiaChi' => 'Hà Nội', 'Email' => 'long@gmail.com', 'SoDienThoai' => '0365666666', 'MaChucVu' => 'QuanLySanXuat', 'MaXuong' => 'Xuong02'],
            ['MaNhanVien' => 'QuanLySanXuatAdmin2', 'TenNhanVien' => 'Nhân viên số 4', 'NgaySinh' => '2001-09-19', 'CanCuocCongDan' => '001200000000', 'GioiTinh' => '1', 'DiaChi' => 'Hà Nội', 'Email' => 'quyet@gmail.com', 'SoDienThoai' => '0365666666', 'MaChucVu' => 'QuanLySanXuat', 'MaXuong' => 'Xuong02'],
            ['MaNhanVien' => 'QuanLySanXuatAdmin3', 'TenNhanVien' => 'Nhân viên số 5', 'NgaySinh' => '2001-08-19', 'CanCuocCongDan' => '001200000000', 'GioiTinh' => '1', 'DiaChi' => 'Hà Nội', 'Email' => 'tuyen@gmail.com', 'SoDienThoai' => '0365666666', 'MaChucVu' => 'QuanLySanXuat', 'MaXuong' => 'Xuong02'],
            ['MaNhanVien' => 'TaiKhoanBiKhoa', 'TenNhanVien' => 'Nhân viên số 6', 'NgaySinh' => '2001-08-19', 'CanCuocCongDan' => '001200000000', 'GioiTinh' => '1', 'DiaChi' => 'Hà Nội', 'Email' => 'khoaacc@gmail.com', 'SoDienThoai' => '0365666666', 'MaChucVu' => 'QuanLySanXuat', 'MaXuong' => 'Xuong02'],
        ];


        DB::table("nhanvien")->insert($arrayInsert);
    }
}
