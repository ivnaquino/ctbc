<?php  

class View
{
	private $_controller;

	public function __construct(Request $peticion){
		$this->_controller = $peticion->getController();
	}
	public function renderizar($vista,$items = false){
		$routeVista = ROOT.'views'.DS.$this->_controller.DS.$vista.'.php';
		$this->_css =  BASE_URL.'views/'.DEFAULT_LAYOUT.'/css/';
		$this->_js  =  BASE_URL.'views/'.DEFAULT_LAYOUT.'/js/';
		$this->_img =  BASE_URL.'views/'.DEFAULT_LAYOUT.'/img/';

		if (is_readable($routeVista)) {
			include_once ROOT.'views'.DS.DEFAULT_LAYOUT.DS.'header.php';
			include_once $routeVista;
			include_once ROOT.'views'.DS.DEFAULT_LAYOUT.DS.'footer.php';
		}else{
			throw new Exception("Error al procesar la vista, al parecer la vista que has indicado no ha podido ser encontrada", 1);	
		}
	}
}

?>