<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccProposal extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'acc_proposal';
    protected $fillable = [
        'id',
        'proposal_id',
        'judul',
        'progdi',
        'pengirim',
        'status',
    ];
    public function userId()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
