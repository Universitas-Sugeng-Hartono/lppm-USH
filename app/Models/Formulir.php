<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class Formulir extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'formulir';
    protected $fillable = [
        'id',
        'isi',
        'pengirim',
        'file',
        'tanggal',
    ];
}
