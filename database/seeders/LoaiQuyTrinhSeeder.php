<?php

namespace Database\Seeders;

use App\Models\LoaiQuyTrinh;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoaiQuyTrinhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // LoaiQuyTrinh::factory()->count(50)->create();

        $arrayInsert = [
            ['MaLoaiQuyTrinh' => 'QT01', 'TenQuyTrinh' => 'Quy trình sản xuất ảo thun', 'MoTaQuyTrinh' => 'Bước 1:..., bước 2:...'],
            ['MaLoaiQuyTrinh' => 'QT02', 'TenQuyTrinh' => 'Quy trình sản xuất quần âu', 'MoTaQuyTrinh' => 'Bước 1:..., bước 2:...'],
            ['MaLoaiQuyTrinh' => 'QT03', 'TenQuyTrinh' => 'Quy trình sản xuất áo gió', 'MoTaQuyTrinh' => 'Bước 1:..., bước 2:...'],
        ];

        DB::table("loaiquytrinh")->insert($arrayInsert);
    }
}
