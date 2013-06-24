<?php 
	session_start();
	
	define('SERVIDOR', 'http://'.$_SERVER['SERVER_NAME']);
	define('DS', DIRECTORY_SEPARATOR);
	define('ROOT', realpath(dirname(__FILE__)).DS);
	define('APP_PATH', ROOT.'application'.DS);
	define('PUBLICO', ROOT.'public'.DS);
	define('VISTAS', ROOT.'views'.DS);
	define('CORE', APP_PATH.'Core'.DS);
	
	require_once APP_PATH.'database.php';
	require_once APP_PATH.'layout.php';
	require_once APP_PATH.'View.php';
	require_once CORE.'connection.php';
	require_once CORE.'auth.php';
	require_once CORE.'alumno.php';
	require_once CORE.'administrativo.php';
	require_once CORE.'pago.php';
	require_once CORE.'beca.php';
	require_once CORE.'grupo.php';

?>