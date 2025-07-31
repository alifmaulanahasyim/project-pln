<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
public function up(): void
{
    Schema::table('laporan_harian', function (Blueprint $table) {
        $table->enum('status_kehadiran', ['hadir', 'izin', 'sakit', 'alpha'])->default('alpha');
    });
}

public function down(): void
{
    Schema::table('laporan_harian', function (Blueprint $table) {
        $table->dropColumn('status_kehadiran');
    });
}

};
