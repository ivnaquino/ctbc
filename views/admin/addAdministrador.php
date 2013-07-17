<section class="container">
	<div class="row">
		<section class="span6 offset3">
			<div class="well">
				<div id="confirmations">
					<?php if (isset($this->confirm_create_usuario)): ?>
						<?php if ($this->confirm_create_usuario['estado']): ?>
							<div class="alert alert-success">
								<a class="close" data-dismiss="alert">&times;</a>
								<strong>Correcto!</strong> <?php echo $this->confirm_create_usuario['mensaje']; ?>
							</div>
						<?php else: ?>
							<div class="alert alert-error">
								<a class="close" data-dismiss="alert">&times;</a>
								<strong>Error!</strong> <?php echo $this->confirm_create_usuario['mensaje']; ?>
							</div>
						<?php endif ?>
					<?php endif ?>
				</div>
				<form action="<?php echo BASE_URL.Session::get('tipo') ?>/addAdministrador" method="POST" class="form-horizontal">
					<legend class="text-center">Registrar Administrador</legend>
					<div class="control-group">
						<label for="matricula" class="control-label">Matricula: </label>
						<div class="controls">
							<input type="text" name="matricula" id="matricula" placeholder="Matricula">
						</div>
					</div>
					<div class="control-group">
						<label for="password" class="control-label">Contraseña: </label>
						<div class="controls">
							<input type="password" name="password" id="password" placeholder="Contraseña">
						</div>
					</div>
					<div class="form-actions">
						<button class="btn btn-primary span1" type="submit" name="addAdmin">Enviar</button>
					</div>
				</form>
			</div>
		</section>
	</div>
</section>