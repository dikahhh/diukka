<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('riwayat', function (Blueprint $table) {
            $table->decimal('harga_service', 10, 2)->nullable()->after('dana_tambahan_deskripsi');
        });
    }
    
    public function down()
    {
        Schema::table('riwayat', function (Blueprint $table) {
            $table->dropColumn('harga_service');
        });
    }
    
};
