<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::table('karya', function (Blueprint $table) {
        $table->renameColumn('gambar', 'file_karya');
    });
}

public function down(): void
{
    Schema::table('karya', function (Blueprint $table) {
        $table->renameColumn('file_karya', 'gambar');
    });
}

};
