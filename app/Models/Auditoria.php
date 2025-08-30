<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Auditoria extends Model
{
    //
        use HasFactory;

    protected $table = 'auditorias';
    protected $primaryKey = 'id_auditoria';

    protected $fillable = [
        'id_usuario',
        'tabla_afectada',
        'accion',
        'datos_anteriores',
        'datos_nuevos',
        'ip_address',
        'timestamp'
    ];

    protected $casts = [
        'datos_anteriores' => 'array',
        'datos_nuevos' => 'array',
        'timestamp' => 'datetime',
    ];

    // Relaciones
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
