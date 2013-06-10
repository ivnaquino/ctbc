<?php  

/*------------------------------------------------------------------------
* Clase para la conexion a mysql
--------------------------------------------------------------------------*/
class Connection{
	public function __construct(){
	}

	public static function conectar()
	{
		return new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
	}
}
/*------------------------------------------------------------------------
* Clase alumnos, contiene metodos para faciliar la busqueda de datos
--------------------------------------------------------------------------*/
class Alumno{
	public function __construct(){
	}

	public static function buscar($connection,$matricula)
	{
		$alumno = array(
			'nombre' => '',
			'apellidopat' => '',
			'apellidomat' => ''
			);
		$query = 'SELECT nombre,apellidopat,apellidomat FROM alumno WHERE matricula = ? LIMIT 1';
		$statement = $connection->prepare($query);
		$statement->bind_param('s',$matricula);
		$statement->execute();
		$statement->store_result();
		$statement->bind_result($alumno['nombre'],$alumno['apellidopat'],$alumno['apellidomat']);
		$statement->fetch();

		return $alumno;
	}

}
/*------------------------------------------------------------------------
* Clase administrativo, contiene metodos para faciliar la busqueda de datos
--------------------------------------------------------------------------*/
class Administrativo{
	public function __construct()
	{
	}

	public static function buscar($connection,$matricula)
	{
		$administrativo = array(
			'nombre' => '',
			'apellidopat' => '',
			'apellidomat' => ''
			);
		$query = 'SELECT nombre,apellidopat,apellidomat FROM administrativo WHERE matricula = ? LIMIT 1';
		$statement = $connection->prepare($query);
		$statement->bind_param('s',$matricula);
		$statement->execute();
		$statement->strore_result();
		$statement->bind_result($administrativo['nombre'],$administrativo['apellidopat'],$administrativo['apellidomat']);
		$statement->fetch();

		return $administrativo;
	}
}
/*------------------------------------------------------------------------
* Clase Autenticacion de usuarios 
--------------------------------------------------------------------------*/
class Auth{
	public function __construct(){
	}
	public static function logged_on()
	{
		return isset($_SESSION['matricula']);
	}
	public static function login($connection ,$matricula ,$password)
	{
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
	public static function logout(){
		$_SESSION = array();
		if (isset($_COOKIE[session_name()])) {
			setcookie(session_name(),'',time()-300,'/');
		}
		session_destroy();
	}
}

?>