<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Testing\Fluent\Concerns\Has;
class Marca extends Model
{

    use HasFactory;
    //
    protected $table = 'marcas';
    protected $primaryKey = 'id_marca';
     
    protected $fillable = [
        'nombre',
        'imagen',
        'activo'
    ];
      // Casts para que 'activo' sea booleano
    protected $casts = [
        'activo' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    public function equipos()
    {
        return $this->hasMany(Equipo::class, 'id_marca', 'id_marca');
    }

   
    
}
