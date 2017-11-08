@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @if($n == 1)
                        Home
                    @elseif($n == 2 || $n == 3 || $n == 4)
                        Estudio de la población
                    @elseif($n == 10)
                        Estadísticas del estudio
                    @endif
                </div>

                <div class="panel-body">
                    @if($n == 1)
                        @if(Auth::user()->estatus == 0)
                            @include('opciones.homeEncuesta')
                        @else
                            @include('opciones.homeResultados')
                        @endif
                    @elseif($n == 2)
                        @include('encuesta.encuestaInicio')
                    @elseif($n == 3)
                        @include('encuesta.confirmarSeleccion')
                    @elseif($n == 4)
                        @include('encuesta.preguntas')
                    @elseif($n == 5)
                        @include('encuesta.realizada')
                    @elseif($n == 6)
                        @include('resultados.resultadosIncio') 
                    @elseif($n == 7)
                        @include('administracion.administracionInicio')
                    @elseif($n == 8)
                        @include('administracion.administracionUsuarios')
                    @elseif($n == 9)
                        @include('administracion.administracionResultados')  
                    @elseif($n == 10)
                        @include('administracion.administracionEstadistica')        
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
