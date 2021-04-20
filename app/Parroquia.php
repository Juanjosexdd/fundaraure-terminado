<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parroquia extends Model
{
	protected $fillable = [
    	'nombre',
		'abreviado',
		'codmunicipio'
    ];


    public function municipio()
	{
		return $this->belongsTo(Municipio::class);
	}

	public function sector()
    {
    	return $this->hasMany(Sector::class);
    }
}
