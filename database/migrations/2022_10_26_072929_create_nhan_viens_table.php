<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNhanViensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhanvien', function (Blueprint $table) {
            $table->string('MaNhanVien', 50)->primary();
            $table->string('TenNhanVien', 100);
            $table->date('NgaySinh');
            $table->string('CanCuocCongDan', 50);
            $table->boolean('GioiTinh');
            $table->string('DiaChi', 200);
            $table->string('Email', 100);
            $table->string('SoDienThoai', 15);
            $table->string('MaChucVu', 50);
            $table->string('MaXuong', 50);

            $table->foreign('MaChucVu')->references('MaChucVu')->on('chucvu');
            $table->foreign('MaXuong')->references('MaXuong')->on('xuong');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nhanvien');
    }
}
