<?php

namespace Database\Seeders;

use App\Models\SanPham;
use Illuminate\Database\Seeder;

class SanPhamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SanPham::factory()->count(50)->create();
    }
}
