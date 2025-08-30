<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetallePrestamo extends Model
{
    //
    use HasFactory;

    protected $table = 'detalle_prestamos';
    protected $primaryKey = 'id_detalle';

    protected $fillable = [
        'id_prestamo',
        'id_equipo',
        'estado_equipo_salida',
        'estado_equipo_devolucion',
        'observaciones'
    ];

    // Relaciones
    public function prestamo()
    {
        return $this->belongsTo(Prestamo::class, 'id_prestamo');
    }

    public function equipo()
    {
        return $this->belongsTo(Equipo::class, 'id_equipo');
    }

}
