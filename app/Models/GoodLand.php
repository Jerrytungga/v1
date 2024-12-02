<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoodLand extends Model
{
    use HasFactory;
    protected $table = 'good_land';
    protected $fillable = [
        'nip',
        'asisten_id',
        'semester',
        'verses',
        'poin_verses',
        'da',
        'poin_da',
        'dt',
        'poin_dt',
        'ds',
        'poin_ds',
        'experience_1',
        'poin_experience_1',
        'experience_2',
        'poin_experience_2',
        'experience_3',
        'poin_experience_3',
        'experience_4',
        'poin_experience_4',
        'experience_5',
        'poin_experience_5',
        'experience_6',
        'poin_experience_6',
        'week',
        'catatan',
        'created_at',
        'updated_at',
        'experience_1_time',
        'experience_2_time',
        'experience_3_time',
        'experience_4_time',
        'experience_5_time',
        'experience_6_time',
    ];
}
