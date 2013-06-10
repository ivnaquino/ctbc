<?php 
	require_once "paths.php";
	require_once APP_PATH.'database.php';
	require_once APP_PATH.'core.php';
	require_once APP_PATH.'layout.php';

	$connection = Connection::conectar();

	require_once $layout_components['ruta_header'];
	
	
?>


<?php require_once $layout_components['ruta_footer']; ?>