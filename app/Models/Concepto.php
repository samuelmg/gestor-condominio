<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concepto extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function cuenta()
    {
        return $this->belongsTo(Cuenta::class);
    }
}
