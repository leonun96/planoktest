<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizaciones extends Model
{
	use HasFactory;
	protected $table = "cotizacion";
	protected $guarded = [];
	public function clientes ()
	{
		return $this->belongsTo(Clientes::class, 'idCliente');
	}
	public function usuarios ()
	{
		return $this->belongsTo(Usuarios::class, 'idUsuario', 'id');
	}
	public function cotizacion_producto ()
	{
		return $this->hasMany(CotizacionProducto::class, 'idCotizacion', 'idCotizacion');
	}
	// public function producto ()
	// {
	// 	return $this->hasOneThrough(Productos::class, CotizacionProducto::class);
	// }
}
