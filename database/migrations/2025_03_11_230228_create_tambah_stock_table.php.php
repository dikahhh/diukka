<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tambah_stock_spareparts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sparepart_id');
            $table->integer('quantity'); // jumlah stock yang ditambahkan, harus positif
            $table->string('keterangan')->nullable(); // keterangan atau catatan (opsional)
            $table->unsignedBigInteger('user_id')->nullable(); // operator yang melakukan penambahan (opsional)
            $table->timestamps();

            $table->foreign('sparepart_id')
                  ->references('id')->on('sparepart')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tambah_stock_spareparts');
    }
};
