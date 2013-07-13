<?php  

class alumnoController extends Controller
{
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		if (!Session::active('usuario')) {
			header("Location: ".BASE_URL."auth/login");
		}
		if (Session::get('tipo') != 'alumno') {
			header("Location: ".BASE_URL."");
		}
		$alumno = Alumno::find_by_matricula(Session::get('usuario'));
		$this->_view->_titulo = "Alumno".$alumno->matricula;
		$this->_view->usuario = $alumno;
		$this->_view->beca = Beca::find_by_matricula($alumno->matricula);
		$this->_view->pagos = Pago::all(array('conditions' => array('matricula = ? ORDER BY id DESC', $alumno->matricula)));
		$this->_view->renderizar('alumno');
	}
	public function estudiosocioeconomico(){
		if (!Session::active('usuario')) {
			header("Location: ".BASE_URL."auth/login");
		}
		if (Session::get('tipo') != 'alumno') {
			header("Location: ".BASE_URL."");
		}
		$alumno = Alumno::find_by_matricula(Session::get('usuario'));
		$this->_view->_titulo = "Alumno".$alumno->matricula;
		$this->_view->usuario = $alumno;
		$beca = Beca::find_by_matricula($alumno->matricula);
		if ($beca) {
			header("Location: ".BASE_URL."alumno");
		}
		$this->_view->renderizar('estudiosocioeconomico');
	}
}

?>