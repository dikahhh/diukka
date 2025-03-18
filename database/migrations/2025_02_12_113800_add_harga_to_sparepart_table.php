<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('sparepart', function (Blueprint $table) {
            // Menambahkan kolom harga bertipe decimal (sesuaikan precision dan scale jika perlu)
            $table->decimal('harga', 12, 2)->default(0)->after('deskripsi');
        });
    }

    public function down(): void
    {
        Schema::table('sparepart', function (Blueprint $table) {
            $table->dropColumn('harga');
        });
    }
};
