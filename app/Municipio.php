<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $fillable = [
    	'nombre',
		'abreviado',
		'codestado'
    ];


    public function estado()
	{
		return $this->belongsTo(Estado::class);
	}
	public function parroquia()
    {
    	return $this->hasMany(Parroquia::class);
    }
}
