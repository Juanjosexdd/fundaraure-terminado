<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
	protected $fillable = [
    	'nombre',
		'abreviado',
		'codparroquia'
    ];


    public function parroquia()
	{
		return $this->belongsTo(Parroquia::class);
	}
	public function cliente()
    {
    	return $this->hasMany(Cliente::class);
    }
}
