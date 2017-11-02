<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                @foreach($materias as $m)
                    @if($m->id == $materia->id_materia)
                <div class="panel-heading">A continuación, responda las siguientes preguntas sobre la materia {{ ucfirst($m->materia) }}</div>
                    @endif
                @endforeach
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/encuestas') }}">
                        {{ csrf_field() }}
                        <select class="form-control" name="bloque">
                            <option value="0">Seleccione un horario de su preferencia</option>
                            @foreach($bloques as $b)
                                <option value="{{ $b->id }}">{{ $b->bloque }}</option>
                            @endforeach
                        </select>
                        <br>
                        <select class="form-control" name="motivo">
                            <option value="0">Seleccione un motivo para preferir ese horario</option>
                            @foreach($motivos as $mo)
                                <option value="{{ $mo->id }}">{{ ucfirst($mo->motivo) }}</option>
                            @endforeach
                        </select>
                        <input type="text" value="{{ $materia->id_materia }}" name="idMateria" hidden="true">
                            
                     	<div class="form-group">
						    <div class="col-md-6 col-md-offset-4">
						        <button type="submit" name="confirmar" class="btn btn-primary">
						            Confirmar
						        </button>
                            </div>
						</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>