<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bilety extends Model
{
    use HasFactory;
    protected $fillable = [
        'cena',
        'user_id',
        'sean_id',
        'miejsca_id',


    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function sean()
    {
        return $this->belongsTo(Seans::class);
    }
    public function miejsca()
    {
        return $this->belongsTo(Miejsca::class);
    }

}
