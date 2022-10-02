<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaxRegMalaysia extends Model
{
    use HasFactory;

    protected $casts = [
        'date' => 'date',
        'created_at' => 'date',
        'updated_at' => 'date',
    ];

    public const CREATED_AT = 'date';

    protected $guarded = [];

    public function scopeLatestOne(Builder $query): Builder
    {
        return $query->orderByDesc('date')->take(1);
    }
}
