<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    use HasFactory;
    protected $fillable = [
        'ilosc_rzedow',
        'ilosc_miejsc',
        'ekran',

    ];
    public function seans()
    {
        return $this->hasMany(Seans::class);
    }
    public function miejsca()
    {
        return $this->hasMany(Miejsca::class);
    }
}
