<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresas';
    protected $fillable = [
        'nombre',
        'rif',
        'descripcion',
        'direccion',
        'file'
    ];
}
