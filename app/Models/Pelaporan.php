<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pelaporan extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'pelaporan';
    protected $fillable = [
        'admin_id',
        'proposal_id',
        'tanggal',
        'file',
        'jenis',
    ];
    public function userId()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
    public function proposalId()
    {
        return $this->belongsTo(Proposal::class, 'proposal_id', 'id');
    }
}
