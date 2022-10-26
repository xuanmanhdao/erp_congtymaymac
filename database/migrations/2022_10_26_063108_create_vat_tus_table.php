<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVatTusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vattu', function (Blueprint $table) {
            $table->string('MaVatTu', 50)->primary();
            $table->string('TenVatTu', 100);
            $table->integer('SoLuong');
            $table->integer('GiaVatTu');
            $table->string('MoTaVatTu', 200);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vattu');
    }
}
