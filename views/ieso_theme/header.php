<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title><?php if(isset($this->_titulo)){ echo $this->_titulo; }else{ echo APP_NAME; } ?></title>
	<link rel="stylesheet" href="<?php echo $this->_css; ?>bootstrap.css">
	<link rel="stylesheet" href="<?php echo $this->_css; ?>bootstrap-responsive.css">
	<link rel="stylesheet" href="<?php echo $this->_css; ?>base.css">
	<script src="<?php echo $this->_js; ?>jquery.js"></script>
	<script src="<?php echo $this->_js; ?>modernizr.js"></script>
</head>
<body>
<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<nav>
			<section class="container">
				<ul class="nav">
					
					<li>
						<a href="<?php echo BASE_URL.Session::get('tipo'); ?>">
							<strong>
								<?php if (isset($this->usuario)): ?>
									<?php echo $this->usuario->nombre." ".$this->usuario->apellidopat." ".$this->usuario->apellidomat; ?>
								<?php endif ?>
							</strong>
						</a>
					</li>
					<?php if (isset($this->tabs)): ?>
						<?php foreach ($this->tabs as $tab): ?>
							<li>
								<a href="<?php echo BASE_URL.Session::get('tipo').'/'.$tab; ?>"><?php echo $tab; ?></a>
							</li>
						<?php endforeach ?>
					<?php endif ?>
				</ul>
				<ul class="nav pull-right">
					<?php if (Session::active("usuario")): ?>
						<li><a href="<?php echo BASE_URL; ?>auth/logout">Cerrar sesion</a></li>
					<?php endif ?>
				</ul>
			</section>
		</nav>
	</div>
</div>