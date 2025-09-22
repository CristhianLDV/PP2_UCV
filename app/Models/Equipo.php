<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Testing\Fluent\Concerns\Has;

class Equipo extends Model
{
    //
    use HasFactory;

    protected $table = 'equipos';
    protected $primaryKey = 'id_equipo';

    protected $fillable = [
       'codigo_patrimonial',
        'nombre_equipo',
        'id_tipo_equipo',
        'id_marca',
        'modelo',
        'serie',
        'estado',
        'id_usuario',
        'id_ubicacion',
    ];

    protected $casts = [
       
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Relaciones

 /**
     * Relación polimórfica: asignaciones
     */
    public function asignaciones()
    {
        return $this->morphMany(Asignacion::class, 'asignable');
    }

        public function marca()
    {
        return $this->belongsTo(Marca::class, 'id_marca', 'id_marca');
    }

    public function componentes()
    {
        return $this->belongsToMany(
            Componente::class,
            'equipo__componente',
            'id_equipo',
            'id_componente'
        )->withPivot(['fecha_asignacion', 'fecha_retiro'])
         ->withTimestamps();
    }
     public function tipo()
    {
        return $this->belongsTo(Tipo::class,  'id_tipo_equipo','id_tipo_equipo'); 
        
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    public function ubicacion()
    {
        return $this->belongsTo(Ubicacion::class, 'id_ubicacion');
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'id_proveedor');
    }
    public function mantenimientos()
    {
        return $this->hasMany(Mantenimiento::class, 'id_equipo');
    }
    public function detallesPrestamos()
    {
        return $this->hasMany(DetallePrestamo::class, 'id_equipo');
    }
    public function reportesIncidencias()
    {
        return $this->hasMany(ReporteIncidencia::class, 'id_equipo');
    }

}
