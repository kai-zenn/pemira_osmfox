<?php

use Illuminate\Database\Eloquent\SoftDeletes;
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
        Schema::create('candidates', function (Blueprint $table) {
            $table->id()->primary();
            $table->integer('number');
            $table->integer('nomor');
            $table->string('nama_ketua');
            $table->string('kelas_ketua');
            $table->string('nama_wakil');
            $table->string('kelas_wakil');
            $table->text('visi');
            $table->text('misi');
            $table->text('program');
            $table->string('vision_mission_image');
            $table->string('photo_path');
            $table->timestamps();
            $table->SoftDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
