<?php

namespace Database\Factories;

use App\Models\ChucVu;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChucVuFactory extends Factory
{
    protected $model = ChucVu::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $maChucVu = ['NguoiQuanLyKho', 'NhanVienKho1', 'NhanVienkho2'];
        $tenChucVu = ['Nhân viên kho hàng', 'Quản lý kho hàng'];
        $moTaChucVu = 'Nhập liệu, theo dõi sự thay đổi';
        $i=0;
        return [
            // 'MaChucVu' => $this->faker->unique()->userName(),
            // 'TenChucVu' => $this->faker->unique()->jobTitle(),
            // 'MoTaChucVu' =>$this->faker->paragraph(),

            'MaChucVu' => $this->faker->unique()->randomElements($maChucVu)[0],
            'TenChucVu' =>  $this->faker->randomElements($tenChucVu)[0],
            'MoTaChucVu' => $moTaChucVu,
        ];
    }
}
