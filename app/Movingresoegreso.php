<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movingresoegreso extends Model
{
    protected $fillable = [
        'idusuario',
        'codconcepto',
        'codctapote',
        'monto',
        'observacion'
    ];

    // public function scopeDesde($query, $desde)
    // {
    //     if ($desde)
    //     {
    //         return $query->where('created_at','like',"%desde%");
    //     }
    // }
    // public function scopeHasta($query, $hasta)
    // {
    //     if ($hasta)
    //     {
    //         return $query->where('created_at','like',"%hasta%");
    //     }
    // }
    // public function scopeCuentapote($query, $cuentapote)
    // {
    //     if ($cuentapote)
    //     {
    //         return $query->where('codctapote','like',"%codctapote%");
    //     }
    // }
}
