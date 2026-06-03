<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class Karya extends Model
{
    use HasFactory;
    protected $table = 'karya';
    protected $fillable = [
        'id',
        'user_id',
        'review_id',
        'surat_pernyataan',
        'surat_pengalihan',
        'scan_ktp',
        'deskripsi',
        'pemohon_hc',
        'jenis',
        'status',
    ];
    
    public function userId()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function revId()
    {
        return $this->belongsTo(User::class, 'review_id');
    }

}
