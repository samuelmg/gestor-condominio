<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\CondominioScope;

class Vivienda extends Model
{
    use HasFactory;
    protected $fillable = ['numero', 'estatus', 'notas'];

    protected static function booted()
    {
        static::addGlobalScope(new CondominioScope);
    }

    public function condominio()
    {
        return $this->belongsTo(Condominio::class);
    }

    public function personas()
    {
        return $this->belongsToMany(Persona::class)->withPivot('tipo');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
