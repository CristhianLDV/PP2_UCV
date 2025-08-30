<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MovimientoStock extends Model
{
    //
     use HasFactory;

    protected $table = 'movimientos_stock';
    protected $primaryKey = 'id_movimiento';

    protected $fillable = [
        'id_componente',
        'id_usuario',
        'tipo_movimiento',
        'cantidad',
        'stock_anterior',
        'stock_nuevo',
        'precio_unitario',
        'motivo',
        'observaciones',
        'fecha_movimiento'
    ];

    protected $casts = [
        'cantidad' => 'integer',
        'stock_anterior' => 'integer',
        'stock_nuevo' => 'integer',
        'precio_unitario' => 'decimal:2',
        'fecha_movimiento' => 'datetime',
    ];

    // Relaciones
    public function componente()
    {
        return $this->belongsTo(Componente::class, 'id_componente');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
