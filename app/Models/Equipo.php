<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'logo'];

    protected $appends = ['logo_url'];

    public function jugadores()
    {
        return $this->hasMany(Jugador::class, 'equipo_id');
    }

    public function getLogoUrlAttribute()
    {
        return url('storage/' . $this->logo);
    }
}

