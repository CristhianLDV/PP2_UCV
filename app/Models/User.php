<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Testing\Fluent\Concerns\Has;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

  // Relaciones
    public function mantenimientos()
    {
        return $this->hasMany(Mantenimiento::class, 'id_usuario');
    }

    public function mantenimientosTecnico()
    {
        return $this->hasMany(Mantenimiento::class, 'id_tecnico');
    }

    public function prestamosSolicitados()
    {
        return $this->hasMany(Prestamo::class, 'id_usuario_solicitante');
    }

    public function prestamosAutorizados()
    {
        return $this->hasMany(Prestamo::class, 'id_usuario_autoriza');
    }

    public function movimientosStock()
    {
        return $this->hasMany(MovimientoStock::class, 'id_usuario');
    }

    public function reportesIncidencias()
    {
        return $this->hasMany(ReporteIncidencia::class, 'id_usuario_reporta');
    }

    public function reportesAsignados()
    {
        return $this->hasMany(ReporteIncidencia::class, 'id_usuario_asignado');
    }

    public function auditorias()
    {
        return $this->hasMany(Auditoria::class, 'id_usuario');
    }
}


