<?php 

class View
{
	public $_params;
	public $parametro;

	public function __construct(){
	}
	public static function renderizar($vista,$item=false,$param_ver=false){
		$ruta_v = ROOT.'views'.DS.'components'.DS.$vista.'.php';
		$_params = $item;
		$parametro = $param_ver;

		$usuario = Auth::usuario();
		global $layout_params;

		if (is_readable($ruta_v)) {
			include_once ROOT.'views'.DS.'layouts'.DS.'header.php';
			include_once ROOT.'views'.DS.'nav'.DS.'nav.php';
			include_once $ruta_v;
			include_once ROOT.'views'.DS.'layouts'.DS.'footer.php';
		}else{
			throw new Exception("Error al procesar la pagina solicitada ", 1);
		}
	}
}



 ?>