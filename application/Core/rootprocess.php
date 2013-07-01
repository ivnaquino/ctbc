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
		echo $statement->affected_rows;
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