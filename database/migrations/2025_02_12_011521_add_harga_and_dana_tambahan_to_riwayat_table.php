<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('riwayat', function (Blueprint $table) {
            // Menggunakan decimal(12,2) untuk menyimpan nilai harga
            $table->decimal('harga', 12, 2)->nullable()->after('catatan');
            // Kolom dana_tambahan untuk menyimpan nilai dana tambahan
            $table->decimal('dana_tambahan', 12, 2)->nullable()->after('harga');
            // Tambahkan kolom untuk menyimpan keterangan/deskripsi dana tambahan (disimpan dalam format JSON)
            $table->json('dana_tambahan_deskripsi')->nullable()->after('dana_tambahan');
        });
    }

    public function down(): void
    {
        Schema::table('riwayat', function (Blueprint $table) {
            $table->dropColumn(['dana_tambahan_deskripsi', 'dana_tambahan', 'harga']);
        });
    }
};
