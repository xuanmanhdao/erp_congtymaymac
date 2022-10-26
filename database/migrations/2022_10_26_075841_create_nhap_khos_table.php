<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNhapKhosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhapkho', function (Blueprint $table) {
            $table->increments('MaNhapKho');
            $table->dateTime('ThoiGianNhap', $precision = 0);
            $table->integer('TongGia');
            $table->text('GhiChu');
            $table->string('MaNhanVien', 50);
            $table->string('MaDonViPhanPhoi', 50);

            $table->foreign('MaNhanVien')->references('MaNhanVien')->on('nhanvien');
            $table->foreign('MaDonViPhanPhoi')->references('MaDonViPhanPhoi')->on('donviphanphoi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nhapkho');
    }
}
