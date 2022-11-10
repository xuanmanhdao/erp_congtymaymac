<?php

namespace Database\Factories;

use App\Models\DonViPhanPhoi;
use Illuminate\Database\Eloquent\Factories\Factory;

class DonViPhanPhoiFactory extends Factory
{
    protected $model = DonViPhanPhoi::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'MaDonViPhanPhoi' => $this->faker->unique()->userName(),
            'TenDonViPhanPhoi' => $this->faker->name(),
            'DiaChi' => $this->faker->address(),
            'SoDienThoai' => $this->faker->phoneNumber(),
            'Fax' => $this->faker->phoneNumber(),
            'Email' => $this->faker->unique()->email(),
        ];
    }
}
