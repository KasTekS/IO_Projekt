<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Seans extends Model
{
    use HasFactory;
    protected $fillable = [
        'data_seansu',
        'rodzaj',
        'glos',
        'film_id',
        'sala_id',

    ];
    public function film(): BelongsTo
    {
        return $this->belongsTo(Film::class);
    }
    public function sala(): BelongsTo
    {
        return $this->belongsTo(Sala::class);
    }
    public function bilety(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Bilety::class);
    }
}
