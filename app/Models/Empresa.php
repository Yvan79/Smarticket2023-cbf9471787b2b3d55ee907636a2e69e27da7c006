<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;
    protected $table='empresa';
    protected $fillable = [
        'id',
        'nom_empresa',
        'dir_empresa',
        'ruc_empresa',
        'est_empresa',
    ];
}
