<?php 
require 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable("../carlossoublette/");
$dotenv->load();
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$key = $_ENV['JWT_SECRET_KEY'];

if(isset($_COOKIE['token'])){
	$decoded = JWT::decode($_COOKIE['token'], new Key($key, 'HS256'));
	$nivel = $decoded->resultado->user;
    $rol =  $decoded->resultado->rol;
    $nivel1 = $decoded->resultado->permisos;
    $name = $decoded->resultado->name;
} else {
	header('location:index.php');
}

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
		
		$o = new secciones();
         
        // Registro (f)
		if(!empty($_POST['accion'])){
			$valor=true;
			$retorno="";
				 // Validación de seccion
			$validacion[0]=$o->set_secciones($_POST['secciones']);
			$dato[0]="error en la validacion de seciones";
				 // Validación de año
			$validacion[1]=$o->set_ano($_POST['año']);
			$dato[1]="error en la validacion del año";
				 // Validación de Docente Guia
			$validacion[2]=$o->set_cedula_profesor($_POST['Doc_Guia']);	
			$dato[2]="error en la validacion de profesor Guia";
				 // Validación de Cantidad
			$validacion[3]=$o->set_cantidad($_POST['cantidad']);
			$dato[3]="error en la validacion de cantidad";

				 // Validación de año academico
			$validacion[4]=$o->set_ano_academico($_POST['ano_academico']);
			$dato[4]="error en la validacion del año academico";

			for ($i=0; $i < 4 ; $i++) { 
				if ($validacion[$i]== false) {
					$retorno=$retorno.$dato[$i]."<br>";
					echo $dato[$i];
					$valor=false;
				}
			}

			$o->set_nivel($nivel);

			if ($valor==true) {
				$mensaje = $o->registrar();	
				echo $mensaje;
			}else{
				echo $retorno;
			}

			exit;			
		  }

		 

 
		  // Editar (f2)
if (!empty($_POST['id_edit'])) {
	
			$valor=true;
			$retorno="";
				 // Validación de id
			$validacion[0]=$o->set_id($_POST['id1']);
			$dato[0]="error en la validacion de id";
				 // Validación de seccion
			$validacion[1]=$o->set_secciones($_POST['secciones1']);
			$dato[1]="error en la validacion de seciones";
				 // Validación de año
			$validacion[2]=$o->set_ano($_POST['año1']);
			$dato[2]="error en la validacion del año";
				 // Validación de Docente Guia
			$validacion[3]=$o->set_cedula_profesor($_POST['Doc_Guia1']);	
			$dato[3]="error en la validacion de profesor Guia";
				 // Validación de Cantidad
			$validacion[4]=$o->set_cantidad($_POST['cantidad_e']);
			$dato[4]="error en la validacion de cantidad";
			// Validación de año academico
			$validacion[5]=$o->set_ano_academico($_POST['acd']);
			$dato[5]="error en la validacion del año academico";


			for ($i=0; $i < 5 ; $i++) { 
				if ($validacion[$i]== false) {
					$retorno=$retorno.$dato[$i]."<br>";
					echo $dato[$i];
					$valor=false;
				}
			}

			$o->set_nivel($nivel);

			if ($valor==true) {
				$mensaje = $o->modificar();
				echo $mensaje;
			}else{
				echo $retorno;
			}

			exit;			
}




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

			$o->set_nivel($nivel);

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
		  	// ----------------


			if (isset($_POST['sec'])) {
				$valor=true;
				$retorno="";

				$secciones = $_POST['sec'];
			
				//no esta vacio y Asegúrate de tener al menos 1 registro y como máximo 21
				if (!empty($secciones) && array_slice($secciones, 0, 21)) {
					
					$validacion2 = $o->validarAbecedarioFormulario($secciones);
					if ($validacion2 == false) {
					   // echo"falso";
					   $validacion[0]=false;
					   $dato[0]= "Los Abecedarios no son válidos.";
					}
					else{
						// echo "validacion exitosa";
						// Procesar los registros
						foreach ($secciones as $key => $s) {
							$o->setSec($key + 1, $s);
						}
					}



				} else {
					echo "Al menos un registro es obligatorio.";
					$validacion[0]=false;
				}


				

				$o->set_nivel($nivel);
					for ($i=0; $i < 0 ; $i++) { 
						if ($validacion[$i]== false) {
							$retorno=$retorno.$dato[$i]."<br>";
							echo $dato[$i];
							$valor=false;
						}
					}

					if ($valor==true) {
						$mensaje = $o->Asig_Seccion();
						echo $mensaje;
					}else{
						echo $retorno;
					}
		
				exit;
			} 
			



		//   ------------------
		$consulta=$o->consultar($nivel1);
		  $Año=$o->Año();
		  $academico=$o->academico();
		  $Edit_Año=$o->Edit_Año();


		require_once("vista/".$pagina.".php");

	}
    else{
		echo "PAGINA EN CONSTRUCCION";
	}

	

?>