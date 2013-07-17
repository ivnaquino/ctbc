<?php
		define("DS", DIRECTORY_SEPARATOR);
		define("ROOT", realpath(dirname(__FILE__)).DS);
		define("APP_PATH", ROOT.'application'.DS);
		define("LIBS_PATH", ROOT.'libs'.DS);

		require_once APP_PATH."Config.php";

	if (isset($_POST['install'])) {
		$usuario = $_POST['matricula'];
		$password = $_POST['password'];
		$database = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
		$query_administrativo="CREATE TABLE `administrativo` (
							  `matricula` varchar(30) NOT NULL,
							  `nombre` varchar(128) DEFAULT NULL,
							  `apellidopat` varchar(128) DEFAULT NULL,
							  `apellidomat` varchar(128) DEFAULT NULL,
							  `direccion` varchar(45) DEFAULT NULL,
							  `email` varchar(45) DEFAULT NULL,
							  PRIMARY KEY (`matricula`)
							) ENGINE=InnoDB DEFAULT CHARSET=latin1";
		$query_alumno = "CREATE TABLE `alumno` (
						  `matricula` varchar(30) NOT NULL,
						  `nombre` varchar(128) DEFAULT NULL,
						  `apellidopat` varchar(128) DEFAULT NULL,
						  `apellidomat` varchar(128) DEFAULT NULL,
						  `grupo` int(11) DEFAULT NULL,
						  `direccion` varchar(128) DEFAULT NULL,
						  `fechanacimiento` varchar(45) DEFAULT NULL,
						  `email` varchar(45) DEFAULT NULL,
						  `estado` varchar(1) DEFAULT NULL,
						  PRIMARY KEY (`matricula`)
						) ENGINE=InnoDB DEFAULT CHARSET=latin1";
		$query_becas = "CREATE TABLE `becas` (
						  `id` int(11) NOT NULL AUTO_INCREMENT,
						  `matricula` varchar(30) DEFAULT NULL,
						  `estado` tinyint(1) DEFAULT NULL,
						  `descuento` decimal(10,2) DEFAULT NULL,
						  PRIMARY KEY (`id`)
						) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1";
		$query_cont_concepto_1 = "CREATE TABLE `cont_concepto` (
									  `id` int(11) NOT NULL AUTO_INCREMENT,
									  `concepto` varchar(128) DEFAULT NULL,
									  `monto` decimal(10,2) DEFAULT NULL,
									  PRIMARY KEY (`id`)
									) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1";
		$query_cont_concepto_2 = "INSERT INTO `cont_concepto` VALUES (1,'colegiatura',3050.00),(2,'inscripcion',3200.00);";
		$query_grupo = "CREATE TABLE `grupo` (
						  `id` int(11) NOT NULL AUTO_INCREMENT,
						  `nombre` varchar(128) DEFAULT NULL,
						  `cuatrimestre` int(11) DEFAULT NULL,
						  PRIMARY KEY (`id`)
						) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1";
		$query_pagos = "CREATE TABLE `pagos` (
						  `id` int(11) NOT NULL AUTO_INCREMENT,
						  `matricula` varchar(30) DEFAULT NULL,
						  `fecha` date DEFAULT NULL,
						  `concepto` varchar(30) DEFAULT NULL,
						  `recargo` decimal(10,2) DEFAULT NULL,
						  `monto` decimal(10,2) DEFAULT NULL,
						  `estado` varchar(15) DEFAULT NULL,
						  PRIMARY KEY (`id`)
						) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1";
		$query_usuario = "CREATE TABLE `usuario` (
							  `id` int(11) NOT NULL AUTO_INCREMENT,
							  `matricula` varchar(30) DEFAULT NULL,
							  `password` varchar(256) DEFAULT NULL,
							  `tipo` varchar(45) DEFAULT NULL,
							  `errores` int(11) DEFAULT NULL,
							  `estado` tinyint(1) DEFAULT NULL,
							  PRIMARY KEY (`id`)
							) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1";
		$database->query($query_administrativo);
		$database->query($query_alumno);
		$database->query($query_becas);
		$database->query($query_cont_concepto_1);
		$database->query($query_cont_concepto_2);
		$database->query($query_grupo);
		$database->query($query_pagos);
		$database->query($query_usuario);
		$database->query("INSERT INTO usuario(matricula,password,tipo,errores,estado) VALUES('$usuario','$password','admin',0,1)");
		$mensaje = "Las tablas se han instalado correctamente, su usuario se ha creado correctamente";
	}

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Intalacion del sistema de gestion de becas y contaduria</title>
	<link rel="stylesheet" href="views/ieso_theme/css/bootstrap.css">
	<link rel="stylesheet" href="views/ieso_theme/css/bootstrap-responsive.css">
	<style>
		body{
			margin-top: 20px;
		}
	</style>
</head>
<body>
	<section class="container">
		<div class="row">
			<div class="span6 offset3">
				<div class="well">
					<?php if (isset($_POST['install'])): ?>
						<div class="alert alert-success">
							<a class="close" data-dismiss="alert">&times;</a>
							<strong>Correcto!</strong> <?php echo $mensaje; ?>
							<blockquote cite="<?php echo BASE_URL; ?>">
								<p>Su sistema esta listo para ser usado </p>
								<p>Por seguridad debe borrar este archivo install.php de la raiz del sitio.</p>
								<p>Ir a: <a href="<?php echo BASE_URL; ?>">Inicio</a></p>
							</blockquote>
						</div>
					<?php else: ?>
					<form method="POST" action="install.php" class="form-horizontal">
						<legend class="text-center">Ingrese usuario administrador</legend>
						<div class="control-group">
							<label for="matricula" class="control-label">Matricula: </label>
							<div class="controls">
								<input type="text" name="matricula" id="matricula" placeholder="Matricula">
							</div>
						</div>
						<div class="control-group">
							<label for="password" class="control-label">Contraseña: </label>
							<div class="controls">
								<input type="password" id="password" placeholder="Contraseña" name="password">
							</div>
						</div>
						<div class="form-actions">
							<button class="btn btn-primary" name="install">Aceptar</button>
						</div>
					</form>
					<?php endif ?>
				</div>
			</div>
		</div>
	</section>
</body>
</html>