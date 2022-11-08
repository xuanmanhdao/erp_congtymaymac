<?php

namespace Database\Seeders;

use App\Models\LoaiQuyTrinh;
use Illuminate\Database\Seeder;

class LoaiQuyTrinhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LoaiQuyTrinh::factory()->count(50)->create();
    }
}
