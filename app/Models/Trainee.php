<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Trainee extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'password'];

    // Jika Anda ingin menambahkan cara untuk meng-hash password secara otomatis
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($trainee) {
            $trainee->password = bcrypt($trainee->password);
        });
    }
}
