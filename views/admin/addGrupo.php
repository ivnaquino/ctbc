<section class="container">
	<div class="row">
		<div class="span6 offset3">
			<div class="well">
				<form action="<?php echo BASE_URL.Session::get('tipo') ?>/addGrupo" method='POST' class="form-horizontal">
					<legend> Registro de grupos </legend>
					<div class="control-group">
						<label for="nombre" class='control-label'>Nombre: </label>
						<div class="controls">
							<input type="text" class='span3' id="nombre" name='nombre'>
						</div>
					</div>
					<div class="control-group">
						<label for="cuatrimestre" class='control-label'>Cuatrimestre: </label>
						<div class="controls">
							<input type="text" class='span3' id="cuatrimestre" name='cuatrimestre'>
						</div>
					</div>
					<div class="form-actions">
						<button class="span2 btn btn-primary" type='submit' name='grupo_registro'>Enviar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>