<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    protected $table = 'portofolios';

    protected $fillable = ['img', 'nama_apk', 'jenis_apk', 'tgl_selesai', 'deskripsi', 'url', 'bahasa'];

    protected $casts = [
        'bahasa' => 'array',
    ];
}
