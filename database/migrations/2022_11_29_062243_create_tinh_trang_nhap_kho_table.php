<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTinhTrangNhapKhoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::create('tinh_trang_nhap_kho', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('MaNhapKho');
            $table->integer('TinhTrang');
           
           
            $table->foreign('MaNhapKho')->references('MaNhapKho')->on('nhapkho');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tinh_trang_nhap_kho');
    }
}
