<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'nama_proyek',
        'tahun_proyek',
        'jenis_proyek',
        'durasi_pengerjaan',
        'deskripsi_proyek',
        'tim_pengembang',
        'gambar_path',
        'video_path',
        'status',
    ];
}
