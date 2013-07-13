	<section class="container">
		<div class="row">
			<section class="span8 offset2 box-login">
				<div class="well">
					<?php if (isset($this->_error_login)): ?>
						<?php if ($this->_error_login['estado']): ?>
							<div class="alert alert-error">
								<a class="close" data-dismiss="alert">&times;</a>
								<strong>Error!</strong> <?php echo $this->_error_login['mensaje']; ?>
							</div>
						<?php endif ?>
					<?php endif ?>
					<form class="form-horizontal" method='POST' action="<?php echo BASE_URL ?>auth/login">
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