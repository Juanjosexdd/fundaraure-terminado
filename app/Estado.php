<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $fillable = [
    	'nombre',
		'abreviado',
		'codpais'
	];
	public static function estados($id){
		return Estado::where('id','=',$id)->get();
	}

    public function pais()
	{
		return $this->belongsTo(Pais::class);
	}
	public function municipio()
    {
    	return $this->hasMany(Municipio::class);
    }
}
