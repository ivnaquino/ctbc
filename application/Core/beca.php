<?php  

class Beca
{
	
	function __construct(){}

	public static function alumno($_matricula){
		$connection = Connection::conectar();
		$beca = array(
			'matricula' => '',
			'estado' => '',
			'descuento' => '' 
			);
		$query = 'SELECT matricula,estado,descuento FROM becas WHERE matricula = ? LIMIT 1';
		$statement = $connection->prepare($query);
		$statement->bind_param('s',$_matricula);
		$statement->execute();
		$statement->store_result();
		$statement->bind_result($beca['matricula'],$beca['estado'],$beca['descuento']);
		$statement->fetch();

		return $beca;
	}

}

?>