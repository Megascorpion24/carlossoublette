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



		
		$o = new secciones();
		if(!empty($_POST['accion'])){

			if (preg_match("/^[a-zA-Z0-9\s]{1,5}+$/", $_POST['secciones'])) {
				$o->set_secciones($_POST['secciones']);
			}			
			if (preg_match("/^[a-zA-Z0-9\s]+$/", $_POST['ano'])) {
				$o->set_ano($_POST['ano']);
			}			
			if (preg_match("/^[a-zA-Z0-9\s]+$/", $_POST['cedula_profesor'])) {
				$o->set_cedula_profesor($_POST['cedula_profesor']);
			}				
			if (preg_match("/^[a-zA-Z0-9\s]+$/", $_POST['ano_academico'])) {
				$o->set_ano_academico($_POST['ano_academico']);
			}
			if (preg_match("/^[0-9\s]{1,5}+$/", $_POST['cantidad'])) {
				$o->set_cantidad($_POST['cantidad']);
			}
			

			$o->set_nivel($nivel);
			$mensaje = $o->registrar();
			echo $mensaje;
			exit;			
		  }


		  if(!empty($_POST['accions'])){
		
			$o->set_idr($_POST['idr']);
			$o->set_seccionesr($_POST['seccionesr']);



			$mensaje = $o->registrar();
			echo $mensaje;
			exit;			
		  }

		   if(!empty($_POST['acciona'])){
		
			$o->set_ida($_POST['ida']);
			$o->set_anoa($_POST['anoa']);
			$o->set_turnoa($_POST['turnoa']);

			$mensaje = $o->registrar();
			echo $mensaje;
			exit;			
		  }






		  
		  if(!empty($_POST['accion1'])){
			

			if (preg_match("/^[0-9]{1,5}$/",$_POST['id1'] )) {
				$o->set_id($_POST['id1']);

			}
			if (preg_match("/^[0-9\s]{1,5}+$/", $_POST['cantidad1'])) {
				$o->set_cantidad($_POST['cantidad1']);
			}
			
			$o->set_nivel($nivel);
			$mensaje = $o->modificar();		
			echo $mensaje;
			exit;		
		  }

		  


		  if(!empty($_POST['accion3'])){

			if (preg_match("/^[0-9]{1,5}$/",$_POST['id2'] )) {
				$o->set_id($_POST['id2']);
			}
			
			$o->set_nivel($nivel);

			$mensaje = $o->eliminar();			
			echo $mensaje;
			exit;			
		  }





		  if(!empty($_POST['consulta'])){

		  	if(isset($_SESSION['permisos'])){
				$nivel1 = $_SESSION['permisos'];
		   
			 }
			 else{
				 $nivel1 = "";
			 }
	
			$consuta=$o->consultar($nivel1);
			echo $consuta;
			exit;
		  }


		  $consuta=$o->consultar($nivel1);
		  $consuta1=$o->consultar1();
		  $consuta2=$o->consultar2();
		  $consuta3=$o->consultar3();
		  $consuta4=$o->consultar4();

		require_once("vista/".$pagina.".php");



	}else{
		echo "PAGINA EN CONSTRUCCION";
	}

?>