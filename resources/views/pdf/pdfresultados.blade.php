<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Resultados</title>
</head>
<body>
	<table>
		<tr>
			<th>MATERIA</th>
			<th>BLOQUE</th>
			<th>MOTIVO</th>
		</tr>
		
			@foreach($resultados as $r)
				<tr>
					@foreach($materias as $m)
						@if($m->id == $r->id_materia)
							<td>{{ $m->materia }}</td>
						@endif
					@endforeach
					@foreach($bloques as $b)
						@if($b->id == $r->id_bloque)
							<td>{{ $b->bloque }}</td>
						@endif
					@endforeach 
					@foreach($motivos as $mo)
						@if($mo->id == $r->id_motivo)
							<td>{{ $mo->motivo }}</td>
						@endif
					@endforeach
				</tr>
			@endforeach
		
	</table>
</body>
</html>