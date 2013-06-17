<?php  

class Pago
{
	public function __construct(){}

	public static function all(){
		$connection = Connection::conectar();

		$pagos = array();

		$query = 'SELECT matricula,fecha,concepto,recargo,monto,estado FROM pagos ORDER BY fecha DESC LIMIT 10';
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
		if ($statement->num_rows == 1) {
			mysqli_close($connection);
			return true;
		}else{
			mysqli_close($connection);
			return false;
		}
	}
}












?>