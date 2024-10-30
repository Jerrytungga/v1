<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Asisten extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'asisten';
    protected $fillable = ['id', 'name', 'nip', 'status', 'username', 'password'];
}
