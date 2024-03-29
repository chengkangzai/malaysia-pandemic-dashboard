<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Population extends Model
{
    use HasFactory;

    protected $casts = [
        'created_at' => 'date',
        'updated_at' => 'date',
    ];

    protected $guarded = [];

    public const STATE = [
        0 => 'Malaysia',
        1 => 'Johor',
        2 => 'Kedah',
        3 => 'Kelantan',
        4 => 'Melaka',
        5 => 'Negeri Sembilan',
        6 => 'Pahang',
        7 => 'Pulau Pinang',
        8 => 'Perak',
        9 => 'Perlis',
        10 => 'Selangor',
        11 => 'Terengganu',
        12 => 'Sabah',
        13 => 'Sarawak',
        14 => 'W.P. Kuala Lumpur',
        15 => 'W.P. Labuan',
        16 => 'W.P. Putrajaya',
    ];

    public const POP_FILTER = [
        'ALL_POPULATION' => 'pop',
        'ABOVE_18' => 'pop_18',
        'ABOVE_12' => 'pop_12',
    ];
}
