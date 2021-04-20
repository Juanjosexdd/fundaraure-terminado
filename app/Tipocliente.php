<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipocliente extends Model
{
    protected $fillable=[
    	'nombre',
    	'descripcion',
    	'estatus'
    ];

    public function tipocliente()
	{
		return $this->belongsTo(Cliente::class);
	}
}
