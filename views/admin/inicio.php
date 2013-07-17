<section class="container">
	<div class="row">
		<div class="span6 offset3">
			<p><strong>Bienvenido</strong> al panel de administracion usted cuenta con las siguientes operaciones.</p>
		</div>
	</div>
	<div class="row">
		<div class="span6 offset3">
			<div class="well">
				<?php if (isset($this->confirmacion)): ?>
					<?php if ($this->confirmacion['estado']): ?>
						<div class="alert alert-success">
							<a class="close" data-dismiss="alert">&times;</a>
							<strong>Correcto!</strong> <?php echo $this->confirmacion['mensaje']; ?>
						</div>
					<?php else: ?>
						<div class="alert alert-error">
							<a class="close" data-dismiss="alert">&times;</a>
							<strong>Error!</strong> <?php echo $this->confirmacion['mensaje']; ?>
						</div>
					<?php endif ?>
				<?php endif ?>
				<form action="<?php echo BASE_URL.Session::get('tipo'); ?>" method="POST">
					<legend class="text-center">Desbloquear usuario</legend>
					<center><input type="text" class="span4 text-center" name="matricula" placeholder="Matricula"></center><br>
					<center><button class="btn btn-primary" type="submit" name="desbloquear">Desbloquer</button></center>
				</form>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="span6 offset3">
			    <ul class="nav nav-tabs nav-stacked">
			    	<li><a href="<?php echo BASE_URL.Session::get('tipo'); ?>/addAlumno">Agregar Alumno</a></li>
			    	<li><a href="<?php echo BASE_URL.Session::get('tipo'); ?>/addGrupo">Agregar Grupo</a></li>
			    	<li><a href="<?php echo BASE_URL.Session::get('tipo'); ?>/addAdministrativo">Agregar Administrativo</a></li>
			    	<li><a href="<?php echo BASE_URL.Session::get('tipo'); ?>/addAdministrador">Agregar Administrador</a></li>
			    </ul>
		</div>
	</div>
</section>