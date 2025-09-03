<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proveedor extends Model
{
    //
    use HasFactory,SoftDeletes;

    protected $table = 'proveedores';
    protected $primaryKey = 'id_proveedor';

    protected $fillable = [
        'nombre_empresa',
        'contacto_principal',
        'telefono',
        'email',
        'direccion',
        'ruc_dni',
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
        return $this->hasMany(Equipo::class, 'id_proveedor');
    }

    public function componentes()
    {
        return $this->hasMany(Componente::class, 'id_proveedor');
    }
    public function mantenimientos()
    {
        return $this->hasMany(Mantenimiento::class, 'id_proveedor');
    }


}
