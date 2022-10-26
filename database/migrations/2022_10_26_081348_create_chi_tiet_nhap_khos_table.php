<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChiTietNhapKhosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietnhapkho', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('MaNhapKho');
            $table->string('MaNguyenVatLieu', 50);
            $table->integer('SoLuong');
            $table->string('DonViTinh', 50);
            $table->integer('ThanhTien');

            $table->foreign('MaNhapKho')->references('MaNhapKho')->on('nhapkho');
            $table->foreign('MaNguyenVatLieu')->references('MaNguyenVatLieu')->on('nguyenvatlieu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chitietnhapkho');
    }
}
