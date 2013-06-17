<?php  
	require_once "paths.php";

	if (!Auth::logged_on()) {
		header('Location: /login');
	}
	Auth::cargar_vista('alumno');

	
	View::renderizar('alumno');
