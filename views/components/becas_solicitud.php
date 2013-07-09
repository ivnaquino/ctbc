<?php  

	if (isset($_POST['registrar'])) {
		$_beca_register = array(
			'matricula' => $_POST['matricula'],
			'descuento' => $_POST['descuento'],
			'estado' => 1
			);
		$_state = Beca::registrar($_beca_register);
	}
?>
<section class="container" id="contenedor">
	<div class="row">
		<section class="span8 offset2">
			<div class="well">
				<?php if (isset($_state)): ?>
					<div class="mensajes">
						<?php if ($_state): ?>
							<div class="alert alert-success">
								<a class="close" data-dismiss="alert">&times;</a>
								<strong>Correcto!</strong> El registro se ha completado con exito.
							</div>
						<?php else: ?>
							<div class="alert alert-error">
								<a class="close" data-dismiss="alert">&times;</a>
								<strong>Error!</strong> No se ha podido realizar el registro
							</div>
						<?php endif ?>
					</div>
				<?php endif ?>
				<form action="/becas/solicitudes/" class="form-horizontal" method='POST'>
					<legend class='text-center'>Solicitud de beca</legend>
					<div class="control-group">
						<label for="matricula" class='control-label'>Matricula: </label>
						<div class="controls">
							<input type="text" id='matricula' class="span5" name='matricula' placeholder='Matricula'>
						</div>
					</div>
					<div class="control-group">
						<label for="descuento" class="control-label">Descuento: </label>
						<div class="controls">
							<div class="input-prepend input-append">
								<span class="add-on">$</span>
								<input class="span4" id="descuento" type="text" name="descuento">
								<span class="add-on">.00</span>
							</div>
						</div>
					</div>
					<div class="form-actions">
						<button type="submit" class="btn btn-primary" name="registrar">Registrar</button>
					</div>
				</form>
			</div>
		</section>
	</div>
</section>