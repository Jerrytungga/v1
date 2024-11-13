<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ministri extends Model
{
    use HasFactory;
    protected $table = 'ministries';
    protected $fillable = [
        'id',
        'nip',
        'asisten_id',
        'semester',
        'week',
        'catatan',
        'book_title',
        'news',
        'inspirasi',
        'category',
        
        // 'created_at' and 'updated_at' are automatically managed by Eloquent, so no need to include them here
    ];
}
