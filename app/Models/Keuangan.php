<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    use HasFactory;
    protected $table = 'keuangan';
    protected $fillable = [
        'id',
        'nip',
        'asisten_id',
        'semester',
        'catatan',
        'week',
        'keterangan',
        'debit',
        'credit',
        'saldo',
      
    ];
}
