<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taskpersonalgoal extends Model
{
    use HasFactory;
    protected $table = 'task_personal_goals';
    protected $fillable = [
        'id',
        'nip',
        'asisten_id',
        'task',       // Use 'pl_pb' instead of 'pl/pb'
        'semester',
        'start',
        'end',
        'week',
        
        // 'created_at' and 'updated_at' are automatically managed by Eloquent, so no need to include them here
    ];
}
