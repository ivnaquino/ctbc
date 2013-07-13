<section class="container" id="contenedor">
	<div class="row">
		<section class="span8 offset2">
			<div class="well">
				<?php if (isset($this->mensaje)): ?>
					<?php if ($this->mensaje['estado']): ?>
						<div class="alert alert-success">
							<a class="close" data-dismiss="alert">&times;</a>
							<strong>Correcto!</strong> <?php echo $this->mensaje['mensaje']; ?>
						</div>
					<?php else: ?>
						<div class="alert alert-error">
							<a class="close" data-dismiss="alert">&times;</a>
							<strong>Error!</strong> <?php echo $this->mensaje['mensaje']; ?>
						</div>
					<?php endif ?>
				<?php endif ?>
				<form action="<?php echo BASE_URL.Session::get('tipo').'/solicitudes/'; ?>" class="form-horizontal" method='POST'>
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