<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diario extends Model
{
    use HasFactory;

    protected $table = 'diarios'; 
    protected $fillable = [
        'nombre',
        'numero_diario',
        'tomo',
        'fecha',
        'anio',
        'descripcion',
        'archivo',
        'usuario',
    ];
}
