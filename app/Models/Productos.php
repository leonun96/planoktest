<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
	use HasFactory;
	protected $table = "producto";
	protected $guarded = [];
	public function tipo ()
	{
		return $this->belongsTo(TipoProducto::class, 'idTipoProducto', 'idTipoProducto');
	}
	// public function cotizacion_producto ()
	// {
	// 	return $this->hasMany(CotizacionProducto::class, '');
	// }
}
