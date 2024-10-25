<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bible extends Model
{
    use HasFactory;
    protected $table = 'bible';
    protected $fillable = [
        'asisten_id',
        'nip',
        'pl_pb',       // Use 'pl_pb' instead of 'pl/pb'
        'book',
        'verse',
        'phrase_light',
        // 'created_at' and 'updated_at' are automatically managed by Eloquent, so no need to include them here
    ];
}
