<?php  

class adminController extends Controller
{
	public function __construct(){
		parent::__construct();
		$this->_view->tabs = array("Inicio");
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
			if (!empty($user)) {
				$user->errores = 0;
				$user->estado = 1;
				$user->save();
				$this->_view->confirmacion = array(
					'estado' => true,
					'mensaje' => 'La matricula ha sido desbloqueada correctamente'
					);
			}else{
				$this->_view->confirmacion = array(
					'estado' => false,
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

			try {
				Alumno::create($_alumno);
				$this->_view->confirm_create_alumno = array('estado'=>true,'mensaje'=>'El alumno ha sido registrado exitosamente');
			} catch (Exception $e) {
				$alm=Alumno::find_by_matricula($_POST['matricula']);
				if (empty($alm)) {
					$this->_view->confirm_create_alumno = array('estado'=>false,'mensaje'=>'No se ha podido registrar el alumno');
				}else{
					$this->_view->confirm_create_alumno = array('estado'=>false,'mensaje'=>'La matricula ya se encuentra registrada.');
				}
			}
			try {
				$uss = User::find_by_matricula($_POST['matricula']);
				if (empty($uss)) {
					User::create($usuario);
					$this->_view->confirm_create_usuario = array('estado'=>true,'mensaje'=>'El usuario ha sido registrado exitosamente');
				}else{
					$this->_view->confirm_create_usuario = array('estado'=>false,'mensaje'=>'La matricula de usuario ya esta registrada');
				}
				
			} catch (Exception $e) {
				$uss = User::find_by_matricula($_POST['matricula']);
				if (empty($uss)) {
					$this->_view->confirm_create_usuario = array('estado'=>false,'mensaje'=>'No se ha podido registrar el usuario');
				}else{
					$this->_view->confirm_create_usuario = array('estado'=>false,'mensaje'=>'La matricula ya se encuentra registrada.');
				}
			}
			
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
			$_exits_grupo = (Grupo::find(array('conditions'=>array('nombre = ? AND cuatrimestre = ?',$grupo_registro['nombre'],$grupo_registro['cuatrimestre']))));
			if (empty($_exits_grupo)) {
				Grupo::create($grupo_registro);
				$this->_view->_conf_grupo = array('estado'=>true,'mensaje'=>'El grupo se ha registrado correctamente');
			}else{
				$this->_view->_conf_grupo = array('estado'=>false,'mensaje'=>'El grupo ya existe');
			}
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
			$_usuario = array(
				'matricula'=>$_POST['matricula'],
				'password'=>$_POST['password'],
				'tipo'=>$_POST['tipo'],
				'errores' =>0,
				'estado'=>1
				);
			$adminis = Administrativo::find_by_matricula($_POST['matricula']);
			if (empty($adminis)) {
				try {
					Administrativo::create($_adminstrativo);
					try {
						User::create($_usuario);
						$this->_view->confirm_create_administrativo = array('estado'=>true,'mensaje'=>'El Administrativo registrado exitosamente');
						$this->_view->confirm_create_usuario = array('estado'=>true,'mensaje'=>'El Usuario se ha registrado exitosamente');
					} catch (Exception $e2) {
						//Remover administrativo
						$administ = Administrativo::find_by_matricula($_POST['matricula']);
						$administ->delete();
						$this->_view->confirm_create_administrativo = array('estado'=>false,'mensaje'=>'El Administrativo no se ha pidido registrar');
						$this->_view->confirm_create_usuario = array('estado'=>false,'mensaje'=>'El Usuario no se ha pidido registrar');
					}
				} catch (Exception $e) {
					echo $e->getMessage();
					$this->_view->confirm_create_administrativo = array('estado'=>false,'mensaje'=>'El Administrativo no se ha pidido registrar');
					$this->_view->confirm_create_usuario = array('estado'=>false,'mensaje'=>'El Usuario no se ha pidido registrar');
				}
			}else{
				$this->_view->confirm_create_administrativo = array('estado'=>false,'mensaje'=>'El Administrativo ya se encuentra registrado');
					$this->_view->confirm_create_usuario = array('estado'=>false,'mensaje'=>'El Usuario ya se encuentra registrado');
			}

			//Administrativo::create($_adminstrativo);
			//User::create($usuario);
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
			$usuario = array(
				'matricula'=>$_POST['matricula'],
				'password'=>$_POST['password'],
				'tipo'=>'admin',
				'errores' =>0,
				'estado'=>1
				);
			
			$comprobar_usuario = User::find_by_matricula($_POST['matricula']);
			if (empty($comprobar_usuario)) {
				try {
					User::create($usuario);
					$this->_view->confirm_create_usuario = array('estado'=>true,'mensaje'=>'El Usuario se ha registrado exitosamente');
				} catch (Exception $e) {
					$this->_view->confirm_create_usuario = array('estado'=>false,'mensaje'=>'El Usuario no se ha podido registrar');
				}
			}else{
				$this->_view->confirm_create_usuario = array('estado'=>false,'mensaje'=>'El Usuario ya se encuentra registrado');
			}
		}
		$this->_view->_titulo = "Agregar Administrador";
		$this->_view->renderizar('addAdministrador');
	}
	public function inicio(){
		header('Location: '.BASE_URL.'admin');
	}

}
?>