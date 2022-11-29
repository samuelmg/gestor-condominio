<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vivienda extends Model
{
    use HasFactory;
    protected $fillable = ['numero', 'estatus', 'notas'];

    public function condominio()
    {
        return $this->belongsTo(Condominio::class);
    }
}
