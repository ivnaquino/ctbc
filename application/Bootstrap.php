<?php  

class Bootstrap
{
	public static function run(Request $peticion){
		$controller = $peticion->getController().'Controller';
		$method = $peticion->getMethod();
		$args = $peticion->getArgs();

		$routeController = ROOT.'controllers'.DS.$controller.'.php';

		if (is_readable($routeController)) {
			require_once $routeController;
			$controller = new $controller;

			if (is_callable(array($controller,$method))) {
				$method = $method;
			}else{
				$method = DEFAULT_METHOD;
			}
			if (isset($args)) {
				call_user_func_array(array($controller,$method),$args);
			}else{
				call_user_func(array($controller,$method));
			}
		}else{
			throw new Exception("Error al procesar la peticion", 1);
		}
	}
}

?>