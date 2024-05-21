<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoEvento extends Model
{
    use HasFactory;
    protected $table='tipoevento';
    protected $fillable = [
        'des_evento',
        'est_evento',
    ];
}
