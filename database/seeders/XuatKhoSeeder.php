<?php

namespace Database\Seeders;

use App\Models\XuatKho;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class XuatKhoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // XuatKho::factory()->count(50)->create();

        $arrayInsert = [
            ['MaXuatKho' => '1', 'ThoiGianXuat' => '2022-11-17 00:00:00', 'TongGia' => '0','GhiChu'=>'Test','MaNhanVien'=>'QuanLyKhoAdmin','MaXuong'=>'Xuong01'],
        ];

        DB::table("xuatkho")->insert($arrayInsert);
    }
}
