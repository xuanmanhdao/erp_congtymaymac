<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateXuatKhosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('xuatkho', function (Blueprint $table) {
            $table->increments('MaXuatKho');
            $table->dateTime('ThoiGianXuat', $precision = 0);
            $table->integer('TongGia');
            $table->text('GhiChu');
            $table->string('MaNhanVien', 50);
            $table->string('MaXuong', 50);

            $table->foreign('MaNhanVien')->references('MaNhanVien')->on('nhanvien');
            $table->foreign('MaXuong')->references('MaXuong')->on('xuong');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('xuatkho');
    }
}
