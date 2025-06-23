<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up()
{
    Schema::table('moved_mahasiswas', function (Blueprint $table) {
        $table->unsignedBigInteger('user_id')->nullable()->after('status');
    });
}

public function down()
{
    Schema::table('moved_mahasiswas', function (Blueprint $table) {
        $table->dropColumn('user_id');
    });
}
};
