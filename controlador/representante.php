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


		
		
				$o = new tutor_legal();
				if(!empty($_POST['accion'])){
				
				  $valor=true;
				  $retorno="";
		  
				  $validacion[0]=$o->set_cedula($_POST['cedula']);
				  $dato[0]="error en la validacion del cedula";
				  $validacion[1]=$o->set_nombre1($_POST['nombre1']);
				  $dato[1]="error en la validacion del nombre1";
				  $validacion[2]=$o->set_nombre2($_POST['nombre2']);
				  $dato[2]="error en la validacion del nombre2";
				  $validacion[3]=$o->set_apellido1($_POST['apellido1']);
				  $dato[3]="error en la validacion del apellido1";
				  $validacion[4]=$o->set_apellido2($_POST['apellido2']);	
				  $dato[4]="error en la validacion del apellido2";
				  $validacion[5]=$o->set_telefono($_POST['telefono']);
				  $dato[5]="error en la validacion del telefono";
				  $validacion[6]=$o->set_correo($_POST['correo']);
				  $dato[6]="error en la validacion del correo";
				  $validacion[7]=$o->set_contacto_emer($_POST['contacto_emer']);
				  $dato[7]="error en la validacion del contacto_emer";
				  $validacion[8]=$o->set_direccion($_POST['direccion']);
				  $dato[8]="error en la validacion del direccion";
				  
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





		  
		  if(!empty($_POST['accion1'])){
			$valor=true;
			$retorno="";
	
	  
			$validacion[0]=$o->set_cedula($_POST['cedula1']);
			$dato[0]="error en la validacion del cedula1";
			$validacion[1]=$o->set_nombre1($_POST['nombre11']);
			$dato[1]="error en la validacion del nombre11";
			$validacion[2]=$o->set_nombre2($_POST['nombre21']);
			$dato[2]="error en la validacion del nombre21";
			$validacion[3]=$o->set_apellido1($_POST['apellido11']);
			$dato[3]="error en la validacion del apellido11";
			$validacion[4]=$o->set_apellido2($_POST['apellido21']);	
			$dato[4]="error en la validacion del apellido21";
			$validacion[5]=$o->set_telefono($_POST['telefono1']);
			$dato[5]="error en la validacion del telefono1";
			$validacion[6]=$o->set_correo($_POST['correo1']);
			$dato[6]="error en la validacion del correo1";
			$validacion[7]=$o->set_contacto_emer($_POST['contacto_emer1']);
			$dato[7]="error en la validacion del contacto_emer1";
			$validacion[8]=$o->set_direccion($_POST['direccion1']);
			$dato[8]="error en la validacion del direccion1";
			
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

		  


		  if(!empty($_POST['accion3'])){
			$valor=true;
			$retorno="";
	
			$validacion[0]=$o->set_cedula($_POST['cedula2']);
			$dato[0]="error en la validacion del cedula2";
			
			for ($i=0; $i <= 0 ; $i++) { 
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