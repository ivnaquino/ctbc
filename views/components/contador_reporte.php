<?php $pagos=Pago::all(); ?>
<section class="container" id="reporte-pagos">
	<div class="row">
		<section class="span8 offset2" id="tabla-pagos">
			<table class='table table-striped'>
				<thead>
					<tr>
						<th>Matricula</th>
						<th>Fecha</th>
						<th>Concepto</th>
						<th>Recargo</th>
						<th>Monto</th>
						<th>estado</th>
					</tr>
				</thead>
				<tbody>
					<?php if ($pagos): ?>
						<?php foreach ($pagos as $pago): ?>
							<tr>
								<td><?php echo $pago['matricula']; ?></td>
								<td><?php $date = date_create($pago['fecha']);  echo date_format($date, 'd/m/Y'); ?></td>
								<td><?php echo $pago['concepto']; ?></td>
								<td>$ <?php echo $pago['recargo']; ?></td>
								<td>$ <?php echo $pago['monto']; ?></td>
								<td><?php echo $pago['estado']; ?></td>
							</tr>
						<?php endforeach ?>
					<?php else: ?>
						<tr><td>No hay pagos</td></tr>
					<?php endif ?>
				</tbody>
			</table>
		</section>
	</div>
</section>