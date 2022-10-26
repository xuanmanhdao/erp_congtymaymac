<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChiTietXuatKhosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietxuatkho', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('MaXuatKho');
            $table->string('MaSanPham', 50);
            $table->integer('SoLuong');
            $table->string('DonViTinh', 50);
            $table->integer('ThanhTien');

            $table->foreign('MaXuatKho')->references('MaXuatKho')->on('xuatkho');
            $table->foreign('MaSanPham')->references('MaSanPham')->on('sanpham');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chitietxuatkho');
    }
}
