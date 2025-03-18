<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNoMesinToKendaraanTable extends Migration
{
    public function up()
    {
        Schema::table('kendaraan', function (Blueprint $table) {
            $table->string('no_mesin')->unique()->after('tipe');
        });
    }

    public function down()
    {
        Schema::table('kendaraan', function (Blueprint $table) {
            $table->dropColumn('no_mesin');
        });
    }
}
