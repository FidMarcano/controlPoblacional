<table class="table">
	<thead><b><h3>Estudio realizado</h3></b></thead>
	<th><b>Materia seleccionada</b></th>
	<th><b>Bloque de horario</b></th>
	<th><b>Motivo</b></th>
	@foreach($encuesta as $e)
		@foreach($materias as $m)
			@if($m->id == $e->id_materia)
				<tr>
					<td>{{ ucfirst($m->materia) }}</td>
					@foreach($bloques as $b)
						@if($b->id == $e->id_motivo)
							<td>{{ $b->bloque }}</td>
						@endif
					@endforeach
					@foreach($motivos as $mo)
						@if($mo->id == $e->id_motivo)
							<td>{{ ucfirst($mo->motivo) }}</td>
						@endif
					@endforeach
				</tr>
			@endif
		@endforeach
	@endforeach
</table>

<form  class="form-horizontal" role="form" method="GET" action="{{ url('/pdf') }}">
 	<div class="form-group">
	    <div class="col-md-6 col-md-offset-4">
	        <button type="submit" name="confirmar" value="xAOIFBOIUASBDEGFORGINER" class="btn btn-primary">
	            Descargar respuestas
	        </button>
	    </div>
	</div>
</form>