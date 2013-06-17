<?php 

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
			'apellidomat' => ''
			);
		$query = 'SELECT matricula,nombre,apellidopat,apellidomat FROM alumno WHERE matricula = ? LIMIT 1';
		$statement = $connection->prepare($query);
		$statement->bind_param('s',$matricula);
		$statement->execute();
		$statement->store_result();
		$statement->bind_result($alumno['matricula'],$alumno['nombre'],$alumno['apellidopat'],$alumno['apellidomat']);
		$statement->fetch();

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