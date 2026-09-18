<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up(): void
{
    Schema::create('karya', function (Blueprint $table) {
        $table->id('id_karya');

        $table->foreignId('id_mahasiswa')
            ->constrained('mahasiswa', 'id_mahasiswa')
            ->onDelete('cascade');

        $table->foreignId('id_kategori')
            ->constrained('kategori', 'id_kategori')
            ->onDelete('cascade');

        $table->string('judul');
        $table->text('deskripsi');
        $table->string('gambar')->nullable();
        $table->enum('status', ['menunggu', 'disetujui', 'ditolak'])
            ->default('menunggu');
        $table->text('catatan')->nullable();

        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('karya');
    }
};
