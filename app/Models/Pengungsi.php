<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengungsi extends Model
{
    use HasFactory;

    protected $table = 'pengungsi';

    protected $fillable = [
        'nama',
        'telpon',
        'kpl_id',
        'statKel',
        'gender',
        'umur',
        'statPos',
        'posko_id',
        'statKon',
    ];
}
