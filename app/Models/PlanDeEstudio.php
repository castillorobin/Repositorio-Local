<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanDeEstudio extends Model
{
    use HasFactory;

    protected $table = 'planesdeestudio';

    protected $fillable = ['tipo', 'facultad', 'carrera', 'modalidad', 'periodo', 'archivo'];
}
