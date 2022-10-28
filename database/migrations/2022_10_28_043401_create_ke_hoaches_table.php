<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeHoachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kehoach', function (Blueprint $table) {
            $table->string('MaKeHoach', 50)->primary();
            $table->date('NgayBatDau');
            $table->date('NgayKetThuc');
            $table->text('NoiDungKeHoach');
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
        Schema::dropIfExists('kehoach');
    }
}
