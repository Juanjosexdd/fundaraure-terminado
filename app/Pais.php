<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $fillable = [
    	'nombre',
    	'abreviado'
    ];

    public function estado()
    {
    	return $this->hasMany(Estado::class);
    }

    public function cliente()
    {
    	return $this->hasMany(Cliente::class);
    }


}