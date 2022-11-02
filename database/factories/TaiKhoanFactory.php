<?php

namespace Database\Factories;

use App\Models\NhanVien;
use App\Models\TaiKhoan;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaiKhoanFactory extends Factory
{
    protected $model=TaiKhoan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'MaNhanVien' => $this->faker->unique()->randomElement(NhanVien::pluck('MaNhanVien')),
            'MatKhau' => '123456',
            'Quyen' => $this->faker->randomElements(['0', '1', '2','5','10','11'])[0],
        ];
    }
}
