<div role="tabpanel" class="tab-pane" id="materias{{ $u->id }}">
	@foreach($nuevos as $n)
		@if($n == $u->id)
			Fundamentos de la informatica <br>
			Formacion constitucional <br>
			Ingles I <br>
			Deporte <br>
			Logica matematica <br>
			Matematica I <br>
		@else
			@foreach($aprobados as $a)
				@if($a->id_usuario == $u->id && $a->ultima == 1)
					@foreach($materias as $m)
						@if($m->preladora == $a->id_materia)
							{{ ucfirst($m->materia) }} <br>
						@endif
					@endforeach
				@endif
			@endforeach
		@endif
	@endforeach
</div>