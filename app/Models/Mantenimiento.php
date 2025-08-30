<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mantenimiento extends Model
{
    //
    use HasFactory, SoftDeletes;

    protected $table = 'mantenimientos';
    protected $primaryKey = 'id_mantenimiento';

    protected $fillable = [
        'id_equipo',
        'id_usuario',
        'tipo',
        'fecha_mantenimiento',
        'descripcion_trabajo',
        'observaciones',
        'estado',
        'costo',
        'id_tecnico'
    ];

    protected $casts = [
        'fecha_mantenimiento' => 'date',
        'costo' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Relaciones
    public function equipo()
    {
        return $this->belongsTo(Equipo::class, 'id_equipo');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function tecnico()
    {
        return $this->belongsTo(User::class, 'id_tecnico');
    }
}
