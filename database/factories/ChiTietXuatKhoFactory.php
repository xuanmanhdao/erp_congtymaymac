<?php

namespace Database\Factories;

use App\Models\ChiTietXuatKho;
use App\Models\SanPham;
use App\Models\XuatKho;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChiTietXuatKhoFactory extends Factory
{
    protected $model=ChiTietXuatKho::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'MaXuatKho'=>$this->faker->randomElement(XuatKho::pluck('MaXuatKho')),
            'MaSanPham'=>$this->faker->randomElement(SanPham::pluck('MaSanPham')),
            'SoLuong'=>$this->faker->numberBetween($min = 10, $max = 2000),
            'DonViTinh'=>'chiếc',
            'ThanhTien'=>$this->faker->numberBetween($min=100000,$max=20000000),
            'Gia'=>$this->faker->numberBetween($min=100000,$max=20000000),
        ];
    }
}
