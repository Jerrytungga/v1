<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report_weekly extends Model
{
    use HasFactory;
    protected $table = 'reportjurnal';
    protected $fillable = [
        'id',
        'nip',
        'asisten_id',
        'semester',
        'batch',
        'catatan',
        'week',
        'bible', 
        'memorizing',
        'hymns',
        'prayer_5_time',
        'tp',
        'doa',
        'p_goals',
        'ministry',
        'fellowship',
        'ts',
        'Agenda',
        'Finance',
        'Achievement',
        'standart_poin',
        'status',
    ];
}
