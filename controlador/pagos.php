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


		
		$o = new pagos();
		if(!empty($_POST['accion'])){
	
			$valor=true;
			$retorno="";
	
			$validacion[0]=$o->set_id_deudas($_POST['id_deudas']);
			$dato[0]="error en la validacion del id_deudas";
			$validacion[1]=$o->set_identificador($_POST['identificador']);
			$dato[1]="error en la validacion del identificador";
			$validacion[2]=$o->set_concepto($_POST['concepto']);
			$dato[2]="error en la validacion del concepto";
			$validacion[3]=$o->set_forma($_POST['forma']);
			$dato[3]="error en la validacion del forma";
			$validacion[4]=$o->set_fecha( $_POST['fecha']);				
			$dato[4]="error en la validacion del fecha";
			$validacion[5]=$o->set_monto($_POST['monto']);
			$dato[5]="error en la validacion del monto";
			$validacion[6]=$o->set_estado($_POST['estado']);
			$dato[6]="error en la validacion del estado";
			$o->set_nivel($nivel);

			for ($i=0; $i <= 6 ; $i++) { 
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
		
	
		  if(!empty($_POST['accionr'])){
		  
			if (preg_match("/^[a-zA-Z0-9\s]+$/", $_POST['id_deudasr'])) {
				$o->set_id_deudas($_POST['id_deudasr']);
			}
			if (preg_match("/^[a-zA-Z0-9\s]+$/",$_POST['identificadorr'])) {
				$o->set_identificador($_POST['identificadorr']);
			}
			if (preg_match("/^[a-zA-Z0-9\s]+$/",$_POST['conceptor'])) {
				$o->set_concepto($_POST['conceptor']);
			}
			if (preg_match("/^[a-zA-Z0-9\s]+$/",$_POST['formar'])) {
				$o->set_forma($_POST['formar']);
			}
			if (preg_match("/^\d{4}-\d{2}-\d{2}$/",$_POST['fechar'])) {
				$o->set_fecha( $_POST['fechar']);		
			}
			if (preg_match("/^[a-zA-Z0-9\s]+$/",$_POST['montor'])) {
				$o->set_monto($_POST['montor']);
			}
			if (preg_match("/^[a-zA-Z0-9\s]+$/",$_POST['estador'])) {
				$o->set_estado($_POST['estador']);
			}
		

			$o->set_nivel($nivel);
			  $mensaje = $o->registrarr();
			  echo $mensaje;
			  exit;			
			}





		  if(!empty($_POST['accion1'])){

		
			$valor=true;
			$retorno="";
	
			$validacion[0]=$o->set_id_deudas($_POST['id_deudasM']);
			$dato[0]="error en la validacion del id_deudasM";
			$validacion[1]=$o->set_identificador($_POST['identificadorM']);
			$dato[1]="error en la validacion del identificadorM";
			$validacion[2]=$o->set_concepto($_POST['conceptoM']);
			$dato[2]="error en la validacion del conceptoM";
			$validacion[3]=$o->set_forma($_POST['formaM']);
			$dato[3]="error en la validacion del formaM";
			$validacion[4]=$o->set_fecha( $_POST['fechaM']);				
			$dato[4]="error en la validacion del fechaM";
			$validacion[5]=$o->set_monto($_POST['montoM']);
			$dato[5]="error en la validacion del montoM";
			$validacion[6]=$o->set_estado($_POST['estadoM']);
			$dato[6]="error en la validacion del estadoM";
			$validacion[7]=$o->set_id($_POST['idM']);
			$dato[6]="error en la validacion del idM";
			$o->set_nivel($nivel);

			for ($i=0; $i <= 6 ; $i++) { 
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
	
			$validacion[0]=$o->set_id($_POST['idE']);	
			$dato[0]="error en la validacion del idE";
			
			for ($i=0; $i <= 0 ; $i++) { 
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
	



		  	/* aqui estan las cosas del tutor*/ 
		  if($_SESSION["rol"]=="1"){
			$consutar=$o->consultarr($_SESSION["usuario"]);

			$consutat=$o->consultart($_SESSION["usuario"]);
			}else{/* aqui estan las cosas del super usuario*/ 
				$consuta=$o->consultar($nivel1);
		
				$consuta2=$o->consultar2();
			}
	
			require_once("vista/".$pagina.".php");
	
	
		}
	
	?>