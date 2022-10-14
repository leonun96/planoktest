@extends('layouts.layout', ['titulo' => 'Soluciones', 'item' => 2])

@section('contenido1')
<div class="container-xxl flex-grow-1 container-p-y">
	<div class="divider">
		<div class="divider-text">I</div>
	</div>
	<div class="card">
		<h5 class="card-header">Listado de clientes que han comprado estacionamientos en Santiago.</h5>
		<div class="table-responsive text-nowrap">
		  <table class="table">
			<thead>
			  <tr>
				<th>#</th>
				<th>Cliente</th>
				<th>Rut</th>
				<th>Telefono</th>
				<th>Email</th>
				<th>Edad</th>
				<th>Sexo</th>
				<th>Region</th>
			  </tr>
			</thead>
			<tbody class="table-border-bottom-0">
				@foreach($sol1 as $key => $solucion1)
				<tr>
					<td>{{ $key + 1 }}</td>
					<td>{{ $solucion1->clientes?->nombre }}</td>
					<td>{{ $solucion1->clientes?->rut }}</td>
					<td>{{ $solucion1->clientes?->telefono }}</td>
					<td>{{ $solucion1->clientes?->email }}</td>
					<td>{{ $solucion1->clientes?->edad }}</td>
					<td>{{ $solucion1->clientes?->sexo }}</td>
					<td>{{ $solucion1->clientes?->region }}</td>
				</tr>
				@endforeach
			</tbody>
		  </table>
		</div>
	</div>
	<div class="divider">
		<div class="divider-text">II</div>
	</div>
	<div class="card">
		<h5 class="card-header">Total, de departamentos Vendidos por el usuario PILAR PINO en Las Condes.</h5>
		<div class="table-responsive text-nowrap">
		  <table class="table">
			<thead>
				<tr class="text-nowrap">
					<th>#</th>
					<th>Descripcion</th>
					<th>Tipo</th>
					<th>Valor lista</th>
					<th>Orientación</th>
					<th>Piso</th>
					<th>Superficie</th>
					<th>Sector</th>
					<th>Estado</th>
				</tr>
			</thead>
			<tbody>
				@foreach($sol2 as $key => $solucion2)
					@foreach($solucion2->cotizacion_producto as $key => $prod)
					{{-- @dump($prod->producto) --}}
					<tr>
						<td>{{ $key + 1 }}</td>
						<td>{{ $prod->producto?->descripcion }}</td>
						<td>{{ $prod->producto?->tipo?->descripcion }}</td>
						<td>${{ number_format($prod->producto?->valorLista, 0, ',', '.') }}</td>
						<td>{{ $prod->producto?->orientacion }}</td>
						<td>{{ $prod->producto?->piso }}</td>
						<td>{{ $prod->producto?->superficie }}</td>
						<td>{{ $prod->producto?->sector }}</td>
						<td>{{ $prod->producto?->estado }}</td>
					</tr>
					@endforeach
				@endforeach
			</tbody>
		  </table>
		</div>
	</div>
	
	<div class="divider">
		<div class="divider-text">III</div>
	</div>
	<div class="card">
		<h5 class="card-header">Listar Productos creados entre el 2018-01-03 y 2018-01-20</h5>
		<div class="table-responsive text-nowrap">
		  <table class="table">
			<thead>
				<tr class="text-nowrap">
					<th>#</th>
					<th>Descripcion</th>
					<th>Fecha Creación</th>
					<th>Tipo</th>
					<th>Valor lista</th>
					<th>Orientación</th>
					<th>Piso</th>
					<th>Superficie</th>
					<th>Sector</th>
					<th>Estado</th>
				</tr>
			</thead>
			<tbody>
				@foreach($sol3 as $key => $prod)
				<tr>
					<td>{{ $key + 1 }}</td>
					<td>{{ $prod->descripcion }}</td>
					<td>{{ date('d-m-Y', strtotime($prod->fechaCreacion)) }}</td>
					<td>{{ $prod->tipo?->descripcion }}</td>
					<td>${{ number_format($prod->valorLista, 0, ',', '.') }}</td>
					<td>{{ $prod->orientacion }}</td>
					<td>{{ $prod->piso }}</td>
					<td>{{ $prod->superficie }}</td>
					<td>{{ $prod->sector }}</td>
					<td><small>{{ $prod->estado }}</small></td>
				</tr>
				@endforeach
			</tbody>
		</table>
		</div>
	</div>

	<div class="divider">
		<div class="divider-text">IV</div>
	</div>
	<div class="card">
		<h5 class="card-header">Sumar el total de ventas realizadas en Santiago.</h5>
		<div class="table-responsive text-nowrap">
		  <table class="table">
			<thead>
				<tr class="text-nowrap">
					<th>#</th>
					<th>Descripcion</th>
					{{-- <th>Fecha Creación</th> --}}
					<th>Tipo</th>
					<th>Valor lista</th>
					<th>Orientación</th>
					<th>Piso</th>
					<th>Superficie</th>
					<th>Sector</th>
					<th>Estado</th>
				</tr>
			</thead>
			<tbody>
				@foreach($sol4 as $key => $prod)
				<tr>
					<td>{{ $key + 1 }}</td>
					<td>{{ $prod->descripcion }}</td>
					{{-- <td>{{ date('d-m-Y', strtotime($prod->fechaCreacion)) }}</td> --}}
					<td>{{ $prod->tipo?->descripcion }}</td>
					<td>${{ number_format($prod->valorLista, 0, ',', '.') }}</td>
					<td>{{ $prod->orientacion }}</td>
					<td>{{ $prod->piso }}</td>
					<td>{{ $prod->superficie }}</td>
					<td>{{ $prod->sector }}</td>
					<td><small>{{ $prod->estado }}</small></td>
				</tr>
				@endforeach
			</tbody>
			<tfoot>
				<tr>
					<td colspan="8">TOTAL: </td>
					<td>${{ number_format($sol4->sum('valorLista'), 0, ',', '.') }}</td>
				</tr>
			</tfoot>
		</table>
		</div>
</div>
@endsection