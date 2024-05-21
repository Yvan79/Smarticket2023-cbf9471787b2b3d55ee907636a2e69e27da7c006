<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historiales extends Model
{
    use HasFactory;
    protected $table='historiales';
    protected $fillable = [
        'id_acceso',
        'dni_acreditar',
        'nom_acreditar',
        'cod_usuario',
        'correlativo',
        'cod_evento',
        'barcode',
        'fec_acreditar',
        'estado',
        'created_at',
    ];
}
