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
	public static function exist($_matricula){
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
		if ($statement->num_rows == 1) {
			return true;
		}else{
			return false;
		}

	}
	public static function all(){
		$_alumnos = array();
		$_becas = array(
				'matricula' => '',
				'estado' => '',
				'descuento' =>''
				);

		$query = "SELECT matricula,estado,descuento FROM becas";
		$connection = Connection::conectar();
		$statement = $connection->prepare($query);
		$statement->execute();
		$statement->store_result();
		$statement->bind_result($_becas['matricula'],$_becas['estado'],$_becas['descuento']);
		while ($statement->fetch()) {
			$_alm = Alumno::buscar($_becas['matricula']);
			$alumno_becado = array(
				'matricula' => $_alm['matricula'],
				'nombre' => $_alm['nombre'].' '.$_alm['apellidopat'].' '.$_alm['apellidomat'],
				'grupo' => $_alm['grupo'],
				'cuatrimestre' => $_alm['cuatrimestre'],
				'beca_estado'=> $_becas['estado'],
				'beca_descuento'=> $_becas['descuento']
				);
			array_push($_alumnos, $alumno_becado);
		}
		return $_alumnos;

	}
	public static function eliminar($_matricula){
		$connection = Connection::conectar();
		$query = "DELETE FROM becas WHERE matricula = ?";
		$statement = $connection->prepare($query);
		$statement->bind_param('s',$_matricula);
		$statement->execute();
		$statement->store_result();
		if ($statement->affected_rows > 0) {
			mysqli_close($connection);
			header('Location: /');
		}else{
			mysqli_close($connection);
			return false;
		}
	}
	public static function inhabilitar($_matricula){
		$connection = Connection::conectar();
		$query = "UPDATE becas SET estado=0 WHERE matricula = ? ";
		$statement = $connection->prepare($query);
		$statement->bind_param('s',$_matricula);
		$statement->execute();
		$statement->store_result();
		if ($statement->affected_rows > 0) {
			mysqli_close($connection);
			return true;
		}else{
			mysqli_close($connection);
			return false;
		}
	}

}

?>