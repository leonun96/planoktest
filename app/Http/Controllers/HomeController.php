<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;
use App\Models\Perfil;
use App\Models\Cotizaciones;
use App\Models\Productos;

use Illuminate\Database\Eloquent\Collection;

use Illuminate\Database\Eloquent\Builder;

class HomeController extends Controller
{
	public function __construct ()
	{
		// 
	}
	public function index ()
	{
		return view('index');
	}
	public function usuarios ()
	{
		$usuarios = Usuarios::all();
		return view('usuarios')->with([
			'usuarios' => $usuarios,
		]);
	}
	public function cotizaciones ()
	{
		$cotizaciones = Cotizaciones::all()->load(['usuarios', 'clientes', 'cotizacion_producto', 'cotizacion_producto.producto']);
		// dd($cotizaciones);
		return view('cotizaciones')->with([
			'cotizaciones' => $cotizaciones,
		]);
	}
	public function solucion1 () : Collection
	{
		// i. Listado de clientes que han comprado estacionamientos en Santiago.
		// $var = Productos::with('')->where(['sector' => 'Santiago', 'estado' => 'VENDIDO'])->get();
		$var = Cotizaciones::whereHas(
			'cotizacion_producto.producto', function (Builder $query) {
				$query->where(['sector' => 'Santiago', 'estado' => 'VENDIDO']);
			})->with(['clientes'])->get();
		return $var;
	}
	public function solucion2 () : Collection
	{
		// Total, de departamentos Vendidos por el usuario PILAR PINO en Las Condes.
		$var = Cotizaciones::whereHas(
			'cotizacion_producto.producto', function (Builder $query) {
				$query->where(['estado' => 'VENDIDO']);
			})->whereHas(
			'usuarios', function (Builder $query) {
				$query->where(['id' => 6]);
			})->with(['usuarios', 'clientes', 'cotizacion_producto', 'cotizacion_producto.producto'])->get();
		return $var;
	}
	public function solucion3 () : Collection
	{
		// Listar Productos creados entre el 2018-01-03 y 2018-01-20
		$var = Productos::whereBetween('fechaCreacion', ['2018-01-03', '2018-01-20'])->get();
		return $var;
	}
	public function solucion4 () : Collection
	{
		// Sumar el total de ventas realizadas en Santiago.
		/*
		 * FIX
		 SELECT c.*, SUM(totalt) AS total FROM (SELECT (cotizacion.total) AS totalt FROM `cotizacion_producto`
		INNER JOIN cotizacion ON cotizacion_producto.idCotizacion= cotizacion.idCotizacion
		INNER JOIN producto ON cotizacion_producto.idProducto= producto.idProducto
		WHERE producto.sector = "Santiago" and producto.estado = "VENDIDO"
		GROUP BY cotizacion_producto.idCotizacion) c;
		*/
		$var = Productos::where(['sector' => 'Santiago', 'estado' => 'VENDIDO'])->get();
		return $var;
	}
	public function soluciones ()
	{
		$var = $this->solucion1();
		$var2 = $this->solucion2();
		$var3 = $this->solucion3();
		$var4 = $this->solucion4();
		// dd($var4);
		return view('soluciones')->with([
			'sol1' => $var,
			'sol2' => $var2,
			'sol3' => $var3,
			'sol4' => $var4,
		]);
	}
}
