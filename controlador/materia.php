<?php 

//Carga de Modelo
if (is_file("modelo/".$pagina.".php")){
	
    require_once("modelo/".$pagina.".php");
	
}
else{ echo "Falta definir la clase ".$pagina;  exit; }


 

//Carga de Vista
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


		$o = new materias();
        
        //Registro (f)
		if(!empty($_POST['accion'])){
			$valor=true;
			$retorno="";
			$validacion[0]=$o->set_id($_POST['id']);
			$dato[0]="error en la validacion del id";
				$validacion[1]=$o->set_nombre($_POST['nombre']);
				$dato[1]="error en la validacion del nombre";
			
			
			$o->set_nivel($nivel);
			for ($i=1; $i <= 1 ; $i++) { 
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


		  //Editar (f2)
		  if(!empty($_POST['id_edit'])){
		
			$valor=true;
			$retorno="";
			$validacion[0]=$o->set_id($_POST['id1']);
			$dato[0]="error en la validacion del id1";
			$validacion[1]=$o->set_nombre($_POST['nombre1']);
			$dato[1]="error en la validacion del nombre1";
		
			$o->set_nivel($nivel);
			for ($i=1; $i <= 1 ; $i++) { 
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


          //Eliminar (f3)
		//   if(!empty($_POST['delete'])){
	
		// 	$o->set_id($_POST['id2']);			
		// 	$mensaje = $o->eliminar();			
		// 	echo $mensaje;
		// 	exit;			
		//   }

		if(!empty($_POST['accion3'])){
	
			$valor=true;
			$retorno="";
			$validacion[0]=$o->set_id($_POST['id2']);
			$dato[0]="error en la validacion del id2";
			
			$o->set_nivel($nivel);
			for ($i=1; $i <= 0 ; $i++) { 
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

          //Consulta (f4)
		  if(!empty($_POST['consulta'])){
			if(isset($_SESSION['permisos'])){
				$nivel1 = $_SESSION['permisos'];
		   
			 }
			 else{
				 $nivel1 = "";
			 }
			

			$consulta=$o->consultar($nivel1);
			echo $consulta;
			exit;
		  }


		$consulta=$o->consultar($nivel1);
		require_once("vista/".$pagina.".php");

	}
    else{
		echo "PAGINA EN CONSTRUCCION";
	}

?>