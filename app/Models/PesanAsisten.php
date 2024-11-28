<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesanAsisten extends Model
{
    use HasFactory;
    protected $table = 'asisten_message';
    protected $fillable = [
        'id',
        'nip',
        'asisten_id',
        'semester',
        'catatan',
        'week',
        'pesan',
        'status',
      
    ];
}
