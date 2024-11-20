<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viewreport extends Model
{
    use HasFactory;
    protected $table = 'viewreport';
    protected $fillable = [
        'id',
        'setting_name',
        'day_of_week',
        'input_time',      
      
       
    ];
}
