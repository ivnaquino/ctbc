<?php 
Singleton:

class Alumno{
	public function __construct(){
	}

	public static function buscar($matricula)
	{
		$connection = Connection::conectar();
		$alumno = array(
			'matricula' => '',
			'nombre' => '',
			'apellidopat' => '',
			'apellidomat' => '',
			'grupo' => '',
			'cuatrimestre' =>''
			);
		$query = 'SELECT matricula,nombre,apellidopat,apellidomat,grupo FROM alumno WHERE matricula = ? LIMIT 1';
		$statement = $connection->prepare($query);
		$statement->bind_param('s',$matricula);
		$statement->execute();
		$statement->store_result();
		$statement->bind_result($alumno['matricula'],$alumno['nombre'],$alumno['apellidopat'],$alumno['apellidomat'],$grupo);
		$statement->fetch();

		$query_grupo = 'SELECT nombre,cuatrimestre FROM grupo WHERE id = ? LIMIT 1';
		$statement_grupo = $connection->prepare($query_grupo);
		$statement_grupo->bind_param('d',$grupo);
		$statement_grupo->execute();
		$statement_grupo->store_result();
		$statement_grupo->bind_result($alumno['grupo'],$alumno['cuatrimestre']);
		$statement_grupo->fetch();

		mysqli_close($connection);
		return $alumno;
	}

	public static function all()
	{
		$alumnos = array();
		$connection = Connection::conectar();
		$alumno = array(
			'nombre' => '',
			'apellidopat' => '',
			'apellidomat' => ''
			);
		$query = 'SELECT nombre,apellidopat,apellidomat FROM alumno';
		$statement = $connection->prepare($query);
		$statement->execute();
		$statement->store_result();
		$statement->bind_result($nombre,$apellidopat,$apellidomat);
		while ($statement->fetch()) {
			$datos = array(
				'nombre' => $nombre,
				'apellidopat' => $apellidopat,
				'apellidomat' => $apellidomat
				);
			array_push($alumnos, $datos);
		}
		mysqli_close($connection);
		return $alumnos;
	}

}

 ?>