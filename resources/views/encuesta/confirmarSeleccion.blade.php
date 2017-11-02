<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Favor confirme las materias seleccionadas</div>

                <div class="panel-body">
                    <h4>Una vez confirmadas las materias, no se podrán cambiar.</h4>
                    <form class="form-horizontal" role="form" method="Get" action="{{ url('/encuestas/create') }}">
                        {{ csrf_field() }}

                        <table class="table">
                            @foreach($materias as $m)
                                @foreach($elegidas as $e)
                                    @if($m->id == $e)
                                        <tr><td><b>{{ ucfirst($m->materia) }}</b></td></tr>
                                    @endif
                                @endforeach
                            @endforeach
                        </table>
                     	
                        @foreach($elegidas as $e)
                            <input type="checkbox" name="materia[]" value="{{ $e }}" hidden="true" checked="true">
                        @endforeach

                     	<div class="form-group">
						    <div class="col-md-6 col-md-offset-4">
						        <button type="submit" name="confirmar" class="btn btn-primary">
						            Confirmar
						        </button>
                                <button type="submit" name="cancelar" class="btn btn-default">
                                    Cancelar
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