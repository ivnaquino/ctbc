<?php  

 $becados = Beca::all();

?>

<section class="container">
	<div class="row">
		<section class="span8 offset2">
			<div class="well">
				<table class='table table-striped'>
					<thead>
						<tr>
							<th>Matricula</th>
							<th>Nombre</th>
							<th>Grupo</th>
							<th>Cuatrimestre</th>
							<th>Estado</th>
							<th>Descuento</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php if ($becados): ?>
							<?php foreach ($becados as $becado): ?>
								<tr>
									<td><?php echo $becado['matricula']; ?></td>
									<td><?php echo $becado['nombre']; ?></td>
									<td><?php echo $becado['grupo']; ?></td>
									<td><?php echo $becado['cuatrimestre']; ?></td>
									<td>
										<?php if($becado['beca_estado'] == 1){ echo "Activo"; }else{echo "Inactivo";} ?>
									</td>
									<td><?php echo $becado['beca_descuento']; ?></td>
									<td><a href="/becas/ver/<?php echo $becado['matricula']; ?>" class='btn'>Ver</a></td>
								</tr>
							<?php endforeach ?>
						<?php endif ?>
					</tbody>
				</table>
			</div>
		</section>
	</div>
</section>