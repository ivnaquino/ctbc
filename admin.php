<?php  
	require_once "paths.php";
	require_once CORE.'rootprocess.php';
	

	if (!Auth::logged_on()) {
		header('Location: /login');
	}
	Auth::cargar_vista('admin');

	View::renderizar('admin');

?>