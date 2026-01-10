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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('nama_proyek');
            $table->integer('tahun_proyek');
            $table->string('jenis_proyek');
            $table->string('durasi_pengerjaan')->nullable();
            $table->text('deskripsi_proyek')->nullable();
            $table->text('tim_pengembang')->nullable();
            $table->string('gambar_path')->nullable();
            $table->string('video_path')->nullable();
            $table->enum('status', ['Tampil', 'Tidak Tampil'])->default('Tampil');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
