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
        Schema::create('tbproyek_23312240', function (Blueprint $table) {
            $table->id('id_proyek');
            $table->string('nama_proyek', 150);
            $table->year('tahun_proyek');
            $table->string('jenis_proyek', 50);
            $table->string('durasi_pengerjaan', 50)->nullable();
            $table->text('deskripsi_proyek')->nullable();
            $table->text('tim_pengembang')->nullable(); // Note: order slightly different in backup but functionality identical
            $table->string('gambar_path')->nullable();
            $table->string('video_path')->nullable();
            $table->enum('status', ['Tampil', 'Sembunyi'])->default('Tampil');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbproyek_23312240');
    }
};
