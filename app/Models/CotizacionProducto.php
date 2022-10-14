<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CotizacionProducto extends Model
{
	use HasFactory;
	protected $table = "cotizacion_producto";
	protected $guarded = [];
	public function cotizacion ()
	{
		return $this->belongsTo(Cotizaciones::class);
	}
	public function producto ()
	{
		return $this->belongsTo(Productos::class, 'idProducto' , 'idProducto');
	}
}
