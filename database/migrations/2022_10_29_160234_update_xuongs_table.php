<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UpdateXuongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('xuong', function (Blueprint $table) {
            // $table->text("MoTaVatTu")->change(); 
            DB::statement('ALTER TABLE xuong MODIFY COLUMN MoTaXuong text');
            $table->dropForeign('xuong_mavattu_foreign');
            $table->dropColumn('MaVatTu');
            $table->dropColumn('SoLuongVatTu');
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
