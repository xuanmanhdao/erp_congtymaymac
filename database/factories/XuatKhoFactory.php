<?php

namespace Database\Factories;

use App\Models\NhanVien;
use App\Models\XuatKho;
use App\Models\Xuong;
use Illuminate\Database\Eloquent\Factories\Factory;

class XuatKhoFactory extends Factory
{
    protected $model=XuatKho::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ThoiGianXuat'=>$this->faker->dateTime(),
            // 'TongGia'=>$this->faker->numberBetween($min=1000000,$max=30000000),
            'GhiChu'=>$this->faker->paragraph(),
            'MaNhanVien'=>$this->faker->randomElement(NhanVien::pluck('MaNhanVien')),
            'MaXuong'=>$this->faker->randomElement(Xuong::pluck('MaXuong')),
        ];
    }
}
