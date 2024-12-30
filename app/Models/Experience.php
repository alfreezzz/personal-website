<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $table = 'experiences';

    protected $fillable = ['thn_mulai', 'thn_selesai', 'nama_perusahaan', 'posisi', 'deskripsi'];
}
