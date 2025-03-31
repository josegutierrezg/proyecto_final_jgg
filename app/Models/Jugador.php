<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
    use HasFactory;
    protected $table = 'jugadores';

    protected $fillable = ['nombre', 'alias', 'posicion', 'equipo_id', 'imagen'];

    protected $appends = ['imagen_url'];

    public function equipo()
    {
        return $this->belongsTo(Equipo::class, 'equipo_id');
    }

    public function getImagenUrlAttribute()
    {
        return url('storage/' . $this->imagen);
    }
}



