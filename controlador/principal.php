<?php 
if (!is_file("modelo/".$pagina.".php")){
	
	echo "Falta definir la clase ".$pagina;
	exit;
}
require_once("modelo/".$pagina.".php"); 


	if(is_file("vista/".$pagina.".php")){
		$o = new principal();
		if(empty($_SESSION)){
			session_start();
			}
  
			  if(isset($_SESSION['usuario'])){
			   $nivel = $_SESSION['usuario'];
			
			}
			else{
				$nivel = "";
			}

			if(!empty($_POST['estado'])){
				$o->set_id($_POST['estado']);
			
				$notificaciones_concepto=$o->consultar();
		$_SESSION['notificaciones'] = $notificaciones_concepto[0];
		$_SESSION['cantidad'] = $notificaciones_concepto[1];
				
			}
			$o->set_nivel($nivel);
		$var=$o->morocidad();
		$var=$o->notificaciones();
		$notificaciones_concepto=$o->consultar();
		$_SESSION['notificaciones'] = $notificaciones_concepto[0];
		$_SESSION['cantidad'] = $notificaciones_concepto[1];
		

		require_once("vista/".$pagina.".php");

		
	
		

	}
	else{
		echo "PAGINA EN CONSTRUCCION";
	}

?>