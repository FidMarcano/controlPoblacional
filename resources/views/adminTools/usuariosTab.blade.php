<table class="table">
	<tr>
		<th>Estudiante</th>
		<th>Cédula</th>
		<th>Correo electrónico</th>
		<th>Nivel</th>
		<th>Participación</th>
		<th>Ciudad</th>
		<th>Opciones</th>
	</tr>

	@foreach($usuarios as $u)
		<tr>
			<td>{{ $u->nombre }} {{ $u->apellido }}</td>
			<td>{{ $u->cedula }}</td>
			<td>{{ $u->email }}</td>
			<td>{{ $u->nivel }}</td>
			@if( $u->estatus == 0)
				<td>No</td>
			@else
				<td>Si</td>
			@endif

			@foreach($ciudades as $c)
				@if($c->id == $u->id_ciudad)
					<td>{{ $c->ciudad }}</td>
				@endif
			@endforeach
			<td>
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detalles{{ $u->id }}">Detalles</button>
				<button class="btn btn-info">Editar</button>
			</td>
		</tr>

		@include('modals.userModals')
	@endforeach
</table>
{{ $usuarios->links() }}