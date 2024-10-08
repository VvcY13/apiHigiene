<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombres',
        'apellidos',
        'tipo_documento',
        'numero_documento',
        'email',
        'password',
        'rol',
        'estado',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
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
    protected $casts = [
        'email_verified_at' => 'datetime',
        'estado' => 'boolean',
        'password' => 'hashed',
    ];
    public function getJWTIdentifier()
    {
        return $this->getKey(); 
    }

    public function getJWTCustomClaims()
    {
        return []; 
    }


    public function setNombresAttribute($value)
    {
        $this->attributes['nombres'] = strtoupper($value);
    }

    // Mutador para convertir el apellido en mayúsculas
    public function setApellidosAttribute($value)
    {
        $this->attributes['apellidos'] = strtoupper($value);
    }

    // Mutador para convertir el tipo de documento en mayúsculas
    public function setTipoDocumentoAttribute($value)
    {
        $this->attributes['tipo_documento'] = strtoupper($value);
    }

    // Mutador para convertir el número de documento en mayúsculas
    public function setNumeroDocumentoAttribute($value)
    {
        $this->attributes['numero_documento'] = strtoupper($value);
    }

    // Mutador para convertir el email en minúsculas (opcional)
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }
}
