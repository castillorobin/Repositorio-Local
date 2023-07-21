<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajos extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo',
        'titulo',
        'autor',
        'año',
        'facultad',
        'carrera',
        'archivo',
    ];

    
}

