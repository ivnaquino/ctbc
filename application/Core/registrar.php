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

?>