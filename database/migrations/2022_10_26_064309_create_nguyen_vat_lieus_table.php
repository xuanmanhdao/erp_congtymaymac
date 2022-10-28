<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNguyenVatLieusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nguyenvatlieu', function (Blueprint $table) {
            $table->string('MaNguyenVatLieu', 50)->primary();
            $table->string('TenNguyenVatLieu', 100);
            $table->integer('SoLuong');
            $table->string('DonViTinh', 50);
            $table->string('MaXuong', 50);
            $table->string('MaDonViPhanPhoi', 50);

            $table->foreign('MaXuong')->references('MaXuong')->on('xuong');
            $table->foreign('MaDonViPhanPhoi')->references('MaDonViPhanPhoi')->on('donviphanphoi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nguyenvatlieu');
    }
}
