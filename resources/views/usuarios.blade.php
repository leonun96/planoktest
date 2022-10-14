@extends('layouts.layout', ['titulo' => 'Usuarios', 'item' => 2])

@section('contenido1')
<div class="container-xxl flex-grow-1 container-p-y">
	<div class="card">
		<h5 class="card-header">Usuarios</h5>
		<div class="table-responsive text-nowrap">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Rut</th>
						<th>Perfil</th>
						<th>Correo</th>
						<th>Edad</th>
						<th>Sexo</th>
					</tr>
				</thead>
				<tbody class="table-border-bottom-0">
					@foreach($usuarios as $usuario)
					<tr>
						<td>{{ $usuario->full_name }}</td>
						<td>{{ $usuario->rut }}</td>
						<td>{{ $usuario->perfil?->descripcion }}</td>
						<td>{{ $usuario->correo }}</td>
						<td>{{ $usuario->edad }}</td>
						<td>{{ $usuario->sexo }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection