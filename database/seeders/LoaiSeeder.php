<?php

namespace Database\Seeders;

use App\Models\Loai;
use Illuminate\Database\Seeder;

class LoaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Loai::factory()->count(50)->create();

    }
}
