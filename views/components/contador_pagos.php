<?php 
if (isset($_POST['setAlumno'])) {
	$_alumno= Alumno::buscar($_POST['matricula']);
	$_alumno_beca_exist = Beca::exist($_alumno['matricula']);
	if ($_alumno_beca_exist) {
		$_alumno_beca = Beca::alumno($_alumno['matricula']);
		$_a_descuento = $_alumno_beca['descuento'];
	}else {
		$_a_descuento = 0;
	}
}

if (isset($_POST['aceptar'])) {
	$pago_actual = array(
		'matricula' => $_POST['matricula'],
		'fecha' => date('Y-m-d'),
		'concepto' => $_POST['concepto'],
		'recargo' => 0,
		'monto' => $_POST['monto'],
		'estado' => 'pagado'
		);
	$_pago_success = Pago::pagar($pago_actual);
}
if (isset($_POST['aplazar'])) {
	$pago_actual = array(
		'matricula' => $_POST['matricula'],
		'fecha' => date('Y-m-d'),
		'concepto' => $_POST['concepto'],
		'recargo' => 0,
		'monto' => $_POST['monto'],
		'estado' => 'aplazado'
		);
	$_pago_success = Pago::pagar($pago_actual);
}

 ?>
<section class="container">
	<div class="row">
		<section class="span8 offset2">
			<div class="well">
				<?php if (isset($_pago_success)): ?>
					<div class="mensajes">
						<?php if ($_pago_success['state']): ?>
							<div class="alert alert-success">
								<a class="close" data-dismiss="alert">&times;</a>
								<strong>Correcto!</strong> <?php echo $_pago_success['mensaje']; ?>
							</div>
						<?php else: ?>
							<div class="alert alert-error">
								<a class="close" data-dismiss="alert">&times;</a>
								<strong>Error!</strong> <?php echo $_pago_success['mensaje']; ?>
							</div>
						<?php endif ?>
					</div>
				<?php endif ?>
				<form action="/contaduria/pagos/" class="form-horizontal" method='POST'>
					<legend class='text-center'>Formulario de pago</legend>
					<div class="control-group">
						<label for="matricula" class="control-label">Matricula: </label>
						<div class="controls">
							<input type="text" id='matricula' class='span4' name='matricula' placeholder='Matricula'
							value="<?php if(isset($_alumno)){echo $_alumno['matricula'];} ?>">
							<button type='submit' name='setAlumno' class='btn btn-link'>Establecer</button>
						</div>
					</div>
					<div class="control-group">
						<label for="nombre" class='control-label'>Nombre</label>
						<div class="controls">
							<input type="text" name='nombre' id='nombre' class='span5' placeholder='Nombre' disabled 
							value="<?php if(isset($_alumno)){echo $_alumno['nombre'].' '.$_alumno['apellidopat'].' '.$_alumno['apellidomat'];} ?>">
						</div>
					</div>
					<div class="control-group">
						<label for="carrera" class='control-label'>Carrera</label>
						<div class="controls">
							<input type="text" id='carrera' name='carrera' class='span5' placeholder='Carrera' disabled
							value="<?php if(isset($_alumno)){echo $_alumno['grupo'].' '.$_alumno['cuatrimestre'];} ?>">
						</div>
					</div>
					<div class="control-group">
						<label for="descuento" class='control-label'>Descuento</label>
						<div class="controls">
							<input type="text" id='descuento' name='descuento' class='span5' placeholder='Descuento' disabled
							value="<?php if(isset($_a_descuento)){ if($_a_descuento){ echo $_a_descuento; }else{ echo 0;} } ?>" >
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
		</section>
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