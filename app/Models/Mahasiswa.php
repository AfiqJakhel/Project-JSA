<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Mahasiswa extends Authenticatable
{
    use Notifiable;

    protected $guard = 'mahasiswa'; // sesuai dengan auth guard 'mahasiswa'

    protected $table = 'mahasiswas';

    protected $fillable = [
        'nim',
        'nama',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
