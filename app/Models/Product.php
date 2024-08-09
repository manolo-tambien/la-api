<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Los campos que se pueden asignar en masa
    protected $fillable = [
        'nombre',
        'precio',
    ];

    // Si la tabla en la base de datos no sigue la convención plural, puedes especificarlo aquí
    // protected $table = 'productos';
}
