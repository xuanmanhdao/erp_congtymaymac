<?php

namespace Database\Factories;

use App\Models\DonViPhanPhoi;
use App\Models\NguyenVatLieu;
use App\Models\Xuong;
use Illuminate\Database\Eloquent\Factories\Factory;

class NguyenVatLieuFactory extends Factory
{
    protected $model=NguyenVatLieu::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'MaNguyenVatLieu' => $this->faker->unique()->userName(),
            'TenNguyenVatlieu' => $this->faker->unique()->name(),
            'SoLuong' => $this->faker->numberBetween($min = 0, $max = 200),
            'DonViTinh' => $this->faker->randomElements(['kg','chiếc','mét','thùng'])[0],
            'MaXuong' => $this->faker->unique()->randomElement(Xuong::pluck('MaXuong')),
            'MaDonViPhanPhoi' => $this->faker->unique()->randomElement(DonViPhanPhoi::pluck('MaDonViPhanPhoi')),
        ];
    }
}
