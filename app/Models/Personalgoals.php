<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personalgoals extends Model
{
    use HasFactory;
    protected $table = 'personal_goals';
    protected $fillable = [
        'id',
        'nip',
        'asisten_id',
        'personalgoals',       // Use 'pl_pb' instead of 'pl/pb'
        'catatan',
        'semester',
        'week',
        'poin',
        
        // 'created_at' and 'updated_at' are automatically managed by Eloquent, so no need to include them here
    ];
}
