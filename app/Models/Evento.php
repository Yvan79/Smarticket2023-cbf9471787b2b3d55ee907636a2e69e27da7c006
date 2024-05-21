<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;
    protected $table='avento';
    protected $fillable = [
        'id_empresa',
        'id_tipoevento',
        'nom_evento',
        'lug_evento',
        'cod_evento',
        'fec_evento',
        'est_evento',
    ];
}
