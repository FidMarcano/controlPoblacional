<div role="tabpanel" class="tab-pane" id="respuestas{{ $u->id }}">
			
	@foreach($encuestas as $e)
		@if($e->id_user == $u->id)
			@foreach($materias as $m)
				@if($m->id == $e->id_materia)
					<span class="pull-left">{{ ucfirst($m->materia) }}</span>
				@endif
			@endforeach
			@foreach($motivos as $m)
				@if($m->id == $e->id_motivo)
					<span class="pull-center">{{ ucfirst($m->motivo) }}</span>
				@endif
			@endforeach
			@foreach($bloques as $b)
				@if($b->id == $e->id_bloque)
					<span class="pull-right">{{ ucfirst($b->bloque) }}</span>
				@endif
			@endforeach
			<br>
		@endif
	@endforeach



	@foreach($noP as $n)
		@if($u->id == $n)
			No ha participado en el proceso
		@endif
	@endforeach
	
</div>