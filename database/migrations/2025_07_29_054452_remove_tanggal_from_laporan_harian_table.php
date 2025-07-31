<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up()
{
    Schema::table('laporan_harian', function (Blueprint $table) {
        $table->dropColumn('tanggal');
    });
}

public function down()
{
    Schema::table('laporan_harian', function (Blueprint $table) {
        $table->date('tanggal')->nullable(); // or default value
    });
}

};
