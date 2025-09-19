<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    //
     use HasFactory;
 
    // 👇 Forzar a usar la tabla correcta
    protected $table = 'tipos_equipos';
    protected $primaryKey = 'id_tipo_equipo';  
    
    protected $fillable = ['nombre', 'id_categoria'];

   
 
      public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria', 'id_categoria');
    }

    public function equipos()
    {
        return $this->hasMany(Equipo::class, 'id_tipo_equipo','id_tipo_equipo');
    }
   

}
