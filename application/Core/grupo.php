<?php  

class Grupo
{
	public static function all(){
		$grupos = array();
		$connection = Connection::conectar();
		$query = "SELECT id,nombre,cuatrimestre FROM grupo ORDER BY nombre,cuatrimestre";
		$statement = $connection->prepare($query);
		$statement->execute();
		$statement->store_result();
		$statement->bind_result($id,$nombre,$cuatrimestre);
		while ($statement->fetch()) {
			$grupo = array(
				'id'=>$id,
				'nombre'=>$nombre,
				'cuatrimestre'=>$cuatrimestre
				);
			array_push($grupos, $grupo);
		}
		return $grupos;
	}
}

?>