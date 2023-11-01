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




		
		$o = new seguridad();
		if(!empty($_POST['accion5'])){
		
				$o->set_id($_POST['id']);
	
			
			

			$mensaje1 =$o->consultar1();
			if(!empty($mensaje1)){
				echo $mensaje1;
			}else{
				echo "asdasdasdasd";
			}

			
			exit;			
		  }


		  if(!empty($_POST['accion'])){
			
				$o->set_id($_POST['id2']);
	
			

			$o->set_nivel($nivel);
			$o->eliminar1();
			
			if (!empty($_POST['exampleRadios'])) {
				$permiso=$_POST['exampleRadios'];
				$long= count($_POST['exampleRadios']);
				for ($i=0; $i < $long ; $i++) { 
					$o->set_permiso($permiso[$i]);
					$o->registrar();
					
				}

				$o->bitacora1("se registraron permisos", "seguridad",$nivel);
	
			}
			
			
			exit;			
		  }






		  
		  if(!empty($_POST['accion8'])){
			$valor=true;
			$retorno="";

			$validacion[0]=$o->set_descripcion($_POST['descripcion']);
			$dato[0]="error en la validacion del descripcion";
			$validacion[1]=$o->set_rol($_POST['rol']);
			$dato[1]="error en la validacion del rol";

			
			
			$o->set_nivel($nivel);
			
			for ($i=0; $i <= 1 ; $i++) { 
				if ($validacion[$i]== false) {
					$retorno=$retorno.$dato[$i]."<br>";
					$valor=false;
				}
			}

			if ($valor==true) {
				$mensaje = $o->registrar1();	
				echo $mensaje;
			}else{
				echo $retorno;
			}
			
			exit;		
		  }


		  if(!empty($_POST['accion2'])){
		
	
			$valor=true;
			$retorno="";

			$validacion[0]=$o->set_descripcion($_POST['descripcion1']);
			$dato[0]="error en la validacion del descripcion1";
			$validacion[1]=$o->set_rol($_POST['rol1']);
			$dato[1]="error en la validacion del rol1";

			
			
			$o->set_nivel($nivel);
			
			for ($i=0; $i <= 1 ; $i++) { 
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

			$validacion[0]=$o->set_id($_POST['cedula2']);
			$dato[0]="error en la validacion del cedula2";
			

			
			
			$o->set_nivel($nivel);
			
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


		  $consuta=$o->consultar($nivel1);
		require_once("vista/".$pagina.".php");



	}else{
		echo "PAGINA EN CONSTRUCCION";
	}

?>