<?php

namespace App\Exports;

use App\Models\Trabajos;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class InformeExport implements FromQuery, WithHeadings, WithMapping
{
    protected $tipo;
    protected $anio;
    protected $facultad;
    protected $carrera;

    public function __construct($tipo, $anio, $facultad, $carrera)
    {
        $this->tipo = $tipo;
        $this->anio = $anio;
        $this->facultad = $facultad;
        $this->carrera = $carrera;
    }

    public function query()
    {
        $query = Trabajos::query();

        if ($this->tipo) {
            $query->where('tipo', $this->tipo);
        }

        if ($this->anio) {
            $query->where('año', $this->anio);
        }

        if ($this->facultad) {
            $query->where('facultad', $this->facultad);
        }

        if ($this->carrera) {
            $query->where('carrera', $this->carrera);
        }

        return $query;
    }

    public function headings(): array
    {
        return [
            'Tipo',
            'Año',
            'Titulo',
            'Autor',
            'Facultad',
            'Carrera',
            
        ];
    }

    public function map($trabajo): array
    {
        return [
            ucfirst($trabajo->tipo),
            $trabajo->año,
            $trabajo->titulo,
            $trabajo->autor,
            $trabajo->facultad,
            $trabajo->carrera,
        ];
    }
}
