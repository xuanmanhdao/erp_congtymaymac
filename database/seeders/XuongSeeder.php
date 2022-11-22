<?php

namespace Database\Seeders;

use App\Models\Xuong;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class XuongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Xuong::factory()->count(50)->create();

        // DB::insert(
        //     'insert into xuong (MaXuong, TenXuong, DiaChi, MoTaXuong) values (?, ?, ?, ?)',
        //     ['Xuong01', 'Xưởng số 1', 'Đông Anh- Hà Nội', 'Xưởng hoạt động mạnh, nhân công đông đúc'],
        //     ['Xuong02', 'Xưởng số 2', 'Bình Thạch - Hồ Chí Minh', 'Xưởng hoạt động mạnh, nhân công đông đúc'],
        //     ['Xuong03', 'Xưởng số 3', 'Gia Lâm - Hà Nội', 'Xưởng hoạt động mạnh, nhân công đông đúc'],
        // );

        $arrayInsert = [
            ['MaXuong' => 'Xuong00', 'TenXuong' => 'Xưởng số 0', 'DiaChi' => 'Đông Anh- Hà Nội', 'MoTaXuong' => 'Xưởng hoạt động mạnh, nhân công đông đúc'],
            ['MaXuong' => 'Xuong01', 'TenXuong' => 'Xưởng số 1', 'DiaChi' => 'Đông Anh- Hà Nội', 'MoTaXuong' => 'Xưởng hoạt động mạnh, nhân công đông đúc'],
            ['MaXuong' => 'Xuong02', 'TenXuong' => 'Xưởng số 2', 'DiaChi' => 'Bình Thạch - Hồ Chí Minh', 'MoTaXuong' => 'Xưởng hoạt động mạnh, nhân công đông đúc'],
            ['MaXuong' => 'Xuong03', 'TenXuong' => 'Xưởng số 3', 'DiaChi' => 'Gia Lâm - Hà Nội', 'MoTaXuong' => 'Xưởng hoạt động mạnh, nhân công đông đúc'],
        ];


        DB::table("xuong")->insert($arrayInsert);
    }
}
