<?php

namespace Database\Factories;

use App\Models\Loai;
use App\Models\LoaiQuyTrinh;
use App\Models\SanPham;
use Illuminate\Database\Eloquent\Factories\Factory;

class SanPhamFactory extends Factory
{
    protected $model=SanPham::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'MaSanPham'=>$this->faker->unique()->userName(),
            'TenSanPham'=>$this->faker->name(),
            'SoLuong' => $this->faker->numberBetween($min = 0, $max = 200),
            'DonViTinh'=>'chiếc',
            'Gia'=>$this->faker->numberBetween($min = 1000000, $max = 30000000),
            'MoTaSanPham'=>$this->faker->paragraph(),
            'MaLoai'=>$this->faker->randomElement(Loai::pluck('MaLoai')),
            'MaLoaiQuyTrinh'=>$this->faker->randomElement(LoaiQuyTrinh::pluck('MaLoaiQuyTrinh')),
        ];
    }
}
