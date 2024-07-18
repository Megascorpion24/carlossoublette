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
		$o = new usuarios();
		if(!empty($_POST['accion'])){


			$valor=true;
			$retorno="";
			$validacion[0]=$o->set_nombre($_POST['nombre']);
			$dato[0]="error en la validacion del nombre";
			$validacion[1]=$o->set_rol($_POST['rol']);
			$dato[1]="error en la validacion del rol";
			$validacion[2]=$o->set_correo($_POST['correo']);
			$dato[2]="error en la validacion del correo";
			$validacion[3]=$o->set_contraceña($_POST['contraceña']);
			$dato[3]="error en la validacion del contraceña";
			$validacion[4]=$o->set_cedula($_POST['cedula']);
			$dato[4]="error en la validacion de la cedula";
			
			
			
			
			
			$o->set_nivel($nivel);
			for ($i=0; $i <= 4 ; $i++) { 
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
			$validacion[0]=$o->set_nombre($_POST['nombre1']);
			$dato[0]="error en la validacion del nombre1";
			$validacion[1]=$o->set_rol($_POST['rol1']);
			$dato[1]="error en la validacion del rol1";
			$validacion[2]=$o->set_correo($_POST['correo1']);
			$dato[2]="error en la validacion del correo1";
			$validacion[3]=$o->set_contraceña($_POST['contraceña2']);
			$dato[3]="error en la validacion del contraceña2";
			
			$validacion[4]=$o->set_cedula($_POST['id']);
			$dato[4]="error en la validacion del cedula";
			
			
			$o->set_nivel($nivel);
			for ($i=0; $i <= 4 ; $i++) { 
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
			$validacion[0]=$o->set_cedula($_POST['id1']);
			$dato[0]="error en la validacion del id1".$_POST['id1'];
				
			
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
		  $rol=$o->roles();

		  $consuta=$o->consultar($nivel1);
		require_once("vista/".$pagina.".php");
	}
	else{
		echo "PAGINA EN CONSTRUCCION";
	}

?>