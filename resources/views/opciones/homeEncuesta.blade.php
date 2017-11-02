<table class="table">
	<tr><td><b>Usuario</b></td> <td>{!! Auth::user()->nombre !!} {!! Auth::user()->apellido !!}</td></tr>
	<tr><td><b>Uc aprobadas</b></td> <td>{!! Auth::user()->uc_aprobadas !!}</td></tr>
	<tr><td><b>Fecha</b></td> <td>{!! $fecha !!}</td></tr>
</table>

No ha participado en nuestro proceso aún. Si desea participar haga click <a href="{{ url('/encuesta')}}">aquí</a>.<br>

@if(Auth::user()->nivel == 2)
	<a href="{{ url('/administrar') }}">Administrar</a>
@endif