<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoaiQuyTrinhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loaiquytrinh', function (Blueprint $table) {
            $table->string('MaLoaiQuyTrinh', 50)->primary();
            $table->string('TenQuyTrinh', 100);
            $table->text('MoTaQuyTrinh');
            $table->string('MaNguyenVatLieu', 50);

            $table->foreign('MaNguyenVatLieu')->references('MaNguyenVatLieu')->on('nguyenvatlieu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loaiquytrinh');
    }
}
