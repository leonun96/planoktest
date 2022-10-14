@extends('layouts.layout', ['titulo' => 'Cotizaciones', 'item' => 2])

@section('contenido1')
<div class="container-xxl flex-grow-1 container-p-y">
	<div class="card">
		<h5 class="card-header">Cotizaciones</h5>
		<div class="table-responsive text-nowrap">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Id</th>
						<th>Rut Cliente</th>
						<th>SubTotal</th>
						<th>Descuento</th>
						<th>Total</th>
						<th>Detalle</th>
					</tr>
				</thead>
				<tbody class="table-border-bottom-0">
					@foreach($cotizaciones as $key => $cotizacion)
					<tr>
						<td>{{-- $key + 1 --}}{{ $cotizacion->idCotizacion }}</td>
						<td>{{ $cotizacion->clientes?->rut }}</td>
						<td>${{ number_format($cotizacion->subtotal,0,',','.') }}</td>
						<td>${{ number_format(($cotizacion->subtotal * $cotizacion->descuento)/100,0,',','.') }} ({{ $cotizacion->descuento }}%)</td>
						<td>${{ number_format($cotizacion->total,0,',','.') }}</td>
						<td>
							<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal-{{ $cotizacion->idCotizacion }}"><i class='bx bxs-detail'></i></button>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- Large Modal -->
@foreach($cotizaciones as $key => $coti)
{{--
descuento
3	subtotal
4	total
5	fechaCreacion
6	fechaModificacion
7	estado
8	credito	
9	montoCredito
10	idCliente
11	idUsua
--}}
<div class="modal fade" id="largeModal-{{ $coti->idCotizacion }}" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel3">Detalle Cotización {{ $coti->idCotizacion }}</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="divider">
					<div class="divider-text">Datos Cliente</div>
				</div>
				<div class="row">
					<div class="col mb-3">
						<label for="nameLarge" class="form-label">Nombre Cliente</label>
						<input type="text" id="nameLarge" class="form-control" value="{{ $coti->clientes?->nombre }}" readonly />
					</div>
				</div>
				<div class="row g-2">
					<div class="col mb-0">
						<label for="emailLarge" class="form-label">Email</label>
						<input type="text" id="emailLarge" class="form-control" value="{{$coti->clientes?->email}}" readonly/>
					</div>
					<div class="col mb-0">
						<label for="dobLarge" class="form-label">Telefono</label>
						<input type="text" id="telefono" class="form-control" value="{{$coti->clientes?->telefono}}" readonly/>
					</div>
				</div>
				<div class="divider">
					<div class="divider-text">Datos Cotización</div>
				</div>
				<div class="row g-2">
					<div class="col mb-0">
						<label for="emailLarge" class="form-label">Sub Total</label>
						<input type="text" id="emailLarge" class="form-control" value="${{ number_format($coti->subtotal,0,',','.') }}" readonly/>
					</div>
					<div class="col mb-0">
						<label for="dobLarge" class="form-label">Descuento</label>
						<input type="text" id="telefono" class="form-control" value="${{ number_format(($coti->subtotal * $coti->descuento)/100,0,',','.') }} ({{ $coti->descuento }}%)" readonly/>
					</div>
					<div class="col mb-0">
						<label for="dobLarge" class="form-label">Total</label>
						<input type="text" id="telefono" class="form-control" value="${{ number_format($coti->total,0,',','.') }}" readonly/>
					</div>
				</div>
				<div class="row g-2">
					<div class="col mb-0">
						<label for="emailLarge" class="form-label">Estado</label>
						<input type="text" id="emailLarge" class="form-control" value="{{ $coti->estado }}" readonly/>
					</div>
					<div class="col mb-0">
						<label for="dobLarge" class="form-label">Crédito</label>
						<input type="text" id="telefono" class="form-control" value="{{ $coti->credito }}" readonly/>
					</div>
					<div class="col mb-0">
						<label for="dobLarge" class="form-label">Monto Crédito</label>
						<input type="text" id="telefono" class="form-control" value="{{ $coti->montoCredito }}" readonly/>
					</div>
				</div>
				<div class="divider">
					<div class="divider-text">Información Producto</div>
				</div>
				<div class="row g-2">
					<div class="card">
						<h5 class="card-header">Productos</h5>
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
									@foreach($coti->cotizacion_producto as $key => $prod)
									{{-- @dump($prod->producto) --}}
									<tr>
										<td>{{ $key + 1 }}</td>
										<td>{{ $prod->producto?->descripcion }}</td>
										<td>{{ $prod->producto?->tipo?->descripcion }}</td>
										<td>{{ $prod->producto?->valorLista }}</td>
										<td>{{ $prod->producto?->orientacion }}</td>
										<td>{{ $prod->producto?->piso }}</td>
										<td>{{ $prod->producto?->superficie }}</td>
										<td>{{ $prod->producto?->sector }}</td>
										<td>{{ $prod->producto?->estado }}</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="divider">
					<div class="divider-text">Usuario</div>
				</div>
				<div class="row">
					<div class="col mb-3">
						<label for="nameLarge" class="form-label">Nombre Completo</label>
						<input type="text" id="nameLarge" class="form-control" value="{{ $coti->usuarios?->full_name }}" readonly />
					</div>
				</div>
				<div class="row g-2">
					<div class="col mb-0">
						<label for="emailLarge" class="form-label">Email</label>
						<input type="text" id="emailLarge" class="form-control" value="{{$coti->usuarios?->correo}}" readonly/>
					</div>
					<div class="col mb-0">
						<label for="dobLarge" class="form-label">Estado</label>
						<input type="text" id="telefono" class="form-control" value="{{$coti->usuarios?->estado}}" readonly/>
					</div>
				</div>
				{{-- @dump($coti->usuarios) --}}
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
					Cerrar
				</button>
				{{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
			</div>
		</div>
	</div>
</div>
@endforeach
@endsection