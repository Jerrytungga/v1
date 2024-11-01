<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class timeprayer extends Model
{
    use HasFactory;
    protected $table = '5timeprayer';
    protected $fillable = [
        'id',
        'nip',
        'asisten_id',
        'poin_prayer',      
        'catatan',
        'semester',
        'week',
       
    ];
}
