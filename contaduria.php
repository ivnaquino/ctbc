<?php  
	require_once "paths.php";
	

	if (!Auth::logged_on()) {
		header('Location: /login');
	}
	Auth::cargar_vista('contaduria');
	$seccion ;

	if(!isset($_GET['tab']) || $_GET['tab']==''){
		header('Location: /contaduria/pagos');
	}else{
		$seccion = strtolower($_GET['tab']);
	}

	$tabs = array('Reporte','Pagos');

	if ($seccion == 'pagos') {
		View::renderizar('contador_pagos',$tabs);
	}
	if ($seccion == 'reporte') {
		View::renderizar('contador_reporte',$tabs);
	}

	


?>