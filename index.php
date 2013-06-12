<?php 
	require_once "paths.php";
	require_once APP_PATH.'database.php';
	require_once CORE.'connection.php';
	require_once CORE.'auth.php';
	require_once CORE.'alumno.php';
	require_once CORE.'administrativo.php';
	require_once APP_PATH.'layout.php';

	if (!Auth::logged_on()) {
		header('Location: /login');
	}
	$usuario = Auth::usuario();
	require_once $layout_components['ruta_header'];
	require_once $layout_components['ruta_nav'];

	Auth::cargar_vista();
?>


<?php
	require_once $layout_components['ruta_footer']; 
?>