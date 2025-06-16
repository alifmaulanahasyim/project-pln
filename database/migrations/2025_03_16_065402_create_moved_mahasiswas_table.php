<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovedMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('moved_mahasiswas', function (Blueprint $table) {
            $table->string('nim')->primary(); 
            $table->string('nim2')->nullable();
            $table->string('nim3')->nullable();
            $table->string('nim4')->nullable();
            $table->string('nim5')->nullable();
            $table->string('nim6')->nullable();
            $table->string('nim7')->nullable();
            $table->string('email');
            $table->string('nama');
            $table->string('nama2')->nullable();
            $table->string('nama3')->nullable();
            $table->string('nama4')->nullable();
            $table->string('nama5')->nullable();
            $table->string('nama6')->nullable();
            $table->string('nama7')->nullable();
            $table->enum('jeniskelamin', ['laki-laki', 'perempuan']);
            $table->enum('jeniskelamin2', ['laki-laki', 'perempuan'])->nullable();
            $table->enum('jeniskelamin3', ['laki-laki', 'perempuan'])->nullable();
            $table->enum('jeniskelamin4', ['laki-laki', 'perempuan'])->nullable();
            $table->enum('jeniskelamin5', ['laki-laki', 'perempuan'])->nullable();
            $table->enum('jeniskelamin6', ['laki-laki', 'perempuan'])->nullable();
            $table->enum('jeniskelamin7', ['laki-laki', 'perempuan'])->nullable();
            $table->string('nama_institusi');
            $table->string('jurusan');
            $table->string('nohp');
            $table->string('semester');
            $table->date('mulai_magang')->nullable();
            $table->date('selesai_magang')->nullable();
            $table->string('alasan');
            $table->string('divisi');
            $table->string('linkfoto');
            $table->string('linksurat');
            $table->string('status')->nullable(); 
            $table->timestamps();
            // If you want to use soft deletes, uncomment the line below
            // $table->softDeletes(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moved_mahasiswas');
    }
}