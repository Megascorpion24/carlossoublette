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

		$o = new bitacora();
		

		  $consuta=$o->consultar($nivel1);
		require_once("vista/".$pagina.".php");
	}
	else{
		echo "PAGINA EN CONSTRUCCION";
	}

?>