<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Testing\Fluent\Concerns\Has;     
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ubicacion extends Model
{
    //
    use Hasfactory,SoftDeletes;

    protected $table = 'ubicaciones';
    protected $primaryKey = 'id_ubicacion';

    protected $fillable = [
        'nombre',
        'descripcion',
        'codigo_aula',
        'capacidad',
        'activo'
    ];

    protected $casts = [
        'activo' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Relaciones
    public function equipos()
    {
        return $this->hasMany(Equipo::class, 'id_ubicacion');
    }

    public function componentes()
    {
        return $this->hasMany(Componente::class, 'id_ubicacion');
    }

}
