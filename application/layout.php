<?php  
	/*------------------------------------------------------------------------------*
	* Configuracion de las rutas de host en donde se encontraran los archivos       *
	* de tipo publico como los css js img 											*
	--------------------------------------------------------------------------------*/
	$layout_params = array(
		'ruta_css' => SERVIDOR.'/public/css/' ,
		'ruta_js' => SERVIDOR.'/public/js/' ,
		'ruta_img' => SERVIDOR.'/public/img/'
		);

	$layout_components = array(
		'ruta_header' => VISTAS.'layouts'.DS.'header.php', 
		'ruta_header-login' => VISTAS.'layouts'.DS.'header-login.php', 
		'ruta_footer' => VISTAS.'layouts'.DS.'footer.php',
		'ruta_nav' => VISTAS.'nav'.DS.'nav.php',
		'ruta_alumno' => VISTAS.'components'.DS.'alumno.php',
		'ruta_contador' => VISTAS.'components'.DS.'contador.php',
		'ruta_administrativo' => VISTAS.'components'.DS.'administrativo.php',
		);

?>