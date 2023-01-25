<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Film extends Model
{
    use HasFactory;
    protected $fillable = [
        'tytul',
        'data_premiery',
        'kategoria',
        'czas_trwania',
        'kategoria_wiekowa',
        'opis',

        'czy_jest_grany',
        'okladka_link',
        'duze_zdj_link',



    ];

    public function sean(): HasMany
    {
        return $this->hasMany(Seans::class);
    }

}
