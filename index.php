<?php  
	define("DS", DIRECTORY_SEPARATOR);
	define("ROOT", realpath(dirname(__FILE__)).DS);
	define("APP_PATH", ROOT.'application'.DS);
	define("LIBS_PATH", ROOT.'libs'.DS);

	require_once APP_PATH."Config.php";
	require_once APP_PATH."Request.php";
	require_once APP_PATH."Bootstrap.php";
	require_once APP_PATH."Controller.php";
	require_once APP_PATH."Registro.php";
	require_once APP_PATH."View.php";
	require_once APP_PATH."Session.php";
	require_once LIBS_PATH."php-activerecord".DS."ActiveRecord.php";

	Session::init();

	 ActiveRecord\Config::initialize(function($cfg){
	    $cfg->set_model_directory('models');
	    $cfg->set_connections(array(
	         'development' => 'mysql://'.DB_USER.':'.DB_PASS.'@'.DB_HOST.'/'.DB_NAME.''));
	 });

	try{
		Bootstrap::run(new Request);
	}catch(Exception $e){
		echo $e->getMessage();
		//header("Location: ".BASE_URL."error/error404");
	}

?>