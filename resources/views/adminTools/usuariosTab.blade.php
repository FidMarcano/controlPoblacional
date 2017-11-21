<table class="table">
	<tr>
		<th>Estudiante</th>
		<th>Cédula</th>
		<th>Correo electrónico</th>
		<th>Nivel</th>
		<th>Rol</th>
		<th>Residencia</th>
		<th>Participación</th>
		<th>Ciudad</th>
		<th>Opciones</th>
	</tr>

	@foreach($usuarios as $u)
		<tr>
			<td>{{ $u->nombre }} {{ $u->apellido }}</td>
			<td>{{ $u->cedula }}</td>
			<td>{{ $u->email }}</td>

			@if($u->nivel == 1)
				<td>Usuario</td>
			@else
				<td>Administrador</td>
			@endif
			
			@if($u->rol == 0)
				<td>No asignado</td>
			@elseif($u->rol == 1)
				<td>Estudiante</td>
			@else
				<td>Profesor</td>
			@endif
			@if($u->residencia == 0)
				<td>No residenciado</td>
			@else
				<td>Residenciado</td>
			@endif

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
				<form method="get" action="{{ url('/useradm/'.$u->id.'/edit') }}">
					{{ csrf_field() }}
					<button type="submit" class="btn btn-info">Editar</button>
				</form>
			</td>
		</tr>

		@include('modals.userModals')
	@endforeach
</table>

<!-- Se colocan los nombres de los Scope -->
{{ $usuarios->appends(Request::only(['nombre', 'cedula', 'correo', 'nivel', 'rol', 'residenciado', 'estatus', 'ciudad']))->links() }} 