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
						<?php if ($this->becas): ?>
							<?php foreach ($this->becas as $beca): ?>
							<?php 
								$_alumno = Alumno::find_by_matricula($beca->matricula);
								$_grupo = Grupo::find_by_id($_alumno->grupo); 
							?>
								<tr>
									<td><?php echo $beca->matricula; ?></td>
									<td><?php echo $_alumno->nombre." ".$_alumno->apellidopat." ".$_alumno->apellidomat; ?></td>
									<td><?php echo $_grupo->nombre; ?></td>
									<td><?php echo $_grupo->cuatrimestre; ?></td>
									<td>
										<?php if($beca->estado == 1){ echo "Activo"; }else{echo "Inactivo";} ?>
									</td>
									<td><?php echo $beca->descuento; ?></td>
									<td><a href="<?php echo BASE_URL.Session::get('tipo').'/detalles/'.$beca->matricula; ?>" class='btn'>Ver</a></td>
								</tr>
							<?php endforeach ?>
						<?php endif ?>
					</tbody>
				</table>
			</div>
		</section>
	</div>
</section>