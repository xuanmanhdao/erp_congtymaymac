<?php

namespace Database\Factories;

use App\Models\VatTu;
use App\Models\Xuong;
use Illuminate\Database\Eloquent\Factories\Factory;

class VatTuFactory extends Factory
{
    protected $model=VatTu::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'MaVatTu' => $this->faker->unique()->userName(),
            'TenVatTu' => $this->faker->name(),
            'SoLuong' => $this->faker->numberBetween($min = 0, $max = 200),
            'GiaVatTu' => $this->faker->numberBetween($min = 1000000, $max = 30000000),
            'MoTaVatTu' => $this->faker->paragraph(),
            'MaXuong' =>$this->faker->randomElement(Xuong::pluck('MaXuong')),
        ];
    }
}
