<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up()
{
    Schema::table('mahasiswas', function (Blueprint $table) {
        // Hapus foreign key lama jika sudah ada
        $table->dropForeign(['user_id']);
        // Tambahkan/ubah foreign key menjadi cascade on delete
        $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
    });
}

public function down()
{
    Schema::table('mahasiswas', function (Blueprint $table) {
        $table->dropForeign(['user_id']);
    });
}
};
