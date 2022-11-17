<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateNguyenvatlieuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nguyenvatlieu', function (Blueprint $table) {
            $table->string('MaChatLieu',50)->after('TenNguyenVatLieu')->nullable();

            $table->foreign('MaChatLieu')->references('MaChatLieu')->on('chatlieu');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
