<?php  

class contaduriaController extends Controller
{
	public function __construct(){
		parent::__construct();
		$this->_view->tabs = array("Reporte","Pago");
	}
	public function index(){
		if (!Session::active('usuario')) {
			header("Location: ".BASE_URL."auth/login");
		}
		if (Session::get('tipo') != 'contaduria') {
			header("Location: ".BASE_URL."");
		}
		header("Location: ".BASE_URL."contaduria/pago");
	}
	public function reporte(){
		if (!Session::active('usuario')) {
			header("Location: ".BASE_URL."auth/login");
		}
		if (Session::get('tipo') != 'contaduria') {
			header("Location: ".BASE_URL."");
		}
		$administrativo = Administrativo::find_by_matricula(Session::get('usuario'));
		$this->_view->usuario = $administrativo;

		$this->_view->pagos = Pago::all(array('order' => 'id DESC,fecha DESC'));

		$this->_view->_titulo = "Contaduria - Reporte";
		$this->_view->renderizar('reporte');
	}
	public function pago(){
		if (!Session::active('usuario')) {
			header("Location: ".BASE_URL."auth/login");
		}
		if (Session::get('tipo') != 'contaduria') {
			header("Location: ".BASE_URL."");
		}
		if (isset($_POST['setAlumno'])) {
			$_alum = Alumno::find_by_matricula($_POST['matricula']);
			if (empty($_alum)) {
				$this->_view->_error_get_alumno=array('mensaje'=>'No se ha encontrado la matricula especificada');
				$this->_view->_alumno = false;
				$this->_view->_alumno_grupo = false;
				$this->_view->_alumno_beca = false;
			}else{
				$this->_view->_alumno = $_alum;
				$this->_view->_alumno_grupo = Grupo::find_by_id($_alum->grupo);
				$this->_view->_alumno_beca = Beca::find_by_matricula($_POST['matricula']);
			}
		}else{
			$this->_view->_alumno = false;
			$this->_view->_alumno_grupo = false;
			$this->_view->_alumno_beca = false;
		}
		if (isset($_POST['aceptar'])) {
			$pago_actual = array(
				'matricula' => $_POST['matricula'],
				'fecha' => date('Y-m-d'),
				'concepto' => $_POST['concepto'],
				'recargo' => 0,
				'monto' => $_POST['monto'],
				'estado' => 'pagado'
				);
			Pago::create($pago_actual);
			$this->_view->_mensaje = "Pagado! El pago se ha registrado con exito";
		}
		if (isset($_POST['aplazar'])) {
			$pago_actual = array(
				'matricula' => $_POST['matricula'],
				'fecha' => date('Y-m-d'),
				'concepto' => $_POST['concepto'],
				'recargo' => 0,
				'monto' => $_POST['monto'],
				'estado' => 'aplazado'
				);
			Pago::create($pago_actual);
			$this->_view->_mensaje = "Aplazado! El pago se ha registrado con exito";
		}

		$administrativo = Administrativo::find_by_matricula(Session::get('usuario'));
		$this->_view->usuario = $administrativo;
		$this->_view->_titulo = "Contaduria - Pagos";
		$this->_view->renderizar('pagos');
	}
}

?>