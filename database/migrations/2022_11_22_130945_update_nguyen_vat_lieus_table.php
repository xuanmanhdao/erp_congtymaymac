<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UpdateNguyenVatLieusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nguyenvatlieu', function (Blueprint $table) {
            $table->dropForeign('nguyenvatlieu_madonviphanphoi_foreign');
            $table->dropColumn('MaDonViPhanPhoi');
            $table->dropForeign('nguyenvatlieu_maxuong_foreign');
            $table->dropColumn('MaXuong');

            $table->text('MoTaNguyenVatLieu');
            $table->timestamp('ThoiGianTao')->useCurrent();
            $table->timestamp('ThoiGianCapNhat')->useCurrent()->useCurrentOnUpdate();

            DB::statement('ALTER TABLE nguyenvatlieu ALTER SoLuong SET DEFAULT 0;');
            DB::statement("ALTER TABLE nguyenvatlieu ALTER DonViTinh SET DEFAULT 'kilogram';");
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
