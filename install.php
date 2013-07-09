<?php 
	require_once "paths.php";
	require_once APP_PATH.'database.php';
	require_once CORE.'connection.php';
	require_once CORE.'auth.php';
	require_once CORE.'alumno.php';
	require_once CORE.'administrativo.php';
	require_once APP_PATH.'layout.php';

	function create_tables(){
		$query_adminsitrativo = "CREATE TABLE IF NOT EXISTS administrativo(
			matricula VARCHAR(30) NOT NULL PRIMARY KEY,
			nombre VARCHAR(128),
			apellidopat VARCHAR(128),
			apellidomat VARCHAR(128),
			direccion VARCHAR(45),
			email VARCHAR(45)
			)";
		$query_alumno = "CREATE TABLE IF NOT EXISTS alumno(
			matricula VARCHAR(30) NOT NULL PRIMARY KEY,
			nombre VARCHAR(128),
			apellidopat VARCHAR(128),
			apellidomat VARCHAR(128),
			grupo INT,
			direccion VARCHAR(45),
			fechanacimiento VARCHAR(45),
			email VARCHAR(45),
			estado VARCHAR(1)
			)";
		$query_becas = "";
		$query_cont_concepto = "";
		$query_grupo = "";
		$query_pagos = "";
		$query_usuario = "";
	}

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