<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->integer('nis')->unique();
            $table->string('nama');
            $table->string('alamat');
            // Jika nullable
            // $table->string('alamat')->nullable();
            // $table->foreignId('sekolah_id');
             // 2 Cara Menghubungkan foreign key sekolah_id ke table sekolah
            // $table->foreignId('sekolah_id')->references('id')->on('sekolah');
            $table->foreignId('sekolah_id')->constrained('sekolah')->cascadeOnDelete()->cascadeOnUpdate(); //cascade untuk hak akses ketika update dan delete
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswas');
    }
};
