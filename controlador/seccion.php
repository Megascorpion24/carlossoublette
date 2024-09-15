<?php 
require 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable("../carlossoublette/");
$dotenv->load();
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$key = $_ENV['JWT_SECRET_KEY'];

if(isset($_COOKIE['token'])){
	$decoded = JWT::decode($_COOKIE['token'], new Key($key, 'HS256'));
	
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
		
		$s = new secciones();
         
		if (isset($_POST['accion']) && !empty($_POST['accion'])) {
			switch ($_POST['accion']) {
				case 'registrar':
						//Registrar (f)
						$datos = [
							'secciones' =>$_POST['secciones'],
							'año' =>$_POST['año'],
							'Doc_Guia' =>$_POST['Doc_Guia'],
							'cantidad' =>$_POST['cantidad'],
							'ano_academico' =>$_POST['ano_academico']
						];
						
						$s->set_nivel($nivel);
						echo $resultado = $s->registrar($datos);
					die();
				case 'modificar':
						//Editar (f2)
						$datos = [
							'id' => $_POST['id1'],
							'secciones' =>$_POST['secciones1'],
							'año' =>$_POST['año1'],
							'Doc_Guia' =>$_POST['Doc_Guia1'],
							'cantidad' =>$_POST['cantidad_e'],
							'ano_academico' =>$_POST['acd']
						];
						
						$s->set_nivel($nivel);
						echo $resultado = $s->modificar($datos);
					die();
				case 'eliminar':
					//Eliminar (f3)
					$s->set_nivel($nivel);
					echo $s->eliminar($_POST['id2']);
					die();
					
				default:break;
			}
			
			exit();//termina el script para no mostrar codigo html de la vista(afecta el alert) x el require_once("vista/".$pagina.".php");
		}
		 
 
           //Consulta (f4)
		  if(!empty($_POST['consulta'])){

			if(isset($_SESSION['permisos'])){
				$nivel1 = $_SESSION['permisos'];
		   
			 }
			 else{
				 $nivel1 = "";
			 }
			

			$consulta=$s->consultar($nivel1);
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
					
					$validacion2 = $s->validarAbecedarioFormulario($secciones);
					if ($validacion2 == false) {
					   // echo"falso";
					   $validacion[0]=false;
					   $dato[0]= "Los Abecedarios no son válidos.";
					}
					else{
						// echo "validacion exitosa";
						// Procesar los registros
						foreach ($secciones as $key => $s) {
							$s->setSec($key + 1, $s);
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
						$mensaje = $s->Asig_Seccion();
						echo $mensaje;
					}else{
						echo $retorno;
					}
		
				exit;
			} 
			



		//   ------------------
		$consulta=$s->consultar($nivel1);
		  $Año=$s->Año();
		  $academico=$s->academico();
		  $Edit_Año=$s->Edit_Año();


		require_once("vista/".$pagina.".php");

	}
    else{
		echo "PAGINA EN CONSTRUCCION";
	}

	

?>