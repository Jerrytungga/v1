<?php

namespace App\Models;

use App\Models\Asisten;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Trainee extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'trainee';
    protected $fillable = ['id', 'name', 'nip', 'asisten_id', 'batch', 'status','semester', 'username', 'password'];


}

