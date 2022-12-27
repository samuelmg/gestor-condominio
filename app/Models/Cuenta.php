<?php

namespace App\Models;

use App\Models\Scopes\CondominioScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected static function booted()
    {
        static::addGlobalScope(new CondominioScope);
    }

    public function condominio()
    {
        return $this->belongsTo(Condominio::class);
    }
}
