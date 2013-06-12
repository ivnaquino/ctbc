<?php 
	session_start();
	
	define('SERVIDOR', 'http://'.$_SERVER['SERVER_NAME']);
	define('DS', DIRECTORY_SEPARATOR);
	define('ROOT', realpath(dirname(__FILE__)).DS);
	define('APP_PATH', ROOT.'application'.DS);
	define('PUBLICO', ROOT.'public'.DS);
	define('VISTAS', ROOT.'views'.DS);
	define('CORE', APP_PATH.'Core'.DS);


?>