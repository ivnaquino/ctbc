<?php  

class User extends ActiveRecord\Model
{
	public static $table_name = 'usuario';
	public static $primary_key = 'matricula';

	public static function entrar($matricula,$password){
		$errors = array(
					'estado' => true,
					'mensaje' => ''
					);
		$user = User::find(array('conditions' => array('matricula = ? AND password = ?', $matricula, $password)));
			if ($user) {
				if ($user->errores < 3) {
					$user->errores = 0;
					$user->save();
					Session::set('usuario',$user->matricula);
					Session::set('tipo',$user->tipo);
					header("Location: ".BASE_URL."");
				}else{
					$errors['mensaje'] = "La matricula ha sido bloqueada.";
					return $errors;
				}
			}else{
				$user = $user = User::find_by_matricula($matricula);

				if ($user) {
					if ($user->errores < 3) {
						$user->errores = $user->errores + 1;
						$user->save();
						$errors['mensaje'] = "Los datos proporcionados son incorrectos, favor de verficarlos";
					}else{
						$user->estado = 0;
						$user->save();
						$errors['mensaje'] = "La matricula ha sido bloqueada.";
					}
				}else{
					$errors['mensaje'] = "No se ha encontrado la matricula";
				}
				return $errors;
			}
	}
}

?>