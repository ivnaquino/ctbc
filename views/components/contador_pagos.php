<?php 

if (isset($_POST['aceptar'])) {
	$pago_actual = array(
		'matricula' => $_POST['matricula'],
		'fecha' => date('Y-m-d'),
		'concepto' => $_POST['concepto'],
		'recargo' => 0,
		'monto' => $_POST['monto'],
		'estado' => 'pagado'
		);
	//$pago_error = Pago::pagar($pago_actual);
	//echo $pago_error;
	echo "Aceptar";
}
if (isset($_POST['setAlumno'])) {
	$alumno_pago = Alumno::buscar($_POST['matricula']);
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
	$pago_error = Pago::pagar($pago_actual);
	//echo $pago_error;
}

 ?>
<section class="container">
	<div class="row">
		<section class="span8 offset2">
			<div class="well">
				<form action="/contaduria/pagos" class="form-horizontal" method='POST'>
					<legend class='text-center'>Formulario de pago</legend>
					<div class="control-group">
						<label for="matricula" class="control-label">Matricula: </label>
						<div class="controls">
							<input type="text" id='matricula' class='span4' name='matricula' placeholder='Matricula' 
							value="<?php if(isset($alumno_pago)){ echo $alumno_pago['matricula']; }else{echo "";} ?>">
							<button type='submit' name='setAlumno' class='btn btn-link'>Establecer</button>
						</div>
					</div>
					<div class="control-group">
						<label for="nombre" class='control-label'>Nombre</label>
						<div class="controls">
							<input type="text" name='nombre' id='nombre' class='span5' 
							value="<?php if(isset($alumno_pago)){ echo $alumno_pago['nombre'].' '.$alumno_pago['apellidopat'].' '.$alumno_pago['apellidomat']; } ?>" disabled >
						</div>
					</div>
					<div class="control-group">
						<label for="carrera" class='control-label'>Carrera</label>
						<div class="controls">
							<input type="text" id='carrera' name='carrera' class='span5' placeholder='Carrera' disabled values='Hola'>
						</div>
					</div>
					<div class="control-group">
						<label for="descuento" class='control-label'>Descuento</label>
						<div class="controls">
							<input type="text" id='descuento' name='descuento' class='span5' placeholder='Descuento' disabled>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="concepto">Concepto</label>
						<div class="controls">
							<select id="concepto" class='span5' name='concepto'>
								<option value='colegiatura'>Colegiatura</option>
								<option value='inscripcion'>Inscripcion</option>
								<option value='examen extraordinario'>Examen Extraordinario</option>
								<option value='examen a titulo'>Examen a titulo</option>
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