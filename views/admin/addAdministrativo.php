<section class="container">
	<div class="row">
		<div class="span6 offset3">
			<div class="well">
				<div id="confirmations">
					<?php if (isset($this->confirm_create_administrativo)): ?>
						<?php if ($this->confirm_create_administrativo['estado']): ?>
							<div class="alert alert-success">
								<a class="close" data-dismiss="alert">&times;</a>
								<strong>Correcto!</strong> <?php echo $this->confirm_create_administrativo['mensaje']; ?>
							</div>
						<?php else: ?>
							<div class="alert alert-error">
								<a class="close" data-dismiss="alert">&times;</a>
								<strong>Error!</strong> <?php echo $this->confirm_create_administrativo['mensaje']; ?>
							</div>
						<?php endif ?>
					<?php endif ?>
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
				<form action="<?php echo BASE_URL.Session::get('tipo') ?>/addAdministrativo" method="POST" class="form-horizontal">
					<legend class="text-center">Registrar administritivo</legend>
					<div class="control-group">
						<label for="matricula" class='control-label'>Matricula: </label>
						<div class="controls">
							<input type="text" class='span3' id="matricula" name='matricula'>
						</div>
					</div>
					<div class="control-group">
						<label for="nombre" class='control-label'>Nombre: </label>
						<div class="controls">
							<input type="text" class='span3' id="nombre" name='nombre'>
						</div>
					</div>
					<div class="control-group">
						<label for="apellidopat" class='control-label'>Apellido paterno : </label>
						<div class="controls">
							<input type="text" class='span3' id="apellidopat" name='apellidopat'>
						</div>
					</div>
					<div class="control-group">
						<label for="apellidomat" class='control-label'>Apellido materno : </label>
						<div class="controls">
							<input type="text" class='span3' id="apellidomat" name='apellidomat'>
						</div>
					</div>
					<div class="control-group">
						<label for="tipo" class='control-label'>Tipo: </label>
						<div class="controls">
							<select name="tipo" id="tipo">
								<option value="becas">Becas</option>
								<option value="contaduria">Contador</option>
							</select>
						</div>
					</div>
					<div class="control-group">
						<label for="password" class="control-label">Contraseña: </label>
						<div class="controls">
							<input type="password" id="password" placeholder="Contraseña" name="password">
						</div>
					</div>
					<div class="form-actions">
						<button type='submit' name='addOperador' class="btn btn-primary">Registrar</button>
					</div>
			</div>
		</div>
	</div>
</section>