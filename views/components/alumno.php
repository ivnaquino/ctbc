
<?php $pago_alumno = Pago::alumno($usuario['matricula']); ?>
<?php $beca_alumno = Beca::alumno($usuario['matricula']);?>


<section class="container">
	<div class="row">
		<section class="span7"></section>
		<section class="span5 status">
			<strong>Estado de la beca </strong> 
			<?php if (isset($beca_alumno)): ?>
				<?php if ($beca_alumno['estado']==1): ?>
					<span class="label label-success">&nbsp;&nbsp;Activo&nbsp;&nbsp;</span>
				<?php else: ?>
					<span class="label label-error">&nbsp;&nbsp; <a href="/estudiosocioeconomico">Inactivo</a> &nbsp;&nbsp;</span>
				<?php endif ?>
			<?php else: ?>
				<span class="label label-error">&nbsp;&nbsp;No asignada&nbsp;&nbsp;</span>
			<?php endif ?>
			
			<span class="label label-info">&nbsp;&nbsp;Sesion iniciada&nbsp;&nbsp;</span>
		</section>
	</div><br>
	<div class="row">
		<div class="container">
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
				<?php if (isset($pago_alumno)): ?>
					<?php foreach ($pago_alumno as $pago): ?>
						<tr>
							<td>
								<?php 
									$date = date_create($pago['fecha']);  
									echo date_format($date, 'd / m / Y');
								?>
							</td>
							<td><?php echo $pago['concepto']?></td>
							<td><?php echo $pago['recargo']?></td>
							<td>$ <?php echo $pago['monto']?></td>
							<td><?php echo $pago['estado']?></td>
						</tr>
					<?php endforeach ?>
				<?php endif ?>
			</tbody>
		</table>
		</div>
	</div>
</section>
