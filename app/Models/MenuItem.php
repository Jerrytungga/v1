<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    // Define the table name (optional if the table name is the plural of the model)
    protected $table = 'menu_items__asisten';

    // Define the fillable fields for mass assignment
    protected $fillable = ['title', 'route', 'status', 'type'];
}
