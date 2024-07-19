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
require 'vendor/autoload.php';


if (!is_file("modelo/" . $pagina . ".php")) {

	echo "Falta definir la clase " . $pagina;
	exit;
}
require_once("modelo/" . $pagina . ".php");

if (is_file("vista/" . $pagina . ".php")) {


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

	$o = new mantenimiento();



	if (isset($_POST['respaldo'])) {
		//$fileName = $_FILES['import_file']['name'];
		//$file_ext = pathinfo($fileName, PATHINFO_EXTENSION);
		//if(in_array($file_ext, $allowed_ext)){
		//	$inputFileNamePath = $_FILES['import_file'];

		$o->respaldo();
		//}
	}

	if (isset($_POST['restaurar'])) {
		$fileName = $_FILES['import_file']['name'];
		$file_ext = pathinfo($fileName, PATHINFO_EXTENSION);

		$allowed_ext = ['sql'];
		if (empty($fileName)) {
			echo "<script type='text/javascript'>alert(' eEl archivo no puede estar vacío.');</script>";
		} elseif (!in_array($file_ext, $allowed_ext)) {
			echo "<script type='text/javascript'>alert(' el archivo enviado no es una base de datos SQL.');</script>";
		} else {
			$inputFileNamePath = $_FILES['import_file']['tmp_name'];
			$o->importarBaseDatos($inputFileNamePath);
		}
	}
	require_once("vista/" . $pagina . ".php");
} else {
	echo "PAGINA EN CONSTRUCCION";
}
