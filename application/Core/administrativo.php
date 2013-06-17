<?php 

class Administrativo{
	public function __construct()
	{
	}

	public static function buscar($matricula)
	{
		$connection = Connection::conectar();
		$administrativo = array(
			'matricula' =>'',
			'nombre' => '',
			'apellidopat' => '',
			'apellidomat' => ''
			);
		$query = 'SELECT matricula,nombre,apellidopat,apellidomat FROM administrativo WHERE matricula = ? LIMIT 1';
		$statement = $connection->prepare($query);
		$statement->bind_param('s',$matricula);
		$statement->execute();
		$statement->store_result();
		$statement->bind_result($administrativo['matricula'],$administrativo['nombre'],$administrativo['apellidopat'],$administrativo['apellidomat']);
		$statement->fetch();

		return $administrativo;
	}
}

 ?>