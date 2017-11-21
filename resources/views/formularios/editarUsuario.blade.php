@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar {{ $usuario->nombre }} {{ $usuario->apellido }}</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/useradm/'.$usuario->id) }}">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label for="nombre" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control" name="nombre" value="{{ $usuario->nombre }}" disabled="true"  autofocus>

                                @if ($errors->has('nombre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('apellido') ? ' has-error' : '' }}">
                            <label for="apellido" class="col-md-4 control-label">Apellido</label>

                            <div class="col-md-6">
                                <input id="apellido" type="text" class="form-control" name="apellido" value="{{ $usuario->apellido }}" disabled="true"  autofocus>

                                @if ($errors->has('apellido'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('apellido') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cedula') ? ' has-error' : '' }}">
                            <label for="cedula" class="col-md-4 control-label">Cédula</label>

                            <div class="col-md-6">
                                <input id="cedula" type="number" class="form-control" name="cedula" value="{{ $usuario->cedula }}" disabled="true" autofocus>

                                @if ($errors->has('cedula'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cedula') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Correo electrónico</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $usuario->email }}" disabled="true" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Ciudad</label>

                            <div class="col-md-6">
                                <select name="id_ciudad" class="form-control" disabled="true">
                                    @foreach($ciudades as $c)
                                        @if($c->id == $usuario->id_ciudad)
                                            <option value="{{ $c->id }}">{{ $c->ciudad }}</option>
                                        @endif
                                    @endforeach
                                    @foreach($ciudades as $c)
                                        @if($c->id != $usuario->id_ciudad)
                                            <option value="{{ $c->id }}">{{ $c->ciudad }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('residencia') ? ' has-error' : '' }}">
                            <label for="residencia" class="col-md-4 control-label">Se encuentra residenciado</label>

                            <div class="col-md-6">
                                @if($usuario->residencia == 1)
                                    <input id="residencia" type="radio" name="residencia" value="1" checked="true" disabled="true" required autofocus>Si
                                    <input id="residencia" type="radio" name="residencia" value="0" disabled="true" required autofocus>No   
                                @else
                                    <input id="residencia" type="radio" name="residencia" value="1" disabled="true" required autofocus>Si
                                    <input id="residencia" type="radio" name="residencia" value="0" disabled="true" checked="true" required autofocus>No   
                                @endif
                                @if ($errors->has('residencia'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('residencia') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('trabaja') ? ' has-error' : '' }}">
                            <label for="trabaja" class="col-md-4 control-label">Trabaja</label>

                            <div class="col-md-6">
                                @if($usuario->trabajo == 1)
                                    <input id="trabaja" type="radio" name="trabaja" value="1" disabled="true" checked="true" required autofocus>Si
                                    <input id="trabaja" type="radio" name="trabaja" value="0" disabled="true" required autofocus>No   
                                @else
                                    <input id="trabaja" type="radio" name="trabaja" value="1" disabled="true" required autofocus>Si
                                    <input id="trabaja" type="radio" name="trabaja" value="0" disabled="true" checked="true" required autofocus>No   
                                @endif
                                @if ($errors->has('trabaja'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('trabaja') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('rol') ? ' has-error' : '' }}">
                            <label for="rol" class="col-md-4 control-label">Rol</label>

                            <div class="col-md-6">
                                @if($usuario->rol == 1 || $usuario->rol == 0)
                                    <input id="rol" type="radio" name="rol" value="1" checked="true" required autofocus>Estudiante
                                    <input id="rol" type="radio" name="rol" value="2" required autofocus>Profesor   
                                @else
                                    <input id="rol" type="radio" name="rol" value="1" required autofocus>Estudiante
                                    <input id="rol" type="radio" name="rol" value="0"  checked="true" required autofocus>Profesor   
                                @endif
                                @if ($errors->has('rol'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rol') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('nivel') ? ' has-error' : '' }}">
                            <label for="nivel" class="col-md-4 control-label">Nivel</label>

                            <div class="col-md-6">
                                @if($usuario->nivel == 1)
                                    <input id="nivel" type="radio" name="nivel" value="1" checked="true" required autofocus>Usuario
                                    <input id="nivel" type="radio" name="nivel" value="2" required autofocus>Administrador   
                                @else
                                    <input id="nivel" type="radio" name="nivel" value="1" required autofocus>Usuario
                                    <input id="nivel" type="radio" name="nivel" value="0"  checked="true" required autofocus>Administrador   
                                @endif
                                @if ($errors->has('nivel'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nivel') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Editar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
