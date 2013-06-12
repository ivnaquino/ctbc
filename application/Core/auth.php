<?php 

class Auth{
	public function __construct(){
	}
	public static function logged_on()
	{
		return isset($_SESSION['matricula']);
	}
	public static function login($matricula ,$password)
	{
		$connection = Connection::conectar();
		$query_session = "SELECT matricula,tipo FROM usuario WHERE matricula = ? AND password = ? LIMIT 1";
		$statement = $connection->prepare($query_session);
		$statement->bind_param('ss',$matricula,$password);
		$statement->execute();
		$statement->store_result();

		if($statement->num_rows == 1){
			$statement->bind_result($_SESSION['matricula'], $_SESSION['tipo']);
			$statement->fetch();

			return true;
		}else{
			return false;
		}
	}
	public static function logout()
	{
		$_SESSION = array();
		if (isset($_COOKIE[session_name()])) {
			setcookie(session_name(),'',time()-300,'/');
		}
		session_destroy();
	}

	public static function usuario()
	{
		if ($_SESSION['tipo'] == 'alumno') {
			return Alumno::buscar($_SESSION['matricula']);
		}
		if ($_SESSION['tipo'] == 'contador') {
			return Administrativo::buscar($_SESSION['matricula']);
		}
		if ($_SESSION['tipo'] == 'operador') {
			return Administrativo::buscar($_SESSION['matricula']);
		}
	}

	public static function cargar_vista()
	{
		global $layout_components;

		if ($_SESSION['tipo'] == 'alumno') {
			require_once $layout_components['ruta_alumno'];
		}
		if ($_SESSION['tipo'] == 'contador') {
			require_once $layout_components['ruta_contador'];
		}
		if ($_SESSION['tipo'] == 'operador') {
			require_once $layout_components['ruta_administrativo'];
		}
	}
	
}

 ?>