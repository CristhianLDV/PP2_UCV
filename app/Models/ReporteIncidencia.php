<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReporteIncidencia extends Model
{
    //
    use HasFactory, SoftDeletes;

    protected $table = 'reportes_incidencias';
    protected $primaryKey = 'id_incidencia';

    protected $fillable = [
        'id_equipo',
        'id_usuario_reporta',
        'id_usuario_asignado',
        'titulo',
        'descripcion',
        'prioridad',
        'estado',
        'fecha_reporte',
        'fecha_resolucion',
        'solucion'
    ];

    protected $casts = [
        'fecha_reporte' => 'datetime',
        'fecha_resolucion' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

       // Relaciones
    public function equipo()
    {
        return $this->belongsTo(Equipo::class, 'id_equipo');
    }

    public function usuarioReporta()
    {
        return $this->belongsTo(User::class, 'id_usuario_reporta');
    }

    public function usuarioAsignado()
    {
        return $this->belongsTo(User::class, 'id_usuario_asignado');
    }

}
