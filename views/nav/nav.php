<div class="navbar">
	<div class="navbar-inner">
		<div class="container" style="width: auto;">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a class="brand" href="#"><?php echo $usuario['nombre'].' '.$usuario['apellidopat'].' '.$usuario['apellidomat']; ?></a>
			<div class="nav-collapse">
				<ul class="nav">
					<?php if($_params){ ?>
						<?php foreach ($_params as $tab): ?>
							<li><a href="/<?php echo $_SESSION['tipo']; ?>/<?php echo $tab ?>"><?php echo $tab; ?></a></li>
						<?php endforeach ?>
					<?php  } ?>
				</ul>
				<ul class="nav pull-right">
					<li><a href="/logout">Cerrar sesion</a></li>
				</ul>
			</div><!-- /.nav-collapse -->
		</div>
	</div><!-- /navbar-inner -->
</div>