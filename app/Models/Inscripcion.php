<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    use HasFactory;

    protected $fillable = [
        'estudiante_id',
        'carrera_id',
        'fecha_inscripcion',
    ];

    // Relaciones con estudiante y carrera
    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);
    }

    public function carrera()
    {
        return $this->belongsTo(Carrera::class);
    }
}
