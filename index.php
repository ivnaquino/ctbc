<?php 
	require_once "paths.php";

	if (!Auth::logged_on()) {
		header('Location: /login');
	}
	$usuario = Auth::usuario();
	require_once $layout_components['ruta_header'];
	require_once $layout_components['ruta_nav'];

		
		if ($_SESSION['tipo'] == 'contaduria') {
			header('Location: /contaduria/');
		}
		if ($_SESSION['tipo'] == 'alumno') {
			header('Location: /alumno');
		}
		if ($_SESSION['tipo'] == 'becas') {
			header('Location: /becas/');
		}
		if ($_SESSION['tipo'] == 'admin') {
			header('Location: /admin');
		}
?>


<?php
	require_once $layout_components['ruta_footer']; 
?>