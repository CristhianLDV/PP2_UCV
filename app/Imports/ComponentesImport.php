<?php

namespace App\Imports;

use App\Models\Componente;
use Maatwebsite\Excel\Concerns\ToModel;

class ComponentesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
         // Saltar encabezados si están en la fila 1
        if ($row[0] === 'nombre') {
            return null;
        }
        return new Componente([
            //
             'nombre' => $row[0],
            'modelo' => $row[1] ?? null,
            'serie' => $row[2] ?? null,
            'id_marca' => $row[3] ?? null,
            'estado' => $row[4] ?? 'bueno',
        ]);
    }
}
