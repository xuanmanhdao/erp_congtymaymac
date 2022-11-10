<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UpdateDonViPhanPhoisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('donviphanphoi', function (Blueprint $table) {
            DB::statement('ALTER TABLE donviphanphoi MODIFY COLUMN SoDienThoai VARCHAR (50)');
            DB::statement('ALTER TABLE nhanvien ADD UNIQUE (Email);');
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
