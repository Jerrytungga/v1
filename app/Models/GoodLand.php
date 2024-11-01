<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoodLand extends Model
{
    use HasFactory;
    protected $table = 'good_land';
    protected $fillable = [
        'nip', 'asisten_id', 'semester', 'verses', 'da', 'dt', 'ds', 'experience_1', 'experience_2', 'experience_3', 'experience_4', 'experience_5', 'experience_6','week', 'catatan', 
    ];
}
