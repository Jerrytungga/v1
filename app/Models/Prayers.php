<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prayers extends Model
{
    use HasFactory;
    protected $table = 'prayers';
    protected $fillable = [
        'nip',
        'asisten_id',
        'semester',
        'week',
        'catatan',
        'topic',
        'poin_topic',
        'prayer_date',
        'light',
        'light_poin',
        'appreciation',
        'appreciation_poin',
        'action',
        'action_poin',
        'prayer_answered_date',
        'prayer_answer',
        'created_at',
        'updated_at',
        
        // 'created_at' and 'updated_at' are automatically managed by Eloquent, so no need to include them here
    ];
}
