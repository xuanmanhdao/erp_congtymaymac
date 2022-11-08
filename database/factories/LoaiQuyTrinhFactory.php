<?php

namespace Database\Factories;

use App\Models\LoaiQuyTrinh;
use App\Models\NguyenVatLieu;
use Illuminate\Database\Eloquent\Factories\Factory;

class LoaiQuyTrinhFactory extends Factory
{
    protected $model=LoaiQuyTrinh::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'MaLoaiQuyTrinh' => $this->faker->unique()->userName(),
            'TenQuyTrinh' => $this->faker->name(),
            'MoTaQuyTrinh' => $this->faker->paragraph(),
            'MaNguyenVatLieu' => $this->faker->unique()->randomElement(NguyenVatLieu::pluck('MaNguyenVatLieu')),
        ];
    }
}
