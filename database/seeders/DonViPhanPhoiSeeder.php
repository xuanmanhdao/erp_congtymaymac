<?php

namespace Database\Seeders;

use App\Models\DonViPhanPhoi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DonViPhanPhoiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DonViPhanPhoi::factory()->count(50)->create();

        $arrayInsert = [
            ['MaDonViPhanPhoi' => 'DonViPhanPhoi00', 'TenDonViPhanPhoi' => 'Công ty trách nhiệm hữu hạn Thăng Long', 'DiaChi' => 'Đông Anh- Hà Nội', 'SoDienThoai' => '0365668000', 'Fax' => '0365668000', 'Email' => 'thanglongcorp@gmail.com'],
            ['MaDonViPhanPhoi' => 'DonViPhanPhoi01', 'TenDonViPhanPhoi' => 'Làng Sắc', 'DiaChi' => 'Mỹ Lộc - Nam Định', 'SoDienThoai' => '0365669000', 'Fax' => '0365669000', 'Email' => 'phanphoivainamdinh@gmail.com'],
            ['MaDonViPhanPhoi' => 'DonViPhanPhoi02', 'TenDonViPhanPhoi' => 'Làng nghề Gia Lâm', 'DiaChi' => 'Gia Lâm - Hà Nội', 'SoDienThoai' => '0365667000', 'Fax' => '0365667000', 'Email' => 'vaigialam@gmail.com'],
            ['MaDonViPhanPhoi' => 'DonViPhanPhoi03', 'TenDonViPhanPhoi' => 'Công ty phân phối nước xả vải Sài Gòn', 'DiaChi' => 'Bình Thạch - Hồ Chí Minh', 'SoDienThoai' => '0365665000', 'Fax' => '0365665000', 'Email' => 'saigonht@gmail.com'],
        ];


        DB::table("donviphanphoi")->insert($arrayInsert);
    }
}
