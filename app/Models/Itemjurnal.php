<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itemjurnal extends Model
{
    use HasFactory;
    protected $table = 'menus';
    protected $fillable = [
        'id',
        'name',
        'route',
        'icon',       // Use 'pl_pb' instead of 'pl/pb'
        'type',
        'status',
       
        
        // 'created_at' and 'updated_at' are automatically managed by Eloquent, so no need to include them here
    ];
}
