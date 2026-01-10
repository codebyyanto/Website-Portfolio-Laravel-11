<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LegacyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Skills
        DB::table('skills')->insert([
            [
                'nama_keahlian' => 'HTML',
                'deskripsi' => 'Desain tampilan website',
                'icon_path' => 'uploads/html_icon.png',
                'status' => 'Tampil',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_keahlian' => 'CSS',
                'deskripsi' => 'Mengatur tampilan halaman web',
                'icon_path' => 'uploads/css_icon.png',
                'status' => 'Tampil',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_keahlian' => 'JavaScript',
                'deskripsi' => 'Menambahkan interaktivitas pada web',
                'icon_path' => 'uploads/js_icon.png',
                'status' => 'Tampil',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Projects
        DB::table('projects')->insert([
            [
                'nama_proyek' => 'Game Mam Sehat',
                'tahun_proyek' => 2024,
                'jenis_proyek' => 'Game',
                'durasi_pengerjaan' => '4 bulan',
                'deskripsi_proyek' => '',
                'tim_pengembang' => '',
                'gambar_path' => 'uploads/projects/menu_1761083029.png',
                'video_path' => '',
                'status' => 'Tampil',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
