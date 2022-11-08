<?php

namespace Database\Seeders;

use App\Models\ChiTietXuatKho;
use Illuminate\Database\Seeder;

class ChiTietXuatKhoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ChiTietXuatKho::factory()->count(50)->create();
    }
}
