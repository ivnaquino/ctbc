<section class="container">
	<div class="row">
		<section class="span6 offset3">
			<div class="well">
				<?php if (isset($_POST['eliminar-step1'])): ?>
					<div class="confirmation">
						<form action="<?php echo BASE_URL.Session::get('tipo').'/detalles/'.$this->_alumno->matricula; ?>" method="POST">
							<input type="hidden" value="<?php echo $_POST['matricula'] ?>" name="matricula">
							<div class="alert alert-error">
								<a class="close" data-dismiss="alert">&times;</a>
								<strong>Confirme!</strong> ¿Esta seguro de eliminar esta beca? <br>
								<button class="btn btn-danger" type="submit" name="eliminar-step2">Eliminar</button>
								<a class="btn" href="<?php echo BASE_URL.Session::get('tipo').'/detalles/'.$this->_alumno->matricula; ?>">Cancelar</a>
							</div>
						</form>
					</div>
				<?php endif ?>
				<form action="<?php echo BASE_URL.Session::get('tipo').'/detalles/'.$this->_alumno->matricula; ?>" class="form-horizontal" method="POST">
					<legend class="text-center"><?php echo $this->_alumno->matricula; ?></legend>
					<div class="control-group">
						<label for="matricula" class="control-label">Matricula: </label>
						<div class="controls">
							<input type="text" name="matricula" id="matricula" value="<?php echo $this->_alumno->matricula; ?>">
						</div>
					</div>
					<div class="control-group">
						<label for="nombre" class="control-label">Nombre: </label>
						<div class="controls">
							<input type="text" id="nombre" name="nombre" value="<?php echo $this->_alumno->nombre.' '.$this->_alumno->apellidopat.' '.$this->_alumno->apellidomat; ?>" disabled >
						</div>
					</div>
					<div class="control-group">
						<label for="grupo" class="control-label">Grupo: </label>
						<div class="controls">
							<input type="text" id="grupo" name="grupo" value="<?php echo $this->_grupo->nombre.' '.$this->_grupo->cuatrimestre; ?>" disabled>
						</div>
					</div>
					<div class="control-group">
						<label for="estado" class="control-label">Estado:</label>
						<div class="controls">
							<input type="text" name="estado" id="estado" value="<?php if($this->_beca->estado == 1){echo "Activo";}else{ echo "Inactivo";} ?>">
						</div>
					</div>
					<div class="control-group">
						<label for="descuento" class="control-label">Descuento: </label>
						<div class="controls">
							<div class="input-prepend input-append">
								<span class="add-on">$</span>
								<input type="text" name="descuento" id="descuento" value="<?php echo $this->_beca->descuento; ?> " disabled>
								<span class="add-on"></span>
							</div>
						</div>
					</div>
					<div class="form-actions">
						<button class="btn btn-danger" type="submit" name="eliminar-step1">Eliminar</button>
						<?php if ($this->_beca->estado == 1): ?>
							<button class="btn btn-warning" type="submit" name="inhabilitar">Inhabilitar</button>
						<?php else: ?>
							<button class="btn btn-success" type="submit" name="habilitar">Habilitar</button>
						<?php endif ?>
						
					</div>
				</form>
			</div>
		</section>
	</div>
</section>