<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    //

    protected $table = 'areas';
    protected $primaryKey = 'id_area';
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



}
