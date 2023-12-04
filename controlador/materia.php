<?php 
header('Content-Type: text-html; charset=UTF-8');

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
		if (!empty($_POST['accion'])) {

			$valor=true;
			$retorno="";
				 // Validación de id
				$validacion[0]=$o->set_id($_POST['id']);
				$dato[0]="error en la validacion de id";
				 // Validación de nombre
				 $nombre = trim($_POST['nombre']);//elimina espacio al comienzo y final
				 $validacion[1] = $o->set_nombre($nombre);
				$dato[1]="error en la validacion del nombre";
				 // Validación de año
				$validacion[2]=$o->set_ano($_POST['año']);
				$dato[2]="error en la validacion del año";
					

			if (isset($_POST['docentes']) && is_array($_POST['docentes'])) {
				$docentes = $_POST['docentes'];

				 // Validación de docentes
				 $validacion2 = $o->validarDocentesFormulario($docentes);
				 if ($validacion2 == false) {
					// echo"falso";
					$validacion[3]=false;
					$dato[3]= "Las cedulas de docente no son válidos.";
				 }
				 else{
					// echo"verdadero";
					// Muestra los valores de los docentes
				foreach ($docentes as $key => $docente) {
					// echo 'Docente ' . ($key + 1) . ': ' . $docente . '<br>';
					
					// Asigna los valores de docentes a las funciones set_docenteX según sea necesario
					$methodName = 'set_docente' . ($key + 1);
					$o->$methodName($docente);
				}

				 } 
				
			} 
 
 
			$o->set_nivel($nivel);
			for ($i=0; $i < 3 ; $i++) { 
				if ($validacion[$i]== false) {
					$retorno=$retorno.$dato[$i]."<br>";
					echo $dato[$i];
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
		// ---------------
				


		  //Editar (f2)
		  if(!empty($_POST['id_edit'])){
			
			$valor=true;
			$retorno="";
				 // Validación de id
				$validacion[0]=$o->set_id($_POST['id1']);
				$dato[0]="error en la validacion de id1";
				 // Validación de nombre
				 $nombre = trim($_POST['nombre1']);//elimina espacio al comienzo y final
				 $validacion[1] = $o->set_nombre($nombre);
				$dato[1]="error en la validacion del nombre1";
				 // Validación de año
				$validacion[2]=$o->set_ano($_POST['año1']);
				$dato[2]="error en la validacion del año1";
			
 
				if (isset($_POST['docentes1']) && is_array($_POST['docentes1'])) {
					$docentes = $_POST['docentes1'];
	
					 // Validación de docentes
					 $validacion2 = $o->validarDocentesFormulario($docentes);
					 if ($validacion2 == false) {
						// echo"falso";
						$validacion[3]=false;
						$dato[3]= "Las cedulas de docente no son válidos.";
					 }
					 else{
						// echo"verdadero";
						// Muestra los valores de los docentes
					foreach ($docentes as $key => $docente) {
						// echo 'Docente ' . ($key + 1) . ': ' . $docente . '<br>';
						
						// Asigna los valores de docentes a las funciones set_docenteX según sea necesario
						$methodName = 'set_docente' . ($key + 1);
						$o->$methodName($docente);
					}
	
					 }
					
				} 
			
				$o->set_nivel($nivel);
				for ($i=0; $i < 3 ; $i++) { 
					if ($validacion[$i]== false) {
						$retorno=$retorno.$dato[$i]."<br>";
						echo $dato[$i];
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
		//   ----------------

         
		  //Eliminar
		if(!empty($_POST['accion3'])){
			$valor=true;
			$retorno="";
	
			$validacion[0]=$o->set_id($_POST['id2']);	
			$dato[0]="error en la validacion del id2";
			
			for ($i=0; $i < 0 ; $i++) { 
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
		$Año=$o->Año();
		$Docente=$o->Docente();
		$Edit_Año=$o->Edit_Año(); 

		require_once("vista/".$pagina.".php");

	}
    else{
		echo "PAGINA EN CONSTRUCCION";
	}

?>