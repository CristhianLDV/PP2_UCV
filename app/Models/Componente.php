<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Testing\Fluent\Concerns\Has;

class Componente extends Model
{
    //
    use HasFactory;

    protected $table = 'componentes';
    protected $primaryKey = 'id_componente';

    protected $fillable = [
        'nombre',
        'id_marca',
        'modelo',
        'serie',
        'estado',
    
    ];

    protected $casts = [
        
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

public function marca()
{
    return $this->belongsTo(Marca::class, 'id_marca', 'id_marca');
}
 public function equipos()
    {
        return $this->belongsToMany(
            Equipo::class,
            'equipo__componente',
            'id_componente',
            'id_equipo'
        )->withPivot(['fecha_asignacion', 'fecha_retiro'])
         ->withTimestamps();
    }
    /**
     * Relación polimórfica: asignaciones
     */
    public function asignaciones()
    {
        return $this->morphMany(Asignacion::class, 'asignable');
    }

}
