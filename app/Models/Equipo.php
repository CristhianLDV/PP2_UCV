<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Testing\Fluent\Concerns\Has;

class Equipo extends Model
{
    //
    use HasFactory,SoftDeletes;

    protected $table = 'equipos';
    protected $primaryKey = 'id_equipo';

    protected $fillable = [
        'codigo_inventario',
        'nombre',
        'marca',
        'modelo',
        'numero_serie',
        'especificaciones',
        'estado',
        'valor_compra',
        'fecha_adquisicion',
        'fecha_garantia',
        'observaciones',
        'id_categoria',
        'id_ubicacion',
        'id_proveedor',
        'activo'
    ];

    protected $casts = [
        'estado' => 'string',
        'fecha_adquisicion' => 'date',
        'fecha_garantia' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Relaciones
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
