<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatSparepartTable extends Migration
{
    public function up()
    {
        Schema::create('riwayat_sparepart', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('riwayat_id');
            $table->unsignedBigInteger('sparepart_id');
            $table->integer('quantity');
            $table->timestamps();

            $table->foreign('riwayat_id')
                  ->references('id')->on('riwayat')
                  ->onDelete('cascade');

            $table->foreign('sparepart_id')
                  ->references('id')->on('sparepart')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('riwayat_sparepart');
    }
}
