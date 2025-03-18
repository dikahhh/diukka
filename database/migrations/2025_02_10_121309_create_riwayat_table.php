<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatTable extends Migration
{
    public function up()
    {
        Schema::create('riwayat', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_service');
            $table->text('keluhan')->nullable();
            $table->string('cabang')->nullable();
            $table->string('tempat')->nullable();
            $table->date('tanggal');
            $table->integer('no_antrian');
            $table->string('ktp');
            $table->unsignedBigInteger('karyawan_id');
            $table->text('catatan')->nullable();
            $table->timestamps();

            $table->foreign('karyawan_id')
                  ->references('id')->on('karyawan')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('riwayat');
    }
}
