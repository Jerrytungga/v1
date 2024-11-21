<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poinjurnal extends Model
{
    use HasFactory;
    protected $table = 'poin_jurnal';
    protected $fillable = [
        'id',
        'semester',
        'bible',
        'memorizing_bible',
        'hymns',
        'five_times_prayer',
        'personal_goals',       // Use 'pl_pb' instead of 'pl/pb'
        'good_land',
        'prayer_book',
        'summary_of_ministry',
        'fellowship',
        'script_ts_exhibition',
        'agenda',
        'total',
        
        // 'created_at' and 'updated_at' are automatically managed by Eloquent, so no need to include them here
    ];
}
