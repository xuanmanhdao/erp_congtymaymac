<?php

namespace Database\Seeders;

use App\Models\VatTu;
use Illuminate\Database\Seeder;

class VatTuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VatTu::factory()->count(50)->create();
    }
}
