<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hymns extends Model
{
    use HasFactory;
    protected $table = 'hymns';
    protected $fillable = [
        'id',
        'nip',
        'asisten_id',
        'no_Hymns',       // Use 'pl_pb' instead of 'pl/pb'
        'stanza',
        'frase',
        'semester',
        'catatan',
        'week',
        'poin',
        
        // 'created_at' and 'updated_at' are automatically managed by Eloquent, so no need to include them here
    ];
}
