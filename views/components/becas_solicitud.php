<section class="container" id="contenedor">
	<div class="row">
		<section class="span8 offset2">
			<div class="well">
				<form action="/becas/solicitudes/" class="form-horizontal" method='POST'>
					<legend class='text-center'>Solicitud de beca</legend>
					<div class="control-group">
						<label for="matricula" class='control-label'>Matricula: </label>
						<div class="controls">
							<input type="text" id='matricula' class="span5" name='matricula' placeholder='Matricula'>
						</div>
					</div>
					<div class="control-group">
						<label for="descuento" class="control-label">Descuento: </label>
						<div class="controls">
							<div class="input-prepend input-append">
								<span class="add-on">$</span>
								<input class="span4" id="descuento" type="text" name="descuento">
								<span class="add-on">.00</span>
							</div>
						</div>
					</div>
					<div class="form-actions">
						<button type="submit" class="btn btn-primary" name="">Registrar</button>
					</div>
				</form>
			</div>
		</section>
	</div>
</section>