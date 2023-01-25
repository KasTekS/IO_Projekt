<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cennik extends Model
{
    use HasFactory;
    protected $fillable = [
        'nazwa',
        'cena',
    ];

    public function miejsca()
    {
        return $this->hasMany(Miejsca::class);
    }
}
