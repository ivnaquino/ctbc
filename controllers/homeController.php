<?php  

class homeController extends Controller
{
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		if (!Session::active('usuario')) {
			header("Location: ".BASE_URL."auth/login");
		}
		if (Session::get('tipo') == 'alumno') {
			header("Location: ".BASE_URL."alumno");
		}
		if (Session::get('tipo') == 'contaduria') {
			header("Location: ".BASE_URL."contaduria");
		}
		if (Session::get('tipo') == 'becas') {
			header("Location: ".BASE_URL."becas");
		}
		if (Session::get('tipo') == 'admin') {
			header("Location: ".BASE_URL."admin");
		}
	}
}

?>