<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zonas extends Model
{
    use HasFactory;
    protected $table='zonas';
    protected $fillable = [
    'nom_zona',
    'aforo',
    'precio',
    'funciones',
    'entradas',
    'color',
    'tipoasiento',
    ];
}
