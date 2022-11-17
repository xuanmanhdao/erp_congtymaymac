<?php

namespace Database\Factories;

use App\Models\VatTu;
use App\Models\Xuong;
use Illuminate\Database\Eloquent\Factories\Factory;


class XuongFactory extends Factory
{
    protected $model=Xuong::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'MaXuong' => $this->faker->unique()->userName(),
            // 'TenXuong' => $this->faker->name(),
            'TenXuong' => $this->faker->unique()->name(),
            'DiaChi' => $this->faker->address(),
            // 'SoLuongVatTu' => $this->faker->numberBetween($min = 0, $max = 200),
            'MoTaXuong' => $this->faker->paragraph(),
        ];
    }
}
