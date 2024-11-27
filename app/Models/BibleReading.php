<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BibleReading extends Model
{
    use HasFactory;
    protected $table = 'bible';
    protected $fillable = [
        'id',
        'asisten_id',
        'nip',
        'pl_pb',       // Use 'pl_pb' instead of 'pl/pb'
        'book',
        'poin',
        'verse',
        'phrase_light',
        'semester',
        'catatan',
        'week',
        // 'created_at' and 'updated_at' are automatically managed by Eloquent, so no need to include them here
    ];
}
