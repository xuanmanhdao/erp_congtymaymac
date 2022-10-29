<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateXuongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('xuong', function (Blueprint $table) {
            $table->string('MaXuong', 50)->primary();
            $table->string('TenXuong', 100);
            $table->string('DiaChi', 200);
            $table->string('MaVatTu', 50);
            $table->integer('SoLuongVatTu');
            $table->string('MoTaXuong', 200);
            // $table->text('MoTaXuong');

            $table->foreign('MaVatTu')->references('MaVatTu')->on('vattu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('xuong');
    }
}
