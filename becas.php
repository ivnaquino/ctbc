
<?php  
	require_once "paths.php";
	

	if (!Auth::logged_on()) {
		header('Location: /login');
	}
	//Auth::cargar_vista('becas');
	$seccion ;

	if(!isset($_GET['tab']) || $_GET['tab']==''){
		header('Location: /becas/inicio');
	}else{
		$seccion = strtolower($_GET['tab']);
	}

	$tabs = array('Inicio','Solicitudes');

	if ($seccion == 'inicio') {
		View::renderizar('becas_inicio',$tabs);
	}
	if ($seccion == 'solicitudes') {
		View::renderizar('becas_solicitud',$tabs);
	}

	


?>