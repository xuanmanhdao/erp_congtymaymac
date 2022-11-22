<?php

namespace Database\Seeders;

use App\Models\TaiKhoan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaiKhoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // TaiKhoan::factory()->count(30)->create();

        // DB::insert(
        //     'insert into taikhoan (MaNhanVien, MatKhau, Quyen) values (?, ?, ?)',
        //     ['Superadmin', '123456', '10'],
        //     ['QuanLyKhoAdmin', '123456', '0'],
        //     ['QuanLySanXuatAdmin1', '123456', '5'],
        //     ['QuanLySanXuatAdmin2', '123456', '5'],
        //     ['QuanLySanXuatAdmin3', '123456', '5'],
        // );

        $arrayInsert = [
            ['MaNhanVien' => 'Superadmin', 'MatKhau' => '123456', 'Quyen' => '11'],
            ['MaNhanVien' => 'QuanLyKhoAdmin', 'MatKhau' => '123456', 'Quyen' => '0'],
            ['MaNhanVien' => 'QuanLySanXuatAdmin1', 'MatKhau' => '123456', 'Quyen' => '5'],
            ['MaNhanVien' => 'QuanLySanXuatAdmin2', 'MatKhau' => '123456', 'Quyen' => '5'],
            ['MaNhanVien' => 'QuanLySanXuatAdmin3', 'MatKhau' => '123456', 'Quyen' => '5'],
            ['MaNhanVien' => 'TaiKhoanBiKhoa', 'MatKhau' => '123456', 'Quyen' => '10'],
        ];

        DB::table("taikhoan")->insert($arrayInsert);
    }
}
