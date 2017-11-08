<div class="container-fluid">
	<div class="col-md-12">
		<form method="GET" class="form-horizontal" action="{{ url('/administracion/create') }}">
    	{{ csrf_field() }}	
			<table class="table">
				<tr>
					<th>Acción</th>
					<th>Botón</th>
				</tr>
				<tr>
					<td>
						Estadísticas de encuestas
					</td>
					<td>
						<button class="btn btn-primary" name="ver" id="ver">Ver</button>
					</td>
				</tr>	
			</table>
		</form>
	</div>
</div>