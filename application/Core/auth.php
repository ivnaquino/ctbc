<?php 
Singleton:

class Auth{
	public function __construct(){
	}
	public static function logged_on()
	{
		return isset($_SESSION['matricula']);
	}
	public static function login($matricula ,$password)
	{
		$datos = array('estado' => false , 'datos' => '' );
		$connection = Connection::conectar();
		$query_session = "SELECT matricula,tipo,errors,estado FROM usuario WHERE matricula = ? AND password = ? LIMIT 1";
		$statement = $connection->prepare($query_session);
		$statement->bind_param('ss',$matricula,$password);
		$statement->execute();
		$statement->store_result();

		if($statement->num_rows == 1){
			$query_success = 'UPDATE usuario set errors = 0 WHERE matricula = ?';
			$statement_succes = $connection->prepare($query_success);
			$statement_succes->bind_param('s',$matricula);
			$statement_succes->execute();
			$statement_succes->store_result();

			$statement->bind_result($matricula,$tipo,$errors,$estado);
			$statement->fetch();

			if ($estado == 1) {
				$_SESSION['matricula'] = $matricula;
				$_SESSION['tipo'] = $tipo;
				$datos['estado'] = true;
				return $datos;
			}else{
				$datos['estado'] = false;
				$datos['datos'] = 'Su matricula esta bloqueada';
				return $datos;
			}
		}else{
			$query_error_set = 'UPDATE usuario set errors = errors+1 WHERE matricula = ? LIMIT 1';
			$statement_error_set = $connection->prepare($query_error_set);
			$statement_error_set->bind_param('s',$matricula);
			$statement_error_set->execute();
			$statement_error_set->store_result();

			$query_error_get = 'SELECT errors,estado FROM usuario WHERE matricula = ? LIMIT 1';
			$statement_error_get = $connection->prepare($query_error_get);
			$statement_error_get->bind_param('s',$matricula);
			$statement_error_get->execute();
			$statement_error_get->store_result();

			if ($statement_error_get->num_rows == 1) {
				$statement_error_get->bind_result($user_errors,$user_estado);
				$statement_error_get->fetch();

				if ($user_errors >= 3) {
					if ($user_errors > 3) {
						$datos['datos'] = 'La matricula '.$matricula.' esta bloqueada';
						return $datos;
					}
					$query_estado_set = 'UPDATE usuario SET estado = 0 WHERE matricula = ? ';
					$statement_estado_set = $connection->prepare($query_estado_set);
					$statement_estado_set->bind_param('s',$matricula);
					$statement_estado_set->execute();
					$statement_estado_set->store_result();

					$datos['datos'] = 'La matricula '.$matricula.' ha sido bloqueada';
					return $datos;
				}
			}else{
				$datos['datos'] = 'Matricula o Contraseña incorrecta';
				return $datos;
			}

			$datos['datos'] = 'Matricula o Contraseña incorrecta';
			return $datos;
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
		if ($_SESSION['tipo'] == 'contaduria') {
			return Administrativo::buscar($_SESSION['matricula']);
		}
		if ($_SESSION['tipo'] == 'becas') {
			return Administrativo::buscar($_SESSION['matricula']);
		}
		if ($_SESSION['tipo'] == 'root') {
			//return Administrativo::buscar($_SESSION['matricula']);
		}
	}

	public static function cargar_vista($vista_actual)
	{

		$tipo_usuario = $_SESSION['tipo'];
		if ($tipo_usuario == $vista_actual) {
			
		}else{
			header('Location: /');
		}
	}
	
}

 ?>