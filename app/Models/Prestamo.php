<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prestamo extends Model
{
    //
     use HasFactory, SoftDeletes;

    protected $table = 'prestamos';
    protected $primaryKey = 'id_prestamo';

    protected $fillable = [
        'id_usuario_solicitante',
        'id_usuario_autoriza',
        'fecha_prestamo',
        'fecha_devolucion_programada',
        'fecha_devolucion_real',
        'estado',
        'observaciones_salida',
        'observaciones_devolucion'
    ];

    protected $casts = [
        'fecha_prestamo' => 'datetime',
        'fecha_devolucion_programada' => 'datetime',
        'fecha_devolucion_real' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Relaciones
    public function solicitante()
    {
        return $this->belongsTo(User::class, 'id_usuario_solicitante');
    }

    public function autorizador()
    {
        return $this->belongsTo(User::class, 'id_usuario_autoriza');
    }
    public function detalles()
    {
        return $this->hasMany(DetallePrestamo::class, 'id_prestamo');
    }

}
