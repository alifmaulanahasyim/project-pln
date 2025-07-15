<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up(): void
{
    Schema::table('moved_mahasiswas', function (Blueprint $table) {
        $table->json('sertifikat_dikirim')->nullable();
    });
}

public function down(): void
{
    Schema::table('moved_mahasiswas', function (Blueprint $table) {
        $table->dropColumn('sertifikat_dikirim');
    });
}
};
