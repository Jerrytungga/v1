<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fellowship extends Model
{
    use HasFactory;
    protected $table = 'fellowship';
    protected $fillable = [
        'id',
        'nip',
        'asisten_id',
        'semester',
        'week',
        'catatan',
        'topic',
        'notes_trainee',
        'action',
        'asisten_trainer',
        
        // 'created_at' and 'updated_at' are automatically managed by Eloquent, so no need to include them here
    ];
}
