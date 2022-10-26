<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanPhamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->string('MaSanPham', 50)->primary();
            $table->string('TenSanPham', 100);
            $table->integer('SoLuong');
            $table->string('DonViTinh', 50);
            $table->integer('Gia');
            $table->text('MoTaSanPham');
            $table->string('MaLoai', 50);
            $table->string('MaDonViPhanPhoi', 50);
            $table->string('MaLoaiQuyTrinh', 50);

            $table->foreign('MaLoai')->references('MaLoai')->on('loai');
            $table->foreign('MaDonViPhanPhoi')->references('MaDonViPhanPhoi')->on('donviphanphoi');
            $table->foreign('MaLoaiQuyTrinh')->references('MaLoaiQuyTrinh')->on('loaiquytrinh');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanpham');
    }
}
