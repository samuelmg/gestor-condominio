<?php

namespace App\Models;

use App\Models\Scopes\CondominioScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'tel_celular', 'tel_fijo'];

    protected static function booted()
    {
        static::addGlobalScope(new CondominioScope);
    }

    public function condominio()
    {
        return $this->belongsTo(Condominio::class);
    }

    public function viviendas()
    {
        return $this->belongsToMany(Vivienda::class)->withPivot('tipo');
    }
}
