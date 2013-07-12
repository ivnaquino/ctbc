<?php  
Singleton:
class Pago
{
	public static function all(){
		$connection = Connection::conectar();

		$pagos = array();

		$query = 'SELECT matricula,fecha,concepto,recargo,monto,estado FROM pagos ORDER BY fecha DESC,id DESC LIMIT 10';
		$statement = $connection->prepare($query);
		$statement->execute();
		$statement->store_result();
		$statement->bind_result($matricula,$fecha,$concepto,$recargo,$monto,$estado);

		while ($statement->fetch()) {

			$datos = array(
				'matricula' => $matricula,
				'fecha' => $fecha,
				'concepto' => $concepto,
				'recargo' => $recargo,
				'monto' => $monto,
				'estado' => $estado
				);
			array_push($pagos, $datos);
		}
		mysqli_close($connection);
		return $pagos;
	}
	public static function alumno($matricula_alumno){
		$connection = Connection::conectar();

		$pagos = array();

		$query = 'SELECT matricula,fecha,concepto,recargo,monto,estado FROM pagos WHERE matricula = ? ORDER BY fecha DESC';
		$statement = $connection->prepare($query);
		$statement->bind_param('s',$matricula_alumno);
		$statement->execute();
		$statement->store_result();
		$statement->bind_result($matricula,$fecha,$concepto,$recargo,$monto,$estado);

		while ($statement->fetch()) {
			$datos = array(
				'matricula' => $matricula,
				'fecha' => $fecha,
				'concepto' => $concepto,
				'recargo' => $recargo,
				'monto' => $monto,
				'estado' => $estado
				);
			array_push($pagos, $datos);
		}
		mysqli_close($connection);
		return $pagos;
	}
	public static function pagar($pago){
		$connection = Connection::conectar();
		$query = 'INSERT INTO pagos(matricula,fecha,concepto,recargo,monto,estado) VALUES(?,?,?,?,?,?)';
		$statement = $connection->prepare($query);
		$statement->bind_param('ssssss',$pago['matricula'],$pago['fecha'],$pago['concepto'],$pago['recargo'],$pago['monto'],$pago['estado']);
		$statement->execute();
		$statement->store_result();
		if ($statement->affected_rows == 1) {
			mysqli_close($connection);
			return array(
				'state' => true,
				'mensaje' => 'El proceso se ha completado con exito'
				);
		}else{
			mysqli_close($connection);
			return array(
				'state' => false,
				'mensaje' => 'El proceso no ha finalizado con exito'
				);
		}
	}
	public static function concepto($_concepto_id){
		$connection = Connection::conectar();
		$_con = array('concepto'=>'','monto'=>'');
		$query = "SELECT concepto,monto FROM cont_concepto WHERE id = ? LIMIT 1";
		$statement = $connection->prepare($query);
		$statement->bind_param('d',$_concepto_id);
		$statement->execute();
		$statement->store_result();
		$statement->bind_result($_con['concepto'],$_con['monto']);
		return $_con;
	}
}












?>