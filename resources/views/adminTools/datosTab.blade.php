<div role="tabpanel" class="tab-pane active" id="datos{{ $u->id }}">
			
	<b>Nombre</b>
	<span class="pull-right">{{ ucfirst($u->nombre) }} {{ ucfirst($u->apellido) }}</span>
	
		<br>

	<b>Cedula</b>
	<span class="pull-right">V{{ $u->cedula }}</span>
	
	<br>

	<b>Correo electrónico</b>
	<span class="pull-right">{{ $u->email }}</span>

	<br>

	<b>Unidades de crédito aprobadas</b>
	<span class="pull-right">{{ $u->uc_aprobadas }}</span>

	<br>

	<b>Ciudad</b>
	@foreach($ciudades as $c)
		@if($c->id == $u->id_ciudad)
			<span class="pull-right">{{ $c->ciudad }}</span>
		@endif
	@endforeach
	
</div>