<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkStep extends Model
{
    use HasFactory;

    protected $fillable = [
        'jsa_id',
        'step_number',
        'step_description',
        'potensi_bahaya',
        'upaya_pengendalian',
    ];

    public function jsa()
    {
        return $this->belongsTo(Jsa::class, 'jsa_id');
    }
}
