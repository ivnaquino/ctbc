<?php  

class authController extends Controller
{
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		
		//$this->_view->_titulo = "Home";
		//$this->_view->renderizar('home');
	}
	public function login(){
		if (Session::active('usuario')) {
			header("Location: ".BASE_URL."");
		}
		if (isset($_POST['submit'])) {
			$matricula = $_POST['matricula'];
			$password = $_POST['password'];
			$error_login = User::entrar($matricula, $password);
		}
		$this->_view->_titulo = "Inicio de sesion";
		if (isset($error_login)) {
			$this->_view->_error_login = $error_login;
		}
		$this->_view->renderizar('login');
	}
	public function logout(){
		Session::destroy();
		header("Location: ".BASE_URL."auth/login");
	}
}

?>