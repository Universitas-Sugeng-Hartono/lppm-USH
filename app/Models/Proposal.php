<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proposal extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'proposals';
    protected $fillable = [
        'id',
        'admin_id',
        'reviewer_id',
        'judul',
        'progdi',
        'file_review1',
        'file_proposal',
        'catatan_review1',
        'file_review2',
        'catatan_review2',
        'status',
        'reviewer_id2',
        'status_review',
        'status_final',
        'file_revisi',
        'tanggal',
        'jenis'
    ];
    
    public function userId()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
    
    public function revId()
    {
        return $this->belongsTo(User::class, 'reviewer_id');
    }
    
    public function rev2Id()
    {
        return $this->belongsTo(User::class, 'reviewer_id2');
    }
}
