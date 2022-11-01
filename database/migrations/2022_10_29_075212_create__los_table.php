<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Lo', function (Blueprint $table) {
            $table->string('MaLo', 50)->primary();
            $table->string('TenLo');
            $table->integer('SoLuong');
            $table->string('MaXuong');
            $table->string('TinhTrang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Lo');
    }
}
