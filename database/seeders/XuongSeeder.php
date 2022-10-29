<?php

namespace Database\Seeders;

use App\Models\Xuong;
use Illuminate\Database\Seeder;

class XuongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Xuong::factory()->count(50)->create();

    }
}
