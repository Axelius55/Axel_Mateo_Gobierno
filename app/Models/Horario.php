<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    protected $fillable = ['sucursal_id', 'fecha', 'hora_inicio', 'hora_fin', 'disponible'];

    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class);
    }

    public function citas()
    {
        return $this->hasMany(Cita::class);
    }
}
