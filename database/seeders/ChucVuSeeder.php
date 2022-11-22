<?php

namespace Database\Seeders;

use App\Models\ChucVu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChucVuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ChucVu::factory()->count(3)->create();

        // DB::insert(
        //     'insert into chucvu (MaChucVu, TenChucVu, MoTaChucVu) values (?, ?, ?)',
        //     ['QuanLyKho', 'Người quản lý kho', 'Nhập liệu, theo dõi sự thay đổi'],
        //     ['QuanLySanXuat', 'Người quản lý sản xuất', 'Nhập liệu, theo dõi sự thay đổi'],
        //     ['Superadmin', 'Người quản trị viên', 'All']
        // );

        $arrayInsert = [
            ['MaChucVu' => 'QuanLyKho', 'TenChucVu' => 'Người quản lý kho', 'MoTaChucVu' => 'Nhập liệu, theo dõi sự thay đổi'],
            ['MaChucVu' => 'QuanLySanXuat', 'TenChucVu' => 'Người quản lý sản xuất', 'MoTaChucVu' => 'Nhập liệu, theo dõi sự thay đổi'],
            ['MaChucVu' => 'Superadmin', 'TenChucVu' => 'Người quản trị viên', 'MoTaChucVu' => 'All'],
        ];

        DB::table("chucvu")->insert($arrayInsert);
    }
}
