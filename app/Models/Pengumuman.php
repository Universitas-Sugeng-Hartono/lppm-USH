<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengumuman extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'pengumuman';
    protected $fillable = [
        'id',
        'isi',
        'pengirim',
        'file',
        'tanggal',
        'gambar',
        'file'
    ];
}
