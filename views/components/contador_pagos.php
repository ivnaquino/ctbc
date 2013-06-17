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
	$pago_error = Pago::pagar($pago_actual);
	echo $pago_error;
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
							<input type="text" id='matricula' class='span5' name='matricula' placeholder='Matricula'>
						</div>
					</div>
					<div class="control-group">
						<label for="nombre" class='control-label'>Nombre</label>
						<div class="controls">
							<input type="text" name='nombre' id='nombre' class='span5' placeholder='Nombre' disabled >
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
					</div>
				</form>
			</div>
		</section>
	</div>
</section>