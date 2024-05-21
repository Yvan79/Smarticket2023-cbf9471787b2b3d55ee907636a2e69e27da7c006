<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acceso extends Model
{
    use HasFactory;
    protected $table='acceso';
    protected $fillable = [
        'id',
        'nom_acceso',
        'est_acceso',
    ];
}
