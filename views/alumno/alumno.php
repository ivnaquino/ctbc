<section class="container">
	<div class="row">
		<section id="dashbord">
			<div class="span6 offset6">

				&nbsp;&nbsp; <span>Beca: </span> &nbsp;&nbsp;
				<?php if ($this->beca): ?>
					<?php if ($this->beca->estado == 1): ?>
						<span class="label label-success">&nbsp;&nbsp;Activo&nbsp;&nbsp;</span>
					<?php else: ?>
						<span class="label label-info">&nbsp;&nbsp;Inactivo&nbsp;&nbsp;</span>
					<?php endif ?>
				<?php else: ?>
					<span class="label label-success">&nbsp;&nbsp;<a href="<?php echo BASE_URL ?>alumno/estudiosocioeconomico">Sin asignar</a>&nbsp;&nbsp;</span>
				<?php endif ?>
				&nbsp;&nbsp;<span class="label label-info">&nbsp;&nbsp;Sesion iniciada&nbsp;&nbsp;</span> 
			</div>
		</section>
	</div>
</section>
<section class="container">
	<div class="row">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Fecha</th>
					<th>Concepto</th>
					<th>Recargo</th>
					<th>Monto</th>
					<th>Estado</th>
				</tr>
			</thead>
			<tbody>
				<?php if (isset($this->pagos)): ?>
					<?php foreach ($this->pagos as $pago): ?>
						<tr>
							<td>
								<?php 
									$date = date_create($pago->fecha);  
									echo date_format($date, 'd / m / Y');
								?>
							</td>
							<td><?php echo $pago->concepto; ?></td>
							<td><?php echo $pago->recargo; ?></td>
							<td><?php echo $pago->monto; ?></td>
							<td><?php echo $pago->estado; ?></td>
						</tr>
					<?php endforeach ?>
				<?php endif ?>
			</tbody>
		</table>
	</div>
</section>