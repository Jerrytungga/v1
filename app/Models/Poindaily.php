<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poindaily extends Model
{
    use HasFactory;
    protected $table = 'target_poin_daily';
    protected $fillable = [
        'semester',
        'bible',
        'memorizing_bible',
        'hymns',
        'five_times_prayer',
        'personal_goals',
        'good_land',
        'prayer_book',
        'summary_of_ministry',
        'fellowship',
        'script_ts_exhibition',
        'agenda',
        'financial',
    ];
}
