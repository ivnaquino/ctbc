<?php 
	require_once "paths.php";
	require_once CORE.'auth.php';

	Auth::logout();

	header('Location: /');
 ?>