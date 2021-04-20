<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //
    protected $table = 'clientes';

    // public function scopeDesde($query, $desde)
    // {
    //     if ($desde)
    //     {
    //         return $query->where('created_at','like',"%created_at%");
    //     }
    // }
    // public function scopeHasta($query, $hasta)
    // {
    //     if ($hasta)
    //     {
    //         return $query->where('created_at','like',"%created_at%");
    //     }
    // }

    protected $fillable=[
        'codtipocliente',
        'nombres',
        'apellidos',
        'codnacionalidad',
        'cedula',
        'direccion',
        'telefono',
        'email'
    ];
}
