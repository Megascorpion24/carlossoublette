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

		
		$o = new horario();
		if(!empty($_POST['accion'])){
			
		
		
			$valor=true;
			$retorno="";
			
			$validacion[0]=$o->set_cedula_profesor($_POST['cedula_profesor']);
			$dato[0]="error en la validacion del cedula_profesor";
			$validacion[1]=$o->set_ano($_POST['ano']);
			$dato[1]="error en la validacion del ano";
			$validacion[2]=$o->set_dia($_POST['dia']);
			$dato[2]="error en la validacion del fecha_ini";
			$validacion[3]=$o->set_clase_inicia($_POST['clase_inicia']);
			$dato[3]="error en la validacion del clase_inicia";
			$validacion[4]=$o->set_clase_termina($_POST['clase_termina']);
			$dato[4]="error en la validacion del clase_termina";
			$validacion[5]=$o->set_clase($_POST['clase']);
			$dato[5]="error en la validacion del clase";
			

			
			
			
			
			
			
			
			
			
			$o->set_nivel($nivel);


			for ($i=0; $i <= 4 ; $i++) { 
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
			$validacion[0]=$o->set_id($_POST['id']);
			$dato[0]="error en la validacion del id";
			$validacion[1]=$o->set_ano($_POST['ano1']);
			$dato[1]="error en la validacion del ano1";
			$validacion[2]=$o->set_dia($_POST['dia1']);
			$dato[2]="error en la validacion del dia1";
			$validacion[3]=$o->set_clase_inicia($_POST['clase_inicia1']);
			$dato[3]="error en la validacion del clase_inicia1";
			$validacion[4]=$o->set_clase_termina($_POST['clase_termina1']);
			$dato[4]="error en la validacion del clase_termina1";
			
			
			$o->set_nivel($nivel);

			for ($i=0; $i <= 3 ; $i++) { 
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

		  if(!empty($_POST['consultaAno'])){

			if(isset($_SESSION['permisos'])){
				$nivel1 = $_SESSION['permisos'];
		   
			 }
			 else{
				 $nivel1 = "";
			 }
			
			
			$consuta=$o->consultar($nivel1, $_POST['consultaAno']);
			
			echo $consuta;
			exit;
			
			
		  }


		  if(!empty($_POST['accion3'])){

			if (preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?]*$/",$_POST['id1'] )) {
				$o->set_id($_POST['id1']);
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
			
			
			$consuta=$o->consultar($nivel1, 0);
			
			echo $consuta;
			exit;
		  }
		  if(!empty($_POST['consultaAno'])){

			if(isset($_SESSION['permisos'])){
				$nivel1 = $_SESSION['permisos'];
		   
			 }
			 else{
				 $nivel1 = "";
			 }
			
			
			$consuta=$o->consultar($nivel1, $_POST['consultaAno']);
			
			echo $consuta;
			exit;
			
			
		  }

		  $consuta=$o->consultar($nivel1, 0);

		$consuta2=$o->consultar2();
		$consuta20=$o->consultar20();
		$consuta3=$o->consultar3();
		$consuta4=$o->consultar4();
		
		

		if(!empty($_POST['eventos'])){
	
			$evento=$o->eventos();
			echo ($evento);
			exit;
		  }
		  $evento=$o->eventos();
		  $selector=$o->eventos_selector();
		  $selector2=$o->eventos_selector2();
		  
		require_once("vista/".$pagina.".php");



	}else{
		echo "PAGINA EN CONSTRUCCION";
	}

?>