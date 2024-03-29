<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeathsState extends Model
{
    use HasFactory;

    protected $casts = [
        'date' => 'date',
        'created_at' => 'date',
        'updated_at' => 'date',
    ];

    public const STATE = [
        'Johor' => 'Johor',
        'Kedah' => 'Kedah',
        'Kelantan' => 'Kelantan',
        'Melaka' => 'Melaka',
        'Negeri Sembilan' => 'Negeri Sembilan',
        'Pahang' => 'Pahang',
        'Pulau Pinang' => 'Pulau Pinang',
        'Perak' => 'Perak',
        'Perlis' => 'Perlis',
        'Sabah' => 'Sabah',
        'Sarawak' => 'Sarawak',
        'Selangor' => 'Selangor',
        'Terengganu' => 'Terengganu',
        'W.P. Kuala Lumpur' => 'W.P. Kuala Lumpur',
        'W.P. Labuan' => 'W.P. Labuan',
        'W.P. Putrajaya' => 'W.P. Putrajaya',
    ];

    protected $guarded = [];

    public function scopeLatestOne(Builder $query): Builder
    {
        return $query->orderByDesc('date')->take(16)->orderBy('state');
    }

    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d');
    }

    public function scopeStateWithTake(Builder $query, string $state, int $take): Builder
    {
        return $query->where('state', $state)->orderByDesc('date')->take($take);
    }
}
