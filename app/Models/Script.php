<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Script extends Model
{
    use HasFactory;
    protected $table = 'script';
    protected $fillable = [
        'id',
        'nip',
        'asisten_id',
        'semester',
        'week',
        'catatan', 
        'script',
        'Topic',
        'verse',
        'Truth',
        'Experience',
    ];
}
