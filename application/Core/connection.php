<?php 

class Connection{
	public function __construct(){
	}

	public static function conectar()
	{
		return new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
	}
	public static function close($connection)
	{
		mysqli_close($connection);
	}
}

 ?>