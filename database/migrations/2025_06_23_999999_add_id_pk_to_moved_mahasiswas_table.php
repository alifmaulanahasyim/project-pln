<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
public function up()
{
    Schema::table('moved_mahasiswas', function (Blueprint $table) {
        // Hapus primary key dari nim (pakai raw SQL karena Laravel tidak support dropPrimary dengan nama custom)
        DB::statement('ALTER TABLE moved_mahasiswas DROP PRIMARY KEY');
        // Tambahkan kolom id sebagai primary key auto increment
        $table->bigIncrements('id')->first();
    });
}

public function down()
{
    Schema::table('moved_mahasiswas', function (Blueprint $table) {
        $table->dropColumn('id');
        // Jadikan nim primary key lagi
        DB::statement('ALTER TABLE moved_mahasiswas ADD PRIMARY KEY (nim)');
    });
}
};
