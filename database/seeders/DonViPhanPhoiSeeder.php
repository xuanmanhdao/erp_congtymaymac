<?php

namespace Database\Seeders;

use App\Models\DonViPhanPhoi;
use Illuminate\Database\Seeder;

class DonViPhanPhoiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DonViPhanPhoi::factory()->count(50)->create();
    }
}
