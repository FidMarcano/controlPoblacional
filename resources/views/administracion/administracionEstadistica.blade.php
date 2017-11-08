
<table class="table table-striped">

	<tr>
		<th>Encuestas realizadas</th>
		<td>{{ $cantidadTotal }}</td>
	</tr>

	<tr>
		<th>Respuestas contadas</th>
		<td>{{ $cantidadResp }}</td>
	</tr>

	<tr >
	@foreach($bloques as $b)
		@if($b->id == $mayBloque->id_bloque )
		<th>
			Bloque más elegido
		</th>
		<td>
			{{ $b->bloque }}	
		</td>
		@endif
	@endforeach
	</tr>

	<tr>
	@foreach($motivos as $m)
		@if($m->id == $mayMotivos->id_motivo )
		<th>
			Motivo más recurrente
		</th>
		<td>
			{{ ucfirst($m->motivo) }}	
		</td>
		@endif
	@endforeach
	</tr>

	<tr>
		<th>Porcentajes de cada bloque</th>
	</tr>
	<tr>
		<th>Bloque</th>
		<th>Porcentaje</th>
	</tr>
	@foreach($bloques as $b)
		@foreach($porcBloque as $p)
			@if($b->id == $p->id_bloque )
				<tr> 
					<td>{{ $b->bloque }}</td>
					<td> {{ $p->porcentaje }}</td>
				</tr>
			@endif
		@endforeach
	@endforeach

	<tr>
		<th>Porcentajes de cada motivo</th>
	</tr>
	<tr>
		<th>Motivo</th>
		<th>Porcentaje</th>
	</tr>
	@foreach($motivos as $m)
		@foreach($PorcMotivo as $p)
			@if($m->id == $p->id_motivo )
				<tr> 
					<td>{{ ucfirst($m->motivo) }}</td>
					<td> {{ $p->porcentaje }}</td>
				</tr>
			@endif
		@endforeach
	@endforeach

	<tr>
		<th>
			Estadísticas por materia
		</th>
	</tr>

	<tr>
		<th>
			Materia
		</th>
		<th>
			Principal horario
		</th>
		<th>
			Principal motivo			
		</th>
	</tr>

	@foreach($datosMaterias as $dat)
		<tr>
		@foreach($materias as $m)
			@if($m->id == $dat->id_materia)
				<td>
					{{ ucfirst($m->materia) }}
				</td>
			@endif
		@endforeach
		@foreach($bloques as $b)
			@if($b->id == $dat->id_bloque)
				<td>
					{{ ucfirst($b->bloque) }}
				</td>
			@endif
		@endforeach
		@foreach($motivos as $mo)
			@if($mo->id == $dat->id_motivo)
				<td>
					{{ ucfirst($mo->motivo) }}
				</td>
			@endif
		@endforeach
		</tr>
	@endforeach

	
</table>