<?php

namespace Database\Factories;

use App\Models\ChucVu;
use App\Models\Xuong;
use Illuminate\Database\Eloquent\Factories\Factory;

class NhanVienFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'MaNhanVien' => $this->faker->unique()->userName(),
            'TenNhanVien' => $this->faker->name(),
            'NgaySinh' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'CanCuocCongDan' => $this->faker->uuid(),
            'GioiTinh' => $this->faker->randomElements(['0', '1'])[0],
            'DiaChi' => $this->faker->address(),
            'Email' => $this->faker->email(),
            'SoDienThoai' => $this->faker->phoneNumber(),
            'MaChucVu' => $this->faker->randomElement(ChucVu::pluck('MaChucVu')),
            'MaXuong' =>$this->faker->randomElement(Xuong::pluck('MaXuong')),
        ];
    }
}
