<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Condominio extends Model
{
    use HasFactory;
    protected $fillable = [
        'condominio',
        'pais_id',
        'estado_id',
        'municipio_id',
        'localidad',
        'colonia',
        'calle',
        'numero',
    ];

    public function pais()
    {
        return $this->belongsTo(Pais::class);
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }

    public function municipio()
    {
        return $this->belongsTo(Municipio::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function viviendas()
    {
        return $this->hasMany(Vivienda::class);
    }

    public function personas()
    {
        return $this->hasMany(Persona::class);
    }

    public function cuentas()
    {
        return $this->hasMany(Cuenta::class);
    }
}
