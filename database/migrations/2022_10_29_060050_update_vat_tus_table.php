<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UpdateVatTusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        // if (!Schema::hasColumn('vattu', 'MoTaVatTu')) {
            Schema::table('vattu', function (Blueprint $table) {
                // $table->text("MoTaVatTu")->change(); 
                DB::statement('ALTER TABLE vattu MODIFY COLUMN MoTaVatTu text');
                $table->string('MaXuong', 50);
                $table->foreign('MaXuong')->references('MaXuong')->on('xuong');

            });
        // }
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
