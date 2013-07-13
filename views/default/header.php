<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title><?php if(isset($this->_titulo)){ echo $this->_titulo; }else{ echo APP_NAME; } ?></title>
	<link rel="stylesheet" href="<?php echo $this->_css; ?>bootstrap.css">
	<link rel="stylesheet" href="<?php echo $this->_css; ?>bootstrap-responsive.css">
	<link rel="stylesheet" href="<?php echo $this->_css; ?>base.css">
	<script src="<?php echo $this->_js; ?>jquery.js"></script>
</head>
<body>
<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<nav>
			<section class="container">
				<ul class="nav">
					<li><a href="#"><strong><?php echo APP_NAME; ?></strong></a></li>
					<li><a href="<?php echo BASE_URL; ?>"> Inicio </a></li>
				</ul>
			</section>
		</nav>
	</div>
</div>