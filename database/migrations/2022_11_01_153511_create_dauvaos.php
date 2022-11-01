<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDauvaos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dauvao', function (Blueprint $table) {
            $table->string('MaDauVao', 50)->primary();
            $table->text('TenSPDauVao');
            $table->text('Loai');
            $table->text('HienTrang');
            $table->text('MauSac');
            $table->date('NgayNhan');
            $table->text('GhiChu');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dauvao');
    }
}
