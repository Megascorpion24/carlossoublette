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

		$o = new docente();
		if(!empty($_POST['accion'])){
			$valor=true;
			$retorno="";

			$validacion[0]=$o->set_cedula($_POST['cedula']);
			$dato[0]="error en la validacion del cedula";
			$validacion[1]=$o->set_nombre($_POST['nombre']);
			$dato[1]="error en la validacion del nombre";
			$validacion[2]=$o->set_apellido($_POST['apellido']);
			$dato[2]="error en la validacion del apellido";
			$validacion[3]=$o->set_categoria($_POST['categoria']);
			$dato[3]="error en la validacion del categoria";
			$validacion[4]=$o->set_fecha($_POST['fecha']);
			$dato[4]="error en la validacion del fecha";
			$validacion[5]=$o->set_especializacion($_POST['especializacion']);
			$dato[5]="error en la validacion del especializacion";
			$validacion[6]=$o->set_profecion($_POST['profecion']);
			$dato[6]="error en la validacion del profecion";
			$validacion[7]=$o->set_edad($_POST['edad']);
			$dato[7]="error en la validacion del edad";
			$validacion[8]=$o->set_años($_POST['años']);
			$dato[8]="error en la validacion del años";
			$validacion[9]=$o->set_correo($_POST['correo']);
			$dato[9]="error en la validacion del correo";
			$validacion[10]=$o->set_direccion($_POST['direccion']);
			$dato[10]="error en la validacion del direccion";


			
			
			
			$o->set_nivel($nivel);
			for ($i=0; $i <= 10 ; $i++) { 
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
			$dato[0]="error en la validacion del cedula";
			$validacion[1]=$o->set_nombre($_POST['nombre1']);
			$dato[1]="error en la validacion del nombre";
			$validacion[2]=$o->set_apellido($_POST['apellido1']);
			$dato[2]="error en la validacion del apellido";
			$validacion[3]=$o->set_categoria($_POST['categoria1']);
			$dato[3]="error en la validacion del categoria";
			$validacion[4]=$o->set_fecha($_POST['fecha1']);
			$dato[4]="error en la validacion del fecha";
			$validacion[5]=$o->set_especializacion($_POST['especializacion1']);
			$dato[5]="error en la validacion del especializacion";
			$validacion[6]=$o->set_profecion($_POST['profecion1']);
			$dato[6]="error en la validacion del profecion";
			$validacion[7]=$o->set_edad($_POST['edad1']);
			$dato[7]="error en la validacion del edad";
			$validacion[8]=$o->set_años($_POST['años1']);
			$dato[8]="error en la validacion del años";
			$validacion[9]=$o->set_correo($_POST['correo1']);
			$dato[9]="error en la validacion del correo";
			$validacion[10]=$o->set_direccion($_POST['direccion1']);
			$dato[10]="error en la validacion del direccion";


			
			
			
			$o->set_nivel($nivel);
			for ($i=0; $i <= 10 ; $i++) { 
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

			if (preg_match("/^[0-9]{7,8}$/", $_POST['cedula2'])) {
				$o->set_cedula($_POST['cedula2']);
			}
			
			$o->set_nivel($nivel);
			$mensaje = $o->eliminar();
			
			echo $mensaje;
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
	}
	else{
		echo "PAGINA EN CONSTRUCCION";
	}

?>