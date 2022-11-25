<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            XuongSeeder::class,
            // VatTuSeeder::class,
            ChucVuSeeder::class,
            NhanVienSeeder::class,
            TaiKhoanSeeder::class,
            // DonViPhanPhoiSeeder::class,
            // NguyenVatLieuSeeder::class,
            LoaiQuyTrinhSeeder::class,
            // LoaiSeeder::class,
            // SanPhamSeeder::class,
            XuatKhoSeeder::class,
            // ChiTietXuatKhoSeeder::class,
            // NguyenVatLieuLoaiQuyTrinhSeeder::class,

            DonViPhanPhoiSeeder::class,
            NhapKhoSeeder::class,
        ]); 
        // $this->seed(VatTuSeeder::class);
    }
}
