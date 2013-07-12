<?php 
	require_once "paths.php";
	require_once APP_PATH.'database.php';
	require_once CORE.'connection.php';
	require_once CORE.'auth.php';
	require_once CORE.'alumno.php';
	require_once CORE.'administrativo.php';
	require_once APP_PATH.'layout.php';

	function create_tables(){
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
							  `errors` int(11) DEFAULT NULL,
							  `estado` tinyint(1) DEFAULT NULL,
							  PRIMARY KEY (`id`)
							) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1";
		$database = Connection::conectar();
		$result_administrativo = $database->query($query_administrativo);
		$result_alumno = $database->query($query_alumno);
		$result_becas = $database->query($query_becas);
		$result_cont_concepto_1 = $database->query($query_cont_concepto_1);
		$result_cont_concepto_2 = $database->query($query_cont_concepto_2);
		$result_grupo = $database->query($query_grupo);
		$result_pagos = $database->query($query_pagos);
		$result_usuario = $database->query($query_usuario);
		$database->close();
		echo '
		<div class="container alert alert-success">
			<a class="close" data-dismiss="alert">&times;</a>
			<strong>Correcto !</strong> Las tablas se han creado correctamente
		</div>
		';
	}
	create_tables();

?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Instalacion del sistema de gestion de becas y contabilidad</title>
	<link rel="stylesheet" href="<?php echo $layout_params['ruta_css'] ?>bootstrap.css">
	<link rel="stylesheet" href="<?php echo $layout_params['ruta_css'] ?>bootstrap-responsive.css">
	<link rel="stylesheet" href="<?php echo $layout_params['ruta_css'] ?>base.css">
	<script src="<?php echo $layout_params['ruta_js'] ?>jquery.js"></script>

<body>

</body>
</html>