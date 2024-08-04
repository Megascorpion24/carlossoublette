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





		
		$o = new pagos();

  //<!----------------------------------------------------------------------------------------------------------------------------------------------------> 
  //<!---------------------------------------------------------------------------------------------------------------------------------------------------->          
  //<!----------------------------------------------------------------------------------------------------------------------------------------------------> 


  function obtenerPrecioBCVOnline($file) {
    $moneda = "bcv";
    $urlDolarBcv = "https://exchangemonitor.net/calculadora/usd-a-ves";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $urlDolarBcv);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $output = curl_exec($ch);
    curl_close($ch);

    file_put_contents($file, $output);
    $exchange = file_get_contents($file);

    $posI = strpos($exchange, '<meta name="description" content="');
    $posF = strpos($exchange, '" />') + 4;
    $string = substr($exchange, $posI + strlen('<meta name="description" content="'), $posF - $posI - strlen('<meta name="description" content="') - 4);
    $posI2 = strpos($string, 'equivale a');
    $string2 = substr($string, $posI2 + 10);
    $posF2 = strpos($string2, 'VES');
    $precio = trim(substr($string2, 0, $posF2));

    return $precio;
}
  




		if(!empty($_POST['accion'])){
	
			$valor=true;
			$retorno="";	
			$validacion[0]=$o->set_id_deudas($_POST['id_deudas']);
			$dato[0]="error en la validacion del id_deudas";
			$validacion[1]=$o->set_identificador($_POST['identificador']);
			$dato[1]="error en la validacion del identificador";
			$validacion[2]=$o->set_concepto($_POST['concepto']);
			$dato[2]="error en la validacion del concepto";
			$validacion[3]=$o->set_forma($_POST['forma0']);
			$dato[3]="error en la validacion del forma";
			$fecha_actual = date("Y-m-d");
			$validacion[4]=$o->set_fecha($fecha_actual);		 
			$dato[4]="error en la validacion del fecha";
			$validacion[5]=$o->set_fechad($_POST['fecha0']);		 
			$dato[5]="error en la validacion del fechad";
			$validacion[6]=$o->set_monto($_POST['monto']);
			$dato[6]="error en la validacion del monto";
			$validacion[7]=$o->set_meses($_POST['meses']);
			$dato[7]="error en la validacion del meses";
			$validacion[8]=$o->set_estado($_POST['estado']);
			$dato[8]="error en la validacion del estado";			
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
  //<!----------------------------------------------------------------------------------------------------------------------------------------------------> 
  //<!---------------------------------------------------------------------------------------------------------------------------------------------------->          
  //<!----------------------------------------------------------------------------------------------------------------------------------------------------> 		











	
		  if(!empty($_POST['accionr'])){

			$valor=true;
			$retorno="";		
			$validacion[0]=$o->set_id_deudas($_POST['id_deudasr']);
			$dato[0]="error en la validacion del id_deudasr";
			$validacion[1]=$o->set_identificador($_POST['identificadorr']);
			$dato[1]="error en la validacion del identificadorr";
			$validacion[2]=$o->set_concepto($_POST['conceptor']);
			$dato[2]="error en la validacion del conceptor";
			$validacion[3]=$o->set_forma($_POST['formar0']);
			$dato[3]="error en la validacion del formar";
			$fecha_actual = date("Y-m-d");
			$validacion[4]=$o->set_fecha($fecha_actual);			
			$dato[4]="error en la validacion del fechar";
			$validacion[5]=$o->set_fechad($_POST['fechar0']);		 
			$dato[5]="error en la validacion del fechadr";
			$validacion[6]=$o->set_monto($_POST['montor']);
			$dato[6]="error en la validacion del montor";
			$validacion[7]=$o->set_meses($_POST['mesesr']);
			$dato[7]="error en la validacion del mesesr";
			$validacion[8]=$o->set_estado($_POST['estador']);
			$dato[8]="error en la validacion del id_deudasr";
			$o->set_nivel($nivel);
			
			for ($i=0; $i <= 8 ; $i++) { 
				if ($validacion[$i]== false) {
					$retorno=$retorno.$dato[$i]."<br>";
					$valor=false;
				}
			}
			if ($valor==true) {
				$mensaje = $o->registrarr();
				echo $mensaje;
			}else{
				echo $retorno;
			}			
			exit;		
		}
  //<!----------------------------------------------------------------------------------------------------------------------------------------------------> 
  //<!---------------------------------------------------------------------------------------------------------------------------------------------------->          
  //<!----------------------------------------------------------------------------------------------------------------------------------------------------> 









		  if(!empty($_POST['accion1'])){
		
			$valor=true;
			$retorno="";	
			$validacion[0]=$o->set_id_deudas($_POST['id_deudasM']);
			$dato[0]="error en la validacion del id_deudasM";
			$validacion[1]=$o->set_identificador($_POST['identificadorM']);
			$dato[1]="error en la validacion del identificadorM";
			$validacion[2]=$o->set_concepto($_POST['conceptoM']);
			$dato[2]="error en la validacion del conceptoM";
			$validacion[3]=$o->set_forma($_POST['formaM0']);
			$dato[3]="error en la validacion del formaM";
			$validacion[4]=$o->set_fechad( $_POST['fechaM0']);				
			$dato[4]="error en la validacion del fechaM";
			$validacion[5]=$o->set_monto($_POST['montoM']);
			$dato[5]="error en la validacion del montoM";
			$validacion[6]=$o->set_estado($_POST['estadoM']);
			$dato[6]="error en la validacion del estadoM";
			$validacion[7]=$o->set_id($_POST['idM']);
			$dato[7]="error en la validacion del idM";			
			$o->set_nivel($nivel);

			for ($i=0; $i <= 7 ; $i++) { 
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
  //<!----------------------------------------------------------------------------------------------------------------------------------------------------> 
  //<!---------------------------------------------------------------------------------------------------------------------------------------------------->          
  //<!----------------------------------------------------------------------------------------------------------------------------------------------------> 	
  
  





		if(!empty($_POST['accionp'])){
			
			$valor=true;
			$retorno="";	
			$validacion[0]=$o->set_id($_POST['idp']);
			$dato[0]="error en la validacion del idp";
			$validacion[1]=$o->set_id_deudas($_POST['id_deudasp']);
			$dato[1]="error en la validacion del id_deudasp";
			$validacion[2]=$o->set_identificador($_POST['identificadorp']);
			$dato[2]="error en la validacion del identificadorp";
			$validacion[3]=$o->set_fecha($_POST['fechap']);		 
			$dato[3]="error en la validacion del fechap";
			$validacion[4]=$o->set_fechad($_POST['fechadp0']);		 
			$dato[4]="error en la validacion del fechadp";
			$validacion[5]=$o->set_concepto($_POST['conceptop']);
			$dato[5]="error en la validacion del conceptop";
			$validacion[6]=$o->set_forma($_POST['formap0']);
			$dato[6]="error en la validacion del formap";
			$validacion[7]=$o->set_monto($_POST['montop']);
			$dato[7]="error en la validacion del montop";
			$validacion[8]=$o->set_meses($_POST['mesesp']);
			$dato[8]="error en la validacion del mesesp";
			$validacion[9]=$o->set_estado($_POST['estadop']);
			$dato[9]="error en la validacion del estadop";
			$validacion[10]=$o->set_estado_pagos($_POST['estado_pagosp']);
			$dato[10]="error en la validacion del estado_pagosp";	
			$validacion[11]=$o->set_estatus($_POST['estatusp']);
			$dato[11]="error en la validacion del estatusp";	
			$o->set_nivel($nivel);

			for ($i=0; $i <= 11 ; $i++) { 
				if ($validacion[$i]== false) {
					$retorno=$retorno.$dato[$i]."<br>";
					$valor=false;
				}
			}

			if ($valor==true) {
				$mensaje = $o->registrarp();
				echo $mensaje;
			}else{
				echo $retorno;
			}			
			exit;	
}
//<!----------------------------------------------------------------------------------------------------------------------------------------------------> 
//<!---------------------------------------------------------------------------------------------------------------------------------------------------->          
//<!----------------------------------------------------------------------------------------------------------------------------------------------------> 





  if(!empty($_POST['accionMM'])){
		
	$valor=true;
	$retorno="";	
	$validacion[0]=$o->set_codigo($_POST['codigoMM']);
	$dato[0]="error en la validacion del codigo";
	$validacion[1]=$o->set_tipo($_POST['tipoMM']);
	$dato[1]="error en la validacion del tipo";
	$validacion[2]=$o->set_m_montos($_POST['m_montosMM']);
	$dato[2]="error en la validacion de montos Bs";
	$validacion[3]=$o->set_d_montos($_POST['d_montosMM']);
	$dato[3]="error en la validacion de montos $";
			
	$o->set_nivel($nivel);

	for ($i=0; $i <= 3 ; $i++) { 
		if ($validacion[$i]== false) {
			$retorno=$retorno.$dato[$i]."<br>";
			$valor=false;
		}
	}

	if ($valor==true) {
		$mensaje = $o->montos();
		echo $mensaje;
	}else{
		echo $retorno;
	}			
	exit;			
}
//<!----------------------------------------------------------------------------------------------------------------------------------------------------> 
//<!---------------------------------------------------------------------------------------------------------------------------------------------------->          
//<!----------------------------------------------------------------------------------------------------------------------------------------------------> 	


 

		  if(!empty($_POST['accion3'])){

			$valor=true;
			$retorno="";	
			$validacion[0]=$o->set_id($_POST['idE']);	
			$dato[0]="error en la validacion del idE";
			
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
  //<!----------------------------------------------------------------------------------------------------------------------------------------------------> 
  //<!---------------------------------------------------------------------------------------------------------------------------------------------------->          
  //<!----------------------------------------------------------------------------------------------------------------------------------------------------> 




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
	
		/*$var=$o->dolar();*/



		  	/* aqui estan las cosas del tutor*/ 
		if($_SESSION["rol"]=="1"){
			$consutar=$o->consultarr($_SESSION["usuario"]);
			$consutat=$o->consultart($_SESSION["usuario"]);

		}else{/* aqui estan las cosas del super usuario*/ 
				$consuta=$o->consultar($nivel1);		
				$consuta3=$o->consultar3($nivel1);
				$consuta2=$o->consultar2($nivel1);				
		}	
		$consutamonto=$o->consultamonto($nivel1);

		require_once("vista/".$pagina.".php");
	
	
	}

	
?>  