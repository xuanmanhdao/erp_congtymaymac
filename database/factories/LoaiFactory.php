<?php

namespace Database\Factories;

use App\Models\Loai;
use Illuminate\Database\Eloquent\Factories\Factory;

class LoaiFactory extends Factory
{
    protected $model=Loai::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'MaLoai' => $this->faker->unique()->userName(),
            'TenLoai' => $this->faker->name(),
            'MauSac' => $this->faker->hexColor(),
            'ViTriXep' => $this->faker->userName(),
        ];
    }
}
