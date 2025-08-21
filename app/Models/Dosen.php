<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Dosen extends Authenticatable
{
    use Notifiable;

    protected $guard = 'dosen'; // sesuai dengan auth guard 'dosen'

    protected $table = 'dosens';

    protected $fillable = [
        'nip',
        'nama',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
