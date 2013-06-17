<?php 
	require_once "paths.php";
	require_once APP_PATH.'database.php';
	require_once CORE.'connection.php';
	require_once CORE.'auth.php';
	require_once CORE.'alumno.php';
	require_once CORE.'administrativo.php';
	require_once APP_PATH.'layout.php';

	require_once $layout_components['ruta_header-login'];
	if (Auth::logged_on()) {
		header('Location: /');
	}

?>
	<div class="separador-top"></div>
	<section class="container">
		<div class="row">
			<section class="span8 offset2 box-login">
				<div class="well">
					<?php  
						if (isset($_POST['submit'])) {
							$matricula = $_POST['matricula'];
							$password = $_POST['password'];
							$verificar = Auth::login($matricula,$password);
							if ($verificar['estado']) {
								header('Location: /');
							}else{
								echo '
								<div class="alert alert-error">
									<a class="close" data-dismiss="alert">&times;</a>
									<strong>Error!</strong> '.$verificar['datos'].'
								</div>
								';
							}
						}
					?>
					<form class="form-horizontal" method='POST' action='/login'>
						<fieldset>
							<legend class='text-center'>IESO - Inicio de sesion</legend>
							<div class="control-group">
								<label class="control-label" for="matricula">Matricula</label>
								<div class="controls">
									<input type="text" class="span4" id="matricula" name='matricula' placeholder='Matricula'>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="password">Contraseña</label>
								<div class="controls">
									<input type="password" class="span4" id="password" name='password' placeholder='Contraseña'>
								</div>
							</div>
							
							<div class="form-actions">
								<button type="submit" class="btn btn-primary span3" name='submit'>Iniciar</button>
							</div>
						</fieldset>
					</form>
				</div>
			</section>
		</div>
	</section>

<?php
	require_once $layout_components['ruta_footer']; 
?>