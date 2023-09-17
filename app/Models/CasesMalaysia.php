<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class CasesMalaysia extends Model
{
    protected $table = 'cases_malaysia';

    protected $casts = [
        'date' => 'date',
        'created_at' => 'date',
        'updated_at' => 'date',
    ];

    protected $guarded = [];

    public function scopeLatestOne(Builder $query): Builder
    {
        return $query->orderByDesc('date')->take(1);
    }

    protected function getActiveCaseAttribute()
    {
        return $this->cases_cumulative - $this->cases_recovered_cumulative;
    }
}
