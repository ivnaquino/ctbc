<?php  

class adminController extends Controller
{
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		if (!Session::active('usuario')) {
			header("Location: ".BASE_URL."auth/login");
		}
		if (Session::get('tipo') != 'admin') {
			header("Location: ".BASE_URL."");
		}
		if (isset($_POST['desbloquear'])) {
			$user = User::find_by_matricula($_POST['matricula']);
			if ($user) {
				$user->errores = 0;
				$user->estado = 1;
				$user->save();
				$this->_view->confirmacion = array(
					'estado' => true,
					'mensaje' => 'La matricula ha sido desbloqueada correctamente'
					);
			}else{
				$this->_view->confirmacion = array(
					'estado' => true,
					'mensaje' => 'La matricula no ha sido encontrada'
					);
			}
			
		}
		$this->_view->_titulo = "Panel de administracion";
		$this->_view->renderizar('inicio');
	}


	public function addAlumno(){
		if (!Session::active('usuario')) {
			header("Location: ".BASE_URL."auth/login");
		}
		if (Session::get('tipo') != 'admin') {
			header("Location: ".BASE_URL."");
		}
		if (isset($_POST['alumno_registro'])) {
			$_alumno = array(
				'matricula'=>$_POST['matricula'],
				'nombre'=>$_POST['nombre'],
				'apellidopat' => $_POST['apellidopat'],
				'apellidomat' => $_POST['apellidomat'],
				'grupo' => $_POST['grupo']
				);
			$usuario = array(
				'matricula'=>$_POST['matricula'],
				'password'=>$_POST['password'],
				'tipo'=>'alumno',
				'errores' =>0,
				'estado'=>1
				);
			Alumno::create($_alumno);
			User::create($usuario);
			
		}
		$this->_view->grupos = Grupo::all(array('order' => 'nombre,cuatrimestre'));
		$this->_view->_titulo = "Agregar alumno";
		$this->_view->renderizar('addAlumno');
	}


	public function addGrupo(){
		if (!Session::active('usuario')) {
			header("Location: ".BASE_URL."auth/login");
		}
		if (Session::get('tipo') != 'admin') {
			header("Location: ".BASE_URL."");
		}
		if (isset($_POST['grupo_registro'])) {
			$grupo_registro = array('nombre'=>$_POST['nombre'],'cuatrimestre'=>$_POST['cuatrimestre']);
			Grupo::create($grupo_registro);
		}
		$this->_view->_titulo = "Agregar Grupo";
		$this->_view->renderizar('addGrupo');
	}


	public function addAdministrativo(){
		if (!Session::active('usuario')) {
			header("Location: ".BASE_URL."auth/login");
		}
		if (Session::get('tipo') != 'admin') {
			header("Location: ".BASE_URL."");
		}
		if (isset($_POST['addOperador'])) {
			$_adminstrativo = array(
				'matricula'=>$_POST['matricula'],
				'nombre'=>$_POST['nombre'],
				'apellidopat' => $_POST['apellidopat'],
				'apellidomat' => $_POST['apellidomat'],
				);
			$usuario = array(
				'matricula'=>$_POST['matricula'],
				'password'=>$_POST['password'],
				'tipo'=>$_POST['tipo'],
				'errores' =>0,
				'estado'=>1
				);
			Administrativo::create($_adminstrativo);
			User::create($usuario);
		}
		$this->_view->_titulo = "Agregar Administrativo";
		$this->_view->renderizar('addAdministrativo');
	}


	public function addAdministrador(){
		if (!Session::active('usuario')) {
			header("Location: ".BASE_URL."auth/login");
		}
		if (Session::get('tipo') != 'admin') {
			header("Location: ".BASE_URL."");
		}
		if (isset($_POST['addAdmin'])) {
			print_r($_POST);
			$usuario = array(
				'matricula'=>$_POST['matricula'],
				'password'=>$_POST['password'],
				'tipo'=>'admin',
				'errores' =>0,
				'estado'=>1
				);
			User::create($usuario);
		}
		$this->_view->_titulo = "Agregar Administrador";
		$this->_view->renderizar('addAdministrador');
	}


}
?>