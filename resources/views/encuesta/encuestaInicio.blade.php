<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Favor seleccione las materias que desea inscribir</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="Get" action="{{ url('/encuestas') }}">
                        {{ csrf_field() }}

                        @if($o == 1)
                     	@foreach($materiast as $mt)
                     		@foreach($materias as $m)
                     			@if($mt->id == $m)
                     				<input value="{{ $mt->id }}" id="materias" type="checkbox" name="materia[]">
                 					{{ $mt->materia }}<br>
                     			@endif
                     		@endforeach
                     	@endforeach

                     	
                        @else
                            <input value="1" id="materias" type="checkbox" name="materia[]">Fundamentos de la informática <br>
                            <input value="2" id="materias" type="checkbox" name="materia[]">Formación constitucional <br>
                            <input value="3" id="materias" type="checkbox" name="materia[]">Inglés I <br>
                            <input value="4" id="materias" type="checkbox" name="materia[]">Deporte <br>
                            <input value="5" id="materias" type="checkbox" name="materia[]">Lógica matemática <br>
                            <input value="6" id="materias" type="checkbox" name="materia[]">Matemática I <br>
                        @endif
                     	
                     	
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Continuar
                                </button>
                            </div>
                        </div>
                        @include('modals.confirmarMaterias')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>