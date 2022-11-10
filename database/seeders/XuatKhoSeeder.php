<?php

namespace Database\Seeders;

use App\Models\XuatKho;
use Illuminate\Database\Seeder;

class XuatKhoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        XuatKho::factory()->count(50)->create();
    }
}
