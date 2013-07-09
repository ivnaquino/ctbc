<?php  
	$grupos = Grupo::all();

	if (isset($_POST['grupo_registro'])) {
		$grupo_registro = array('nombre'=>$_POST['nombre'],'cuatrimestre'=>$_POST['cuatrimestre']);
		Registrar::grupo($grupo_registro);
	}
	if (isset($_POST['alumno_registro'])) {
		$_alumno = array(
			'matricula'=>$_POST['matricula'],
			'nombre'=>$_POST['nombre'],
			'apellidopat' => $_POST['apellidopat'],
			'apellidomat' => $_POST['apellidomat'],
			'grupo' => $_POST['grupo'],
			'password'=>$_POST['password']
			);
		Registrar::alumno($_alumno);
	}
	if (isset($_POST['administrativo_registro'])) {
		$_adminstrativo = array(
			'matricula'=>$_POST['matricula'],
			'nombre'=>$_POST['nombre'],
			'apellidopat' => $_POST['apellidopat'],
			'apellidomat' => $_POST['apellidomat'],
			'tipo' => $_POST['tipo'],
			'password'=>$_POST['password']
			);
	}
	if (isset($_POST['desbloquear-usuario'])) {
		AdminUser::desbloquear($_POST['matricula']);
	}
?>

<section class="container">
	<div class="row"><!-- Desbloquear matricula -->

	</div>
	<div class="row">
		<section class="span6"><!-- Alumno -->
			<div class="well">
				<form action="/admin" method='POST' class="form-horizontal">
					<legend>Registro de alumnos</legend>
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
						<label for="grupo" class='control-label'>Grupo: </label>
						<div class="controls">
							<select name="grupo" id="grupo">
								<?php if ($grupos): ?>
									<?php foreach ($grupos as $grupo): ?>
										<option value="<?php echo $grupo['id'] ?>"><?php echo $grupo['nombre'].' '.$grupo['cuatrimestre']; ?></option>
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
		</section><!-- Alumno -->
		<section class="span6 "> <!-- Desbloquear usuario-->
			<div class="well">
				<form action="/admin" method="POST">
					<legend class="text-center">Desbloquear usuario</legend>
					<input type="text" class="span4" name="matricula" placeholder="Matricula">
					<button type="submit" name="desbloquear-usuario" class="btn btn-primary">Desbloquear</button>
				</form>
			</div>
		</section> <!-- Desbloquear usuario-->
		<section class="span6"> <!-- Grupo-->
			<div class="well">
				<form action="/admin" method='POST' class="form-horizontal">
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
		</section><!-- Grupo-->
	</div>
	<div class="row">
		<seccion class="span6">
			<div class="well">
				<form action="/admin" method="POST" class="form-horizontal">
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
								<option value="operador">Operador</option>
								<option value="contador">Contador</option>
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
						<button type='submit' name='administrativo_registro' class="btn btn-primary">Registrar</button>
					</div>
				</form>
			</div>
		</seccion>
		<seccion class="span6"></seccion>
	</div>
</section>