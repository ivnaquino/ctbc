<section class="container">
	<div class="row">
		<section class="span6 offset3">
			<div class="well">
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