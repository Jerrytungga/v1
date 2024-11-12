<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prayers extends Model
{
    use HasFactory;
    protected $table = 'prayers';
    protected $fillable = [
        'id',
        'nip',
        'asisten_id',
        'semester',
        'week',
        'topic',
        'prayer_date',       // Use 'pl_pb' instead of 'pl/pb'
        'light',
        'appreciation',
        'action',
        'prayer_answered_date',
        'prayer_answer',
        
        // 'created_at' and 'updated_at' are automatically managed by Eloquent, so no need to include them here
    ];
}
