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
// Inicia la sesión al principio del script
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
 
//Carga de Modelo  
if (is_file("modelo/".$pagina.".php")){
	
    require_once("modelo/".$pagina.".php");
	
}
else{ echo "Falta definir la clase ".$pagina;  exit; }
 
   

	if(is_file("vista/".$pagina.".php")){
		// if(empty($_SESSION)){
		// 	session_start();
		// 	}

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


	$m = new materias(); 

//---Nuevo---
if (isset($_POST['accion']) && !empty($_POST['accion'])) {

	switch ($_POST['accion']) {
		case 'registrar':
				//Registrar (f)
				$datos = [
					'nombre' =>mb_strtoupper(trim($_POST['nombre'])),//Mayuscula y limpia espacios
					'año' => $_POST['año'],
					'docentes' => $_POST['docentes']
				];
				
				echo $resultado = $m->Registrar_Materia($datos);
				$m->set_nivel($nivel);
			exit();//termina el script para no mostrar codigo html de la vista(afecta el alert) x el require_once("vista/".$pagina.".php");
		case 'modificar':
				//Editar (f2)
				$datos = [
					'id' => $_POST['id1'],
					'nombre' =>  mb_strtoupper(trim($_POST['nombre1'])),//Mayuscula y limpia espacios
					'año' => $_POST['año1'],
					'docentes' => $_POST['docentes1']
				];
				
	 			echo $resultado = $m->Modificar_Materia($datos);
				$m->set_nivel($nivel);
			exit();
		case 'eliminar':
			//Eliminar (f3)
			echo $m->Eliminar_Materia($_POST['id2']);
			$m->set_nivel($nivel);
			exit();
			
		default:break;
	}
	
}
 

		
          //Consulta (f4)
		  if(!empty($_POST['consulta'])){
			if(isset($_SESSION['permisos'])){
				$nivel1 = $_SESSION['permisos'];
		   
			 }
			 else{ 
				 $nivel1 = "";
			 }
			

			$consulta=$m->consultar($nivel1);
			// $consulta = $m->consultar(!empty($_SESSION['permisos']) ? $_SESSION['permisos'] : '');
			echo $consulta;
			exit;
		  }


		$consulta=$m->consultar($nivel1);
		$Año=$m->Año();
		$Docente=$m->Docente();
		$Edit_Año=$m->Edit_Año(); 

		require_once("vista/".$pagina.".php");

	}
    else{
		echo "PAGINA EN CONSTRUCCION";
	}

?>