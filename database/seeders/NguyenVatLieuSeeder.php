<?php

namespace Database\Seeders;

use App\Models\NguyenVatLieu;
use Illuminate\Database\Seeder;

class NguyenVatLieuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NguyenVatLieu::factory()->count(50)->create();
    }
}
