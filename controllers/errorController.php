<?php  

class errorController extends Controller
{
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		$this->_view->_titulo = "Error";
		$this->_view->renderizar('404');
	}
	public function error404(){
		$this->_view->_titulo = "Error 404";
		$this->_view->renderizar('404');
	}
}

?>