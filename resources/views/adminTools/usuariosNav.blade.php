<div class="col-md-12">
	Usuarios del sitio  || {{ $usuarios->total() }}
	<form  class="navbar-form" method="GET" action="{{ url('/useradm') }}">
		{{ csrf_field() }}
		<div class="input-group">
			<div class="form-group">
				<input type="text" class="form-control" name="nombre" placeholder="Nombre...">
				<input type="text" class="form-control" name="cedula" placeholder="Cédula...">
				<input type="text" class="form-control" name="correo" placeholder="Correo...">

				<select class="form-control" name="nivel">
				  <option>Nivel</option>
				  <option value="2">Administrador</option>
				  <option value="1">Usuario normal</option>
				</select>

				<select class="form-control" name="estatus">
				  <option>Participó en el proceso</option>
				  <option value="1">Si</option>
				  <option value="0">No</option>
				</select>

				<select class="form-control" name="ciudad">
				  <option>Ciudad</option>
				   @foreach($ciudades as $c)
				   	<option value="{{ $c->id }}">{{ $c->ciudad }}</option>
				   @endforeach
				</select>

				<span class="input-group-btn">
				    <button type="submit" name="Buscar" class="btn btn-primary">
				        Buscar
				            <span class="sr-only">Buscar</span>
				        </span>
				    </button>
				</span>
			</div>
		</div>
		
	</form>
</div>