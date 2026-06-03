<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Visitor extends Model
{
    protected $table = 'visitors';
    protected $fillable = [
        'id',
        'ip',
        'visited_at',
        'browser',
        'coordinates',
    ];
}
