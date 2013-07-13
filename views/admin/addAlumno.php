<section class="container">
	<div class="row">
		<div class="span8 offset2">
			<div class="well">
				<form action="<?php echo BASE_URL.Session::get('tipo') ?>/addAlumno" method='POST' class="form-horizontal">
					<legend>Registro de alumnos</legend>
					<div class="control-group">
						<label for="matricula" class='control-label'>Matricula: </label>
						<div class="controls">
							<input type="text" class='span3' id="matricula" name='matricula' placeholder="matricula">
						</div>
					</div>
					<div class="control-group">
						<label for="nombre" class='control-label'>Nombre: </label>
						<div class="controls">
							<input type="text" class='span3' id="nombre" name='nombre' placeholder="Nombre">
						</div>
					</div>
					<div class="control-group">
						<label for="apellidopat" class='control-label'>Apellido paterno : </label>
						<div class="controls">
							<input type="text" class='span3' id="apellidopat" name='apellidopat' placeholder="Apellido Paterno">
						</div>
					</div>
					<div class="control-group">
						<label for="apellidomat" class='control-label'>Apellido materno : </label>
						<div class="controls">
							<input type="text" class='span3' id="apellidomat" name='apellidomat' placeholder="Apellido Materno">
						</div>
					</div>
					<div class="control-group">
						<label for="grupo" class='control-label'>Grupo: </label>
						<div class="controls">
							<select name="grupo" id="grupo">
								<?php if ($this->grupos): ?>
									<?php foreach ($this->grupos as $grupo): ?>
										<option value="<?php echo $grupo->id; ?>"><?php echo $grupo->nombre.' '.$grupo->cuatrimestre; ?></option>
									<?php endforeach ?>
								<?php endif ?>
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
						<button type='submit' name='alumno_registro' class="btn btn-primary">Registrar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>