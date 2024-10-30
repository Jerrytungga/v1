<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Trainee extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'trainee';
    protected $fillable = ['id', 'name', 'nip', 'asisten_id', 'batch', 'status','semester', 'username', 'password'];

}
