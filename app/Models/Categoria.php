<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Testing\Fluent\Concerns\Has;

class Categoria extends Model
{
    use HasFactory;
    //
    protected $table = 'categorias';
    protected $primaryKey = 'id_categoria';

    protected $fillable = [
        'nombre',
        'descripcion',
        'activo'
    ];

    protected $casts = [
        'activo' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Relaciones
     public function tipos()
    {
    return $this->hasMany(Tipo::class, 'id_categoria', 'id_categoria');
    }
    public function equipos()
    {
        return $this->hasMany(Equipo::class, 'id_categoria', 'id_categoria');
    }

    public function componentes()
    {
        return $this->hasMany(Componente::class, 'id_categoria', 'id_categoria');
    }

     public function marcas()
    {
        return $this->hasMany(Marca::class, 'id_categoria', 'id_categoria');
    }

}
