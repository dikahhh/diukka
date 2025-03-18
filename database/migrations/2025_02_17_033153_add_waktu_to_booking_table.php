<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWaktuToBookingTable extends Migration
{
    public function up()
    {
        Schema::table('booking', function (Blueprint $table) {
            $table->string('waktu')->nullable()->after('status'); // misal setelah kolom status
        });
    }

    public function down()
    {
        Schema::table('booking', function (Blueprint $table) {
            $table->dropColumn('waktu');
        });
    }
}
