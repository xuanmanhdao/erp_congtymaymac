<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonViPhanPhoisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donviphanphoi', function (Blueprint $table) {
            $table->string('MaDonViPhanPhoi', 50)->primary();
            $table->string('TenDonViPhanPhoi', 100);
            $table->string('DiaChi', 200);
            $table->string('SoDienThoai', 15);
            $table->string('Fax', 50);
            $table->string('Email', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donviphanphoi');
    }
}
