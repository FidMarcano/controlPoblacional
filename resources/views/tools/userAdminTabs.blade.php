<div role="tabpanel">
	<ul class="nav nav-tabs" role="tablist">
		<li role="presentation" class="active"><a href="#datos{{ $u->id }}" aria-controls="#datos{{ $u->id }}" data-toggle="tab" role="tab">Datos del usuario</a></li>
		<li role="presentation"><a href="#materias{{ $u->id }}" aria-controls="#materias{{ $u->id }}" data-toggle="tab" role="tab">Materias para el proceso</a></li>
		<li role="presentation"><a href="#respuestas{{ $u->id }}" aria-controls="#respuestas{{ $u->id }}" data-toggle="tab" role="tab">Respuestas dadas</a></li>
	</ul>

	<div class="tab-content">


		<!-- Datos del usuario -->
		@include('adminTools.datosTab')

		<!-- Materias sobre las que pueden opinar -->
		@include('adminTools.materiasTab')

		<!-- Respuestas dadas por los usuarios en sus procesos -->
		@include('adminTools.respuestasTab')

	</div>
</div>