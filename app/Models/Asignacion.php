<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Asignacion extends Model
{
    //
     use HasFactory;

    protected $table = 'asignaciones';
    protected $primaryKey = 'id_asignacion';

    protected $fillable = [
       'asignable_id',
        'asignable_type',
        'id_usuario',
        'id_area',
        'id_ubicacion',
        'fecha_asignacion',
        'fecha_devolucion',
        'estado',
        'observacion',
    ];

    protected $casts = [
    
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Relaciones

    /**
     * Relación polimórfica: puede ser Equipo o Componente
     */
    public function asignable()
    {
        return $this->morphTo();
    }
/**
     * Relación con Usuario
     */
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    /**
     * Relación con Área
     */
    public function area()
    {
        return $this->belongsTo(Area::class, 'id_area');
    }

    /**
     * Relación con Ubicación
     */
    public function ubicacion()
    {
        return $this->belongsTo(Ubicacion::class, 'id_ubicacion');
    }

    
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
