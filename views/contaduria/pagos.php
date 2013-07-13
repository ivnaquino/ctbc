<section class="container">
	<div class="row">
		<div class="span8 offset2">
			<div class="well">
				<?php if (isset($this->_mensaje)): ?>
					<div class="alert alert-success">
						<a class="close" data-dismiss="alert">&times;</a>
						<strong>Correcto!</strong> <?php echo $this->_mensaje; ?>
					</div>
				<?php endif ?>
				<form action="<?php echo BASE_URL.Session::get('tipo').'/pago/'; ?>" method='POST' class="form-horizontal">
					<legend class='text-center'>Formulario de pago</legend>
					<div class="control-group">
						<label for="matricula" class="control-label">Matricula: </label>
						<div class="controls">
							<input type="text" name="matricula" id="matricula" class='span4'
							value="<?php if($this->_alumno){echo $this->_alumno->matricula;} ?>" placeholder="Matricula">
							<button class="btn btn-link" type="submit" name="setAlumno">Establecer</button>
						</div>
					</div>
					<div class="control-group">
						<label for="nombre" class="control-label">Nombre: </label>
						<div class="controls">
							<input type="text" name="nombre" id="nombre" class='span5' 
							value="<?php if($this->_alumno){echo $this->_alumno->nombre.' '.$this->_alumno->apellidopat.' '.$this->_alumno->apellidomat;} ?>" placeholder="Nombre" disabled>
						</div>
					</div>
					<div class="control-group">
						<label for="grupo" class="control-label">Grupo: </label>
						<div class="controls">
							<input type="text" name="grupo" id="grupo" class='span5' 
							value="<?php if($this->_alumno_grupo){echo $this->_alumno_grupo->nombre.' '.$this->_alumno_grupo->cuatrimestre;} ?>" placeholder="Grupo" disabled>
						</div>
					</div>
					<div class="control-group">
						<label for="descuento" class="control-label">Descuento: </label>
						<div class="controls">
							<input type="text" name="descuento" id="descuento" class='span5' 
							value="<?php if($this->_alumno_beca){if($this->_alumno_beca->estado == 1){echo $this->_alumno_beca->descuento;}} ?>" placeholder="Descuento" disabled>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="concepto">Concepto</label>
						<div class="controls">
							<select id="concepto" class='span5' name='concepto'>
								<option value='colegiatura' monto='0'>Elija una opcion...</option>
								<option value='colegiatura' monto='3050'>Colegiatura</option>
								<option value='inscripcion' monto='3200'>Inscripcion</option>
								<option value='examen extraordinario' monto='1200'>Examen Extraordinario</option>
								<option value='examen a titulo' monto='1500'>Examen a titulo</option>
							</select>
						</div>
					</div>
					<div class="control-group">
						<label for="monto" class='control-label'>Monto total</label>
						<div class="controls">
							<div class="input-prepend input-append">
								<span class="add-on">$</span>
								<input type="text" id='monto' class='span4' name='monto' placeholder='Total'>
								<span class="add-on">.00</span>
							</div>
						</div>
					</div>
					<div class="form-actions">
						<button type='submit' class='btn btn-primary' name='aceptar' value='aceptar'>Aceptar</button>
						<button type='submit' class='btn btn-warning' name='aplazar' value='aplazar'>Aplazar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>

<script>
	$(document).on("ready",function(){
		$("#concepto").on("change",function(){
			var monto = parseInt($("#concepto option:selected").attr('monto'));
			var desc = ($('#descuento').attr('value'));
			if (desc == ''){
				desc = 0;
			}else{
				desc = parseInt($('#descuento').attr('value'));
			}
			var total = monto - desc;
			$('#monto').attr('value', total);
		});
	})
</script>