<?php  

class becasController extends Controller
{
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		if (!Session::active('usuario')) {
			header("Location: ".BASE_URL."auth/login");
		}
		if (Session::get('tipo') != 'becas') {
			header("Location: ".BASE_URL."");
		}
		$administrativo = Administrativo::find_by_matricula(Session::get('usuario'));
		$this->_view->tabs = array("inicio","solicitudes");
		$this->_view->usuario = $administrativo;
		$this->_view->becas = Beca::all();
		$this->_view->_titulo = "Becas - Inicio";
		$this->_view->renderizar('inicio');
	}
	public function solicitudes(){
		if (!Session::active('usuario')) {
			header("Location: ".BASE_URL."auth/login");
		}
		if (Session::get('tipo') != 'becas') {
			header("Location: ".BASE_URL."");
		}
		if (isset($_POST['registrar'])) {
			$_temp_beca = Beca::find_by_matricula($_POST['matricula']);
			if ($_temp_beca) {
				$this->_view->mensaje = array(
					'estado' =>false,
					'mensaje' => "El usuario ya posee una beca asociada"
					);
			}else{
				Beca::create(array(
					'matricula' => $_POST['matricula'],
					'estado' => 1,
					'descuento' => $_POST['descuento']
				));
				$this->_view->mensaje = array(
					'estado' =>true,
					'mensaje' => "Se ha registrado correctamente la beca"
					);
			}
			
		}
		$administrativo = Administrativo::find_by_matricula(Session::get('usuario'));
		$this->_view->tabs = array("inicio","solicitudes");
		$this->_view->usuario = $administrativo;
		$this->_view->becas = Beca::all();
		$this->_view->_titulo = "Becas - Solicitud";
		$this->_view->renderizar('solicitudes');
	}
	public function detalles($matricula){
		if (!Session::active('usuario')) {
			header("Location: ".BASE_URL."auth/login");
		}
		if (Session::get('tipo') != 'becas') {
			header("Location: ".BASE_URL."");
		}
		if (isset($_POST['inhabilitar'])) {
			$_temp_beca = Beca::find_by_matricula($_POST['matricula']);
			$_temp_beca->estado = 0;
			$_temp_beca->save();
		}
		if (isset($_POST['habilitar'])) {
			$_temp_beca = Beca::find_by_matricula($_POST['matricula']);
			$_temp_beca->estado = 1;
			$_temp_beca->save();
		}
		if (isset($_POST['eliminar-step2'])) {
			$_temp_beca = Beca::find_by_matricula($_POST['matricula']);
			$_temp_beca->estado = 1;
			$_temp_beca->delete();
			header("Location: ".BASE_URL."/becas");
		}
		$alumno = Alumno::find_by_matricula($matricula);
		$administrativo = Administrativo::find_by_matricula(Session::get('usuario'));
		$this->_view->tabs = array("inicio","solicitudes");
		$this->_view->usuario = $administrativo;
		$this->_view->_alumno = $alumno;
		$this->_view->_grupo  = Grupo::find_by_id($alumno->grupo);
		$this->_view->_beca	  = Beca::find_by_matricula($matricula);
		$this->_view->_titulo = "Detalles - ".$matricula;
		$this->_view->renderizar('detalles');
	}
	public function inicio(){
		header("Location: ".BASE_URL."becas");
	}
}

?>