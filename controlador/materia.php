<?php 
header('Content-Type: text/html; charset=UTF-8');

//Carga de Modelo
if (is_file("modelo/".$pagina.".php")){ require_once("modelo/".$pagina.".php"); }
else{ echo "Falta definir la clase ".$pagina;  exit;  }
 
   // Iniciar sesión si no está iniciada
   if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

// Obtener nivel de usuario y permisos
$nivel = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : "";
$nivel1 = isset($_SESSION['permisos']) ? $_SESSION['permisos'] : "";

	$m = new materias(); 

//---Nuevo---
if (isset($_POST['accion']) && !empty($_POST['accion'])) {

	switch ($_POST['accion']) {
		case 'registrar':
				//Registrar (f)
				$datos = [
					'nombre' => trim($_POST['nombre']),
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
					'nombre' => trim($_POST['nombre1']),
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
 
//Carga de Vista
	if(is_file("vista/".$pagina.".php")){
		
          //Consulta (f4)
		  if(!empty($_POST['consulta'])){
			if(isset($_SESSION['permisos'])){
				$nivel1 = $_SESSION['permisos'];
		   
			 }
			 else{ 
				 $nivel1 = "";
			 }
			

			$consulta=$m->consultar($nivel1);
			$consulta = $m->consultar(!empty($_SESSION['permisos']) ? $_SESSION['permisos'] : '');
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