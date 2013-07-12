<?php  
	$_alumno = Alumno::buscar($parametro);

	if (isset($_POST['eliminar-step2'])) {
		Beca::eliminar($_POST['matricula']);
	}
	if (isset($_POST['inhabilitar-step1'])) {
		$_validar_inhabilitado = Beca::inhabilitar($_alumno['matricula']);
	}
	if (isset($_POST['habilitar-beca'])) {
		$_validar_habilitado = Beca::habilitar($_alumno['matricula']);
	}
	
	$_beca = Beca::alumno($_alumno['matricula']);
?>
<section class="container">
	<div class="row">
		<section class="span6 offset3">
			<div class="well">
				<section id="confirmations">
					<?php if (isset($_POST['eliminar-step1'])): ?>
						<form action="/becas/ver/<?php echo $parametro ?>" method="POST">
							<div class="alert alert-error">
								<a class="close" data-dismiss="alert">&times;</a>
								<strong>Confirme!</strong> 
								¿Esta seguro que desea eliminar la beca asociada a esta matricula <?php echo $_POST['matricula']; ?>?
								<input type="hidden" name="matricula" value="<?php echo $_POST['matricula']; ?>">
								<button type='submit' class="btn-danger" name="eliminar-step2">Eliminar</button>
								<a href="/becas/ver/<?php echo $parametro ?>" class='btn'>Cancelar</a>
							</div>
						</form>
					<?php endif ?>
					<?php if (isset($_validar_inhabilitado)): ?>
						<?php if ($_validar_inhabilitado): ?>
							<div class="alert alert-success">
								<a class="close" data-dismiss="alert">&times;</a>
								<strong>Correcto !</strong> Se ha inhabilitado la beca correctamente.
							</div>
						<?php else: ?>
							<div class="alert alert-error">
								<a class="close" data-dismiss="alert">&times;</a>
								<strong>Error!</strong> Ha sucedido un error durante el proceso
							</div>
						<?php endif ?>
					<?php endif ?>
					<?php if (isset($_validar_habilitado)): ?>
						<?php if ($_validar_habilitado): ?>
							<div class="alert alert-success">
								<a class="close" data-dismiss="alert">&times;</a>
								<strong>Correcto!</strong> La beca ha sido habilitada con correctamente.
							</div>
						<?php else: ?>
							<div class="alert alert-error">
								<a class="close" data-dismiss="alert">&times;</a>
								<strong>Error!</strong> El proceso no se ha podido realizar con exito.
							</div>
						<?php endif ?>
					<?php endif ?>
				</section>
				<form action="/becas/ver/<?php echo $parametro ?>" class="form-horizontal" method="POST">
					<legend class='text-center'><?php echo $_alumno['matricula']; ?></legend>
					<div class="control-group">
						<label for="matricula"  class='control-label'>Matricula: </label>
						<div class="controls">
							<input type="text" id="matricula" class="span3" placeholder='Matricula'
							value="<?php echo $_alumno['matricula']; ?>" editabled='false' name="matricula">
						</div>
					</div>
					<div class="control-group">
						<label for="nombre" class='control-label'>Nombre: </label>
						<div class="controls">
							<input type="text" class="span3" id='nombre' value="<?php echo $_alumno['nombre'].' '.$_alumno['apellidopat'].' '.$_alumno['apellidomat']; ?>" name='nombre' disabled>
						</div>
					</div>
					<div class="control-group">
						<label for="grupo" class="control-label">Grupo: </label>
						<div class="controls">
							<input type="text" class="span3" id="grupo" name='grupo' 
						value="<?php echo $_alumno['grupo'].' '.$_alumno['cuatrimestre']; ?>" disabled>
						</div>
					</div>
					<div class="control-group">
						<label for="estado" class='control-label'>Estado: </label>
						<div class="controls">
							<input type="text" id="estado" class="span3"
							value="<?php if($_beca['estado']){echo 'Activo';}else{ echo 'Inactivo';} ?>">
						</div>
					</div>
					<div class="control-group">
						<label for="descuento" class="control-label">Descuento: </label>
						<div class="controls">
							<div class="input-prepend input-append">
								<span class="add-on">$</span>
								<input class="span2" id="descuento" type="text" value="<?php echo $_beca['descuento']; ?>" disabled>
								<span class="add-on"></span>
							</div>
						</div>
					</div>
					<div class="form-actions">
						<button type="submit" name="eliminar-step1" class='btn btn-danger'>Eliminar beca</button>
						<?php if ($_beca['estado']): ?>
							<button type="submit" name="inhabilitar-step1" class='btn btn-warning'>Inhabilitar beca</button>
						<?php else: ?>
							<button type="submit" name="habilitar-beca" class='btn btn-success'>Habilitar beca</button>
						<?php endif ?>
					</div>
				</form>
			</div>
		</section>
	</div>
</section>