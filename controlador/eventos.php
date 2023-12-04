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





		
		$o = new eventos();
		if(!empty($_POST['accion'])){
		
			$valor=true;
			$retorno="";
			
			$validacion[1]=$o->set_fecha_ini($_POST['fecha_ini']);
			$dato[1]="error en la validacion del fecha_ini";
			$validacion[2]=$o->set_fecha_cierr($_POST['fecha_cierr']);
			$dato[2]="error en la validacion del fecha_cierr";
			$validacion[3]=$o->set_evento($_POST['evento']);
			$dato[3]="error en la validacion del evento";
			$validacion[4]=$o->set_ano_academico($_POST['ano_academico']);
			$dato[4]="error en la validacion del ano_academico";


			$o->set_nivel($nivel);


			for ($i=1; $i <= 4 ; $i++) { 
				if ($validacion[$i]== false) {
					$retorno=$retorno.$dato[$i]."<br>";
					$valor=false;
				}
			}

			if ($valor==true) {
				$mensaje = $o->registrar();	
				echo $mensaje;
			}else{
				echo $retorno;
			}
			
			exit;			
		  }






		  
		  if(!empty($_POST['accion1'])){
		
			$valor=true;
			$retorno="";
			
			$validacion[1]=$o->set_fecha_ini($_POST['fecha_ini1']);
			$dato[1]="error en la validacion del fecha_ini";
			$validacion[2]=$o->set_fecha_cierr($_POST['fecha_cierr1']);
			$dato[2]="error en la validacion del fecha_cierr";
			$validacion[3]=$o->set_evento($_POST['evento1']);
			$dato[3]="error en la validacion del evento";
			$validacion[4]=$o->set_id($_POST['id1']);
			$dato[4]="error en la validacion del id";


			$o->set_nivel($nivel);


			for ($i=1; $i <= 4; $i++) { 
				if ($validacion[$i]== false) {
					$retorno=$retorno.$dato[$i]."<br>";
					$valor=false;
				}
			}

			if ($valor==true) {
				$mensaje = $o->modificar();	
				echo $mensaje;
			}else{
				echo $retorno;
			}
			
			exit;		

		  }

		  


		  if(!empty($_POST['accion3'])){
			$valor=true;
			$retorno="";
			$validacion[1]=$o->set_id($_POST['id2']);
			$dato[1]="error en la validacion del id";


			$o->set_nivel($nivel);

			
			for ($i=1; $i <= 1 ; $i++) { 
				if ($validacion[$i]== false) {
					$retorno=$retorno.$dato[$i]."<br>";
					$valor=false;
				}
			}

			if ($valor==true) {
				$mensaje = $o->eliminar();	
				echo $mensaje;
			}else{
				echo $retorno;
			}
			
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



		if(!empty($_POST['eventos'])){
	
			$evento=$o->eventos();
			echo ($evento);
			exit;
		  }

		  
		  $evento=$o->eventos();
		  $ano_academico=$o->ano_academico();


		require_once("vista/".$pagina.".php");



	}else{
		echo "PAGINA EN CONSTRUCCION";
	}

?>