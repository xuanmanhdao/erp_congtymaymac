<?php

namespace Database\Seeders;

use App\Models\TaiKhoan;
use Illuminate\Database\Seeder;

class TaiKhoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TaiKhoan::factory()->count(10)->create();

    }
}
