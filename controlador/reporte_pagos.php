<?php 

if (!is_file("modelo/".$pagina.".php")){
	
	echo "Falta definir la clase ".$pagina;
	exit;
}
require_once("modelo/".$pagina.".php"); 


	if(is_file("vista/".$pagina.".php")){
		if(empty($_SESSION)){
			session_start();
			}
  
			  if(isset($_SESSION['usuario'])){
			   $nivel = $_SESSION['usuario'];
			}
			else{
				$nivel = "";
			}
			
	  
				  if(isset($_SESSION['permisos'])){
				   $nivel1 = $_SESSION['permisos'];
			  
				}
				else{
					$nivel1 = "";
				}



		$o = new reporte_egreso();
		
	if (!empty($_POST['accion'])) {
		$o->generarPDF();

		# code...
	}
		  $consutaa=$o->consultar_ano();
		  $consuta1=$o->consultar1();
		  $consuta2=$o->consultar2();
		  $consuta3=$o->consultar3();
		  $consuta4=$o->consultar4();
		  $consuta5=$o->consultar5();
		  $consuta6=$o->consultar6();
		  $consuta7=$o->consultar7();
		  $consuta8=$o->consultar8();
		  $consuta9=$o->consultar9();
		require_once("vista/".$pagina.".php");
	}
	else{
		echo "PAGINA EN CONSTRUCCION";
	}

?>