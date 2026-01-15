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
        // Skills
        DB::table('tbkeahlian_23312240')->insert([
            [
                'id_keahlian' => 1,
                'nama_keahlian' => 'HTML',
                'deskripsi' => 'Desain tampilan website',
                'icon_path' => 'uploads/html_icon.png',
                'status' => 'Tampil',
                'created_at' => '2025-10-21 23:34:48',
                'updated_at' => '2025-10-22 01:07:47',
            ],
            [
                'id_keahlian' => 2,
                'nama_keahlian' => 'CSS',
                'deskripsi' => 'Mengatur tampilan halaman web',
                'icon_path' => 'uploads/css_icon.png',
                'status' => 'Tampil',
                'created_at' => '2025-10-21 23:34:48',
                'updated_at' => '2025-10-21 23:34:48',
            ],
            [
                'id_keahlian' => 3,
                'nama_keahlian' => 'JavaScript',
                'deskripsi' => 'Menambahkan interaktivitas pada web',
                'icon_path' => 'uploads/js_icon.png',
                'status' => 'Tampil',
                'created_at' => '2025-10-21 23:34:48',
                'updated_at' => '2025-10-22 01:06:07',
            ],
        ]);

        // Projects
        DB::table('tbproyek_23312240')->insert([
            [
                'id_proyek' => 1,
                'nama_proyek' => 'Game Mam Sehat',
                'tahun_proyek' => 2024,
                'jenis_proyek' => 'Game',
                'durasi_pengerjaan' => '4 bulan',
                'tim_pengembang' => '',
                'deskripsi_proyek' => '',
                'gambar_path' => 'uploads/projects/menu_1761083029.png',
                'video_path' => '',
                'status' => 'Tampil',
                'created_at' => '2025-10-22 01:13:50',
                'updated_at' => '2025-10-22 04:43:49',
            ],
            [
                'id_proyek' => 2,
                'nama_proyek' => '',
                'tahun_proyek' => 0000,
                'jenis_proyek' => '',
                'durasi_pengerjaan' => '',
                'tim_pengembang' => '',
                'deskripsi_proyek' => '',
                'gambar_path' => '',
                'video_path' => '',
                'status' => 'Sembunyi',
                'created_at' => '2025-10-22 01:45:23',
                'updated_at' => '2025-10-22 04:43:06',
            ],
            [
                'id_proyek' => 3,
                'nama_proyek' => '',
                'tahun_proyek' => 0000,
                'jenis_proyek' => '',
                'durasi_pengerjaan' => '',
                'tim_pengembang' => '',
                'deskripsi_proyek' => '',
                'gambar_path' => '',
                'video_path' => '',
                'status' => 'Sembunyi',
                'created_at' => '2025-10-22 02:07:32',
                'updated_at' => '2025-10-22 04:43:10',
            ],
        ]);
    }
}
