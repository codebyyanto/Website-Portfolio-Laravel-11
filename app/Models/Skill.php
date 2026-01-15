<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table = 'tbkeahlian_23312240';
    protected $primaryKey = 'id_keahlian';

    protected $fillable = [
        'nama_keahlian',
        'kategori_23312240',
        'deskripsi',
        'icon_path',
        'status',
    ];
}
