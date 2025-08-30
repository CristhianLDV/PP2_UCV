<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Testing\Fluent\Concerns\Has;

class Componente extends Model
{
    //
    use HasFactory,SoftDeletes;

    protected $table = 'componentes';
    protected $primaryKey = 'id_componente';

    protected $fillable = [
       'codigo',
        'nombre',
        'descripcion',
        'marca',
        'modelo',
        'tipo',
        'estado',
        'stock_actual',
        'stock_minimo',
        'precio_unitario',
        'id_categoria',
        'id_proveedor',
        'activo'
    ];

    protected $casts = [
        'activo' => 'boolean',
        'stock_actual' => 'integer',
        'stock_minimo' => 'integer',
        'precio_unitario' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

   // Relaciones
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'id_proveedor');
    }

    public function movimientosStock()
    {
        return $this->hasMany(MovimientoStock::class, 'id_componente');
    }

}
