<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNguyenvatlieuLoaiquytrinhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nguyenvatlieu_loaiquytrinh', function (Blueprint $table) {
            $table->string('MaLoaiQuyTrinh');
            $table->foreign('MaLoaiQuyTrinh')->references('MaLoaiQuyTrinh')->on('loaiquytrinh')->onDelete('cascade');
            $table->string('MaNguyenVatLieu');
            $table->foreign('MaNguyenVatLieu')->references('MaNguyenVatLieu')->on('nguyenvatlieu')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nguyenvatlieu_loaiquytrinh');
    }
}
