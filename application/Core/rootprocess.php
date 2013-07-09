<?php  

class Registrar
{
	function __construct(){}

	public static function grupo($grupo){
		$connection = Connection::conectar();
		$query = 'INSERT INTO grupo(nombre,cuatrimestre) values (?,?)';
		$statement = $connection->prepare($query);
		$statement->bind_param('ss',$grupo['nombre'],$grupo['cuatrimestre']);
		$statement->execute();
		$statement->store_result();
		echo $statement->affected_rows;
	}
	public static function alumno($alumno){
		$connection = Connection::conectar();
		$query = "INSERT INTO alumno(matricula,nombre,apellidopat,apellidomat,grupo) VALUES(?,?,?,?,?)";
		$statement= $connection->prepare($query);
		$statement->bind_param('sssss',$alumno['matricula'],$alumno['nombre'],$alumno['apellidopat'],$alumno['apellidomat'],$alumno['grupo']);
		$statement->execute();
		$statement->store_result();
		
		$tipo_user="alumno";
		$estado_user = 1;
		$errors_user = 0;
		$query_user = "INSERT INTO usuario(matricula,password,tipo,errors,estado) VALUES (?,?,?,?,?)";
		$statement_user = $connection->prepare($query_user);
		$statement_user->bind_param('sssii',$alumno['matricula'],$alumno['password'],$tipo_user,$errors_user,$estado_user);
		$statement_user->execute();
		$statement_user->store_result();

		if ($statement->affected_rows == 1 && $statement_user->affected_rows == 1) {
			return true;
		}else{
			return false;
		}

	}
	public static function administrativo($administrativo){

	}
	
}

Class AdminUser
{
	public static function desbloquear($_matricula){
		$connection = Connection::conectar();
		$query = "UPDATE usuario SET errors=0, estado=1 WHERE matricula = ?";
		$statement = $connection->prepare($query);
		$statement->bind_param('s',$_matricula);
		$statement->execute();
		$statement->store_result();
	}
}

?>