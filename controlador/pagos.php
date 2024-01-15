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

  //<!----------------------------------------------------------------------------------------------------------------------------------------------------> 
  //<!---------------------------------------------------------------------------------------------------------------------------------------------------->          
  //<!----------------------------------------------------------------------------------------------------------------------------------------------------> 









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
			$fecha_actual = date("Y-m-d");
			$validacion[4]=$o->set_fecha($fecha_actual);		 
			$dato[4]="error en la validacion del fecha";
			$validacion[5]=$o->set_fechad($_POST['fecha']);		 
			$dato[5]="error en la validacion del fechad";
			$validacion[6]=$o->set_monto($_POST['monto']);
			$dato[6]="error en la validacion del monto";
			$validacion[7]=$o->set_meses($_POST['meses']);
			$dato[7]="error en la validacion del meses";
			$validacion[8]=$o->set_estado($_POST['estado']);
			$dato[8]="error en la validacion del estado";			
			$o->set_nivel($nivel);

			for ($i=0; $i <= 8 ; $i++) { 
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
  //<!----------------------------------------------------------------------------------------------------------------------------------------------------> 
  //<!---------------------------------------------------------------------------------------------------------------------------------------------------->          
  //<!----------------------------------------------------------------------------------------------------------------------------------------------------> 		











	
		  if(!empty($_POST['accionr'])){

			$valor=true;
			$retorno="";		
			$validacion[0]=$o->set_id_deudas($_POST['id_deudasr']);
			$dato[0]="error en la validacion del id_deudasr";
			$validacion[1]=$o->set_identificador($_POST['identificadorr']);
			$dato[1]="error en la validacion del identificadorr";
			$validacion[2]=$o->set_concepto($_POST['conceptor']);
			$dato[2]="error en la validacion del conceptor";
			$validacion[3]=$o->set_forma($_POST['formar']);
			$dato[3]="error en la validacion del formar";
			$fecha_actual = date("Y-m-d");
			$validacion[4]=$o->set_fecha($fecha_actual);			
			$dato[4]="error en la validacion del fechar";
			$validacion[5]=$o->set_monto($_POST['montor']);
			$dato[5]="error en la validacion del montor";
			$validacion[6]=$o->set_meses($_POST['mesesr']);
			$dato[6]="error en la validacion del mesesr";
			$validacion[7]=$o->set_estado($_POST['estador']);
			$dato[7]="error en la validacion del id_deudasr";
			$o->set_nivel($nivel);
			
			for ($i=0; $i <= 7 ; $i++) { 
				if ($validacion[$i]== false) {
					$retorno=$retorno.$dato[$i]."<br>";
					$valor=false;
				}
			}
			if ($valor==true) {
				$mensaje = $o->registrarr();
				echo $mensaje;
			}else{
				echo $retorno;
			}			
			exit;		
		}
  //<!----------------------------------------------------------------------------------------------------------------------------------------------------> 
  //<!---------------------------------------------------------------------------------------------------------------------------------------------------->          
  //<!----------------------------------------------------------------------------------------------------------------------------------------------------> 













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
			$validacion[6]=$o->set_meses($_POST['mesesM']);
			$dato[6]="error en la validacion del mesesM";
			$validacion[7]=$o->set_estado($_POST['estadoM']);
			$dato[7]="error en la validacion del estadoM";
			$validacion[8]=$o->set_id($_POST['idM']);
			$dato[8]="error en la validacion del idM";			
			$o->set_nivel($nivel);

			for ($i=0; $i <= 8 ; $i++) { 
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
  //<!----------------------------------------------------------------------------------------------------------------------------------------------------> 
  //<!---------------------------------------------------------------------------------------------------------------------------------------------------->          
  //<!----------------------------------------------------------------------------------------------------------------------------------------------------> 		  
  if(!empty($_POST['accionMM'])){
		
	$valor=true;
	$retorno="";	
	$validacion[0]=$o->set_codigo($_POST['codigoMM']);
	$dato[0]="error en la validacion del codigo";
	$validacion[1]=$o->set_tipo($_POST['tipoMM']);
	$dato[1]="error en la validacion del tipo";
	$validacion[2]=$o->set_m_montos($_POST['m_montosMM']);
	$dato[2]="error en la validacion de montos Bs";
	$validacion[3]=$o->set_d_montos($_POST['d_montosMM']);
	$dato[3]="error en la validacion de montos $";
			
	$o->set_nivel($nivel);

	for ($i=0; $i <= 3 ; $i++) { 
		if ($validacion[$i]== false) {
			$retorno=$retorno.$dato[$i]."<br>";
			$valor=false;
		}
	}

	if ($valor==true) {
		$mensaje = $o->montos();
		echo $mensaje;
	}else{
		echo $retorno;
	}			
	exit;			
}
//<!----------------------------------------------------------------------------------------------------------------------------------------------------> 
//<!---------------------------------------------------------------------------------------------------------------------------------------------------->          
//<!----------------------------------------------------------------------------------------------------------------------------------------------------> 	


 







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
  //<!----------------------------------------------------------------------------------------------------------------------------------------------------> 
  //<!---------------------------------------------------------------------------------------------------------------------------------------------------->          
  //<!----------------------------------------------------------------------------------------------------------------------------------------------------> 











		  if(!empty($_POST['accion4'])){

			$valor=true;
			$retorno="";	
			$validacion[0]=$o->set_id($_POST['idE2']);	
			$dato[0]="error en la validacion del idE2";
			
			for ($i=0; $i <= 0 ; $i++) { 
				if ($validacion[$i]== false) {
					$retorno=$retorno.$dato[$i]."<br>";
					$valor=false;
				}				
			}

			if ($valor==true) {
				$mensaje = $o->eliminarr();
				echo $mensaje;
			}else{
				echo $retorno;
			}			
			exit;			
		}
  //<!----------------------------------------------------------------------------------------------------------------------------------------------------> 
  //<!---------------------------------------------------------------------------------------------------------------------------------------------------->          
  //<!----------------------------------------------------------------------------------------------------------------------------------------------------> 






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
		
				$consutamonto=$o->consultamonto($nivel1);

				$consuta2=$o->consultar2();
			}
	
			require_once("vista/".$pagina.".php");
	
	
	}
	
?>  