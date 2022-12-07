<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTinhTrangXuatKhoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tinh_trang_xuat_kho', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('MaXuatKho');
            $table->integer('TinhTrang');
           
           
            $table->foreign('MaXuatKho')->references('MaXuatKho')->on('xuatkho');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tinh_trang_xuat_kho');
    }
}
