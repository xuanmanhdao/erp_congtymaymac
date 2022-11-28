<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NhapKhoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrayInsert = [
            ['MaNhapKho' => '1', 'ThoiGianNhap' => '2022-11-17 00:00:00', 'TongGia' => '0', 'GhiChu' => 'Test', 'MaNhanVien' => 'QuanLyKhoAdmin', 'MaDonViPhanPhoi' => 'DonViPhanPhoi01'],
        ];

        DB::table("nhapkho")->insert($arrayInsert);
    }
}
