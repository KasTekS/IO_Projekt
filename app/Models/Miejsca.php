<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Miejsca extends Model
{
    use HasFactory;
    protected $fillable = [
        'nr',
        'nr_na_grid',
        'rzad',
        'rodzaj',
        'cennik_id',
        'sala_id',

    ];

    public function sala()
    {
        return $this->belongsTo(Sala::class);
    }
    public function cennik()
    {
        return $this->belongsTo(Cennik::class);
    }
    public function bilety()
    {
        return $this->hasMany(Bilety::class);
    }

}
