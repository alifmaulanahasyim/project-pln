<?php
// database/migrations/xxxx_xx_xx_xxxxxx_create_vision_mission_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisionMissionTable extends Migration
{
    public function up()
    {
        Schema::create('vision_mission', function (Blueprint $table) {
            $table->id();
            $table->string('vision')->nullable();
            $table->text('mission')->nullable();
            $table->text('nomor')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vision_mission');
    }
}