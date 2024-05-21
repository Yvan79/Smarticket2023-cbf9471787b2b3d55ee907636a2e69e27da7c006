<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignar extends Model
{
    use HasFactory;
    protected $table='usuario_evento';
    protected $fillable = [
        'id',
        'id_usuario',
        'id_evento',
        'estado',
    ];
}
