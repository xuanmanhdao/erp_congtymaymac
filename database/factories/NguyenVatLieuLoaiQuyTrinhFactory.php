<?php

namespace Database\Factories;

use App\Models\LoaiQuyTrinh;
use App\Models\NguyenVatLieu;
use App\Models\NguyenVatLieuLoaiQuyTrinh;
use Illuminate\Database\Eloquent\Factories\Factory;

class NguyenVatLieuLoaiQuyTrinhFactory extends Factory
{
    protected $model=NguyenVatLieuLoaiQuyTrinh::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'MaLoaiQuyTrinh'=>$this->faker->randomElement(LoaiQuyTrinh::pluck('MaLoaiQuyTrinh')),
            'MaNguyenVatLieu'=>$this->faker->randomElement(NguyenVatLieu::pluck('MaNguyenVatLieu')),
        ];
    }
}
