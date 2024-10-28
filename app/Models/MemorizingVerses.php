<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemorizingVerses extends Model
{
    use HasFactory;
    protected $table = 'memorizing_verses';
    protected $fillable = [
        'id',
        'nip',
        'asisten_id',
        'bible',       // Use 'pl_pb' instead of 'pl/pb'
        'paraf',
        
        // 'created_at' and 'updated_at' are automatically managed by Eloquent, so no need to include them here
    ];
}
