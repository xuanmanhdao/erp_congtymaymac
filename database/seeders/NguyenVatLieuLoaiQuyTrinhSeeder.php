<?php

namespace Database\Seeders;

use App\Models\NguyenVatLieuLoaiQuyTrinh;
use Illuminate\Database\Seeder;

class NguyenVatLieuLoaiQuyTrinhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NguyenVatLieuLoaiQuyTrinh::factory()->count(50)->create();
    }
}
