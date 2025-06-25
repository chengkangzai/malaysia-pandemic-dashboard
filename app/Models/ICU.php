<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ICU extends Model
{
    protected $table = 'icus';

    protected $casts = [
        'date' => 'date',
        'created_at' => 'date',
        'updated_at' => 'date',
    ];

    protected $guarded = [];

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

    public function scopeLatestOne(Builder $query): Builder
    {
        return $query->orderByDesc('date')->take(16)->orderBy('state');
    }

    public function getTotalPatientAttribute(): float|int
    {
        return $this->icu_covid + $this->icu_noncovid + $this->icu_pui;
    }

    public function getOverallUtilisationAttribute(): float|int
    {
        return ($this->getTotalPatientAttribute() / $this->bed_icu_total ?? 1) * 100;
    }

    public function getTotalVentilatorsAttribute(): float|int
    {
        return $this->vent + $this->vent_port;
    }

    public function getTotalVentilatorsPatientAttribute(): float|int
    {
        return $this->vent_covid + $this->vent_pui + $this->vent_noncovid;
    }

    public function getVentilationUtilisationAttribute(): float|int
    {
        return ($this->getTotalVentilatorsPatientAttribute() / ($this->totalVentilators ?: 1)) * 100;
    }

    public function scopeStateWithTake(Builder $query, string $state, int $take): Builder
    {
        return $query->where('state', $state)->orderByDesc('date')->take($take);
    }
}
