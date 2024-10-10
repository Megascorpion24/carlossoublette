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
 //archivo de conecion para que funciuone 

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;




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



		$o = new inscripciones();
		if(!empty($_POST['accion'])){

			$valor=true;
			$retorno="";
			$validacion[0]=$o->set_cedula_repre($_POST['mibuscador']);
			$dato[0]="error en la validacion del mibuscador";
			$validacion[1]=$o->set_estudiante($_POST['estudiante']);
			$dato[1]="error en la validacion del estudiante";
			$validacion[2]=$o->set_cedula_estudiante($_POST['cedulae']);
			$dato[2]="error en la validacion del cedulae";
			$validacion[3]=$o->set_nombre_estudiante($_POST['nombree']);
			$dato[3]="error en la validacion del nombree";
			$validacion[4]=$o->set_apellido_estudiante($_POST['apellidoe']);
			$dato[4]="error en la validacion del apellidoe";
			$validacion[5]=$o->set_edad_estudiante($_POST['edade']);
			$dato[5]="error en la validacion del edade";
			$validacion[6]=$o->set_materia($_POST['materiae']);
			$dato[6]="error en la validacion del materiae";
			$validacion[7]=$o->set_observaciones($_POST['observacionese']);
			$dato[7]="error en la validacion del observacionese";
			$validacion[8]=$o->set_sangre($_POST['sangre']);
			$dato[8]="error en la validacion del sangre";
			$validacion[9]=$o->set_vacunas($_POST['vacunas']);
			$dato[9]="error en la validacion del vacunas";
			$validacion[10]=$o->set_operaciones($_POST['operaciones']);
			$dato[10]="error en la validacion del operaciones";
			$validacion[11]=$o->set_enfermedades($_POST['enfermedades']);
			$dato[11]="error en la validacion del enfermedades";
			$validacion[12]=$o->set_medicamentos($_POST['medicamentos']);
			$dato[12]="error en la validacion del medicamentos";
			$validacion[13]=$o->set_alerias($_POST['alerias']);
			$dato[13]="error en la validacion del alerias";
			$validacion[14]=$o->set_tratamiento($_POST['tratamiento']);
			$dato[14]="error en la validacion del tratamiento";
			$validacion[15]=$o->set_condicion($_POST['condicion']);
			$dato[15]="error en la validacion del condicion";
			$validacion[16]=$o->set_ano($_POST['ano']);
			$dato[16]="error en la validacion del ano";
			
			$o->set_nivel($nivel);
			for ($i=0; $i <= 14 ; $i++) { 
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
			
			
			$validacion[0]=$o->set_cedula_estudiante($_POST['cedula1']);
			$dato[0]="error en la validacion del cedula1";
			$validacion[1]=$o->set_nombre_estudiante($_POST['nombre1']);
			$dato[1]="error en la validacion del nombre1";
			$validacion[2]=$o->set_apellido_estudiante($_POST['apellido3']);
			$dato[2]="error en la validacion del apellido3";
			$validacion[3]=$o->set_edad_estudiante($_POST['edad1']);
			$dato[3]="error en la validacion del edad1";
			$validacion[4]=$o->set_materia($_POST['materia1']);
			$dato[4]="error en la validacion del materia1";
			$validacion[5]=	$o->set_observaciones($_POST['observaciones3']);
			$dato[5]="error en la validacion del observaciones3";
			$validacion[6]=$o->set_sangre($_POST['sangre1']);
			$dato[6]="error en la validacion del sangre1";
			$validacion[7]=$o->set_vacunas($_POST['vacunas1']);
			$dato[7]="error en la validacion del vacunas1";
			$validacion[8]=$o->set_operaciones($_POST['operaciones1']);
			$dato[8]="error en la validacion del operaciones1";
			$validacion[9]=$o->set_enfermedades($_POST['enfermedades1']);
			$dato[9]="error en la validacion del enfermedades1";
			$validacion[10]=$o->set_medicamentos($_POST['medicamentos1']);
			$dato[10]="error en la validacion del medicamentos1";
			$validacion[11]=$o->set_alerias($_POST['alerias1']);
			$dato[11]="error en la validacion del alerias1";
			$validacion[12]=$o->set_tratamiento($_POST['tratamiento1']);
			$dato[12]="error en la validacion del tratamiento1";
			$validacion[13]=$o->set_condicion($_POST['condicion1']);
			$dato[13]="error en la validacion del condicion1";
			$validacion[14]=$o->set_ano($_POST['ano1']);
			$dato[14]="error en la validacion del ano1";


			$o->set_nivel($nivel);
			for ($i=0; $i <= 14 ; $i++) { 
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

		  if(!empty($_POST['accionp'])){

			$valor=true;
			$retorno="";
			
			
			$validacion[0]=$o->set_cedula_repre($_POST['cedularp']);
			$dato[0]="error en la validacion del mibuscador";
			$validacion[1]=$o->set_estudiante("1");
			$dato[1]="error en la validacion del estudiante";
			$validacion[2]=$o->set_cedula_estudiante($_POST['cedulap']);
			$dato[2]="error en la validacion del cedulae";
			$validacion[3]=$o->set_nombre_estudiante($_POST['nombrep']);
			$dato[3]="error en la validacion del nombree";
			$validacion[4]=$o->set_apellido_estudiante($_POST['apellidop']);
			$dato[4]="error en la validacion del apellidoe";
			$validacion[5]=$o->set_edad_estudiante($_POST['edadp']);
			$dato[5]="error en la validacion del edade";
			$validacion[6]=$o->set_materia($_POST['materiap']);
			$dato[6]="error en la validacion del materiae";
			$validacion[7]=$o->set_observaciones($_POST['observacionesp']);
			$dato[7]="error en la validacion del observacionese";
			$validacion[8]=$o->set_sangre($_POST['sangrep']);
			$dato[8]="error en la validacion del sangre";
			$validacion[9]=$o->set_vacunas($_POST['vacunasp']);
			$dato[9]="error en la validacion del vacunas";
			$validacion[10]=$o->set_operaciones($_POST['operacionesp']);
			$dato[10]="error en la validacion del operaciones";
			$validacion[11]=$o->set_enfermedades($_POST['enfermedadesp']);
			$dato[11]="error en la validacion del enfermedades";
			$validacion[12]=$o->set_medicamentos($_POST['medicamentosp']);
			$dato[12]="error en la validacion del medicamentos";
			$validacion[13]=$o->set_alerias($_POST['aleriasp']);
			$dato[13]="error en la validacion del alerias";
			$validacion[14]=$o->set_tratamiento($_POST['tratamientop']);
			$dato[14]="error en la validacion del tratamiento";
			$validacion[15]=$o->set_condicion($_POST['condicionp']);
			$dato[15]="error en la validacion del condicion";
			$validacion[16]=$o->set_ano($_POST['anop']);
			$dato[16]="error en la validacion del ano";


			$o->set_nivel($nivel);
			for ($i=0; $i <= 16 ; $i++) { 
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


		  if(!empty($_POST['accion3'])){

			$valor=true;
			$retorno="";
			
			$validacion[0]=$o->set_cedula_estudiante($_POST['cedula3']);
	
			$dato[0]="error en la validacion del cedula3";
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
			
			
			$consuta=$o->consultar($nivel1,0);
			
			echo $consuta;
			exit;
			
			
		  }
		  if(!empty($_POST['consultaAno'])){

			if(isset($_SESSION['permisos'])){
				$nivel1 = $_SESSION['permisos'];
		   
			 }
			 else{
				 $nivel1 = "";
			 }
			
			
			$consuta=$o->consultar($nivel1, $_POST['consultaAno']);
			
			echo $consuta;
			exit;
			
			
		  }

		  $consuta=$o->consultar($nivel1, 0);
		  $consuta20=$o->consultar20(); 
		  $consuta1=$o->consultar1();
		  $consuta2=$o->consultar2();
		  $consuta3=$o->consultar3();
		  $consuta4=$o->consultar4();
		  $consuta5=$o->consulta5();
		  $consuta54=$o->consultar54();
		require_once("vista/".$pagina.".php");
	}
	else{
		echo "PAGINA EN CONSTRUCCION";
	}

//probando la excel
if(isset($_POST['save_excel_data']))
{
    $fileName = $_FILES['import_file']['name'];
    $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);

    $allowed_ext = ['xls','csv','xlsx'];

    if(in_array($file_ext, $allowed_ext))
    {
        $inputFileNamePath = $_FILES['import_file']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
        $data = $spreadsheet->getActiveSheet()->toArray();

        $count = "0";
        foreach($data as $row)
        {
            if($count > 0)
            {
			$cedula_repre = $row['0'];
			$o->set_cedula_repre($cedula_repre);
			
			$estudiante = $row['1'];
			$o->set_estudiante($estudiante);
			
			$cedula_estudiante = $row['2'];
			$o->set_cedula_estudiante1($cedula_estudiante);
			
			$nombre_estudiante = $row['3'];
			$o->set_nombre_estudiante1($nombre_estudiante);
			
			$apellido_estudiante = $row['4'];
			$o->set_apellido_estudiante1($apellido_estudiante);
			
			$edad_estudinate = $row['5'];
			$o->set_edad_estudiante1($edad_estudinate);
		
			$materia = $row['6'];
			$o->set_materia($materia);
		
			$observaciones = $row['7'];
			$o->set_observaciones($observaciones);
		
			$sangre = $row['8'];
			$o->set_sangre($sangre);
				
			$vacunas = $row['9'];
			$o->set_vacunas($vacunas);

			$opearaciones = $row['10'];
			$o->set_operaciones($opearaciones);

			$enfermedades = $row['11'];
			$o->set_enfermedades($enfermedades);

			$medicamento = $row['12'];
			$o->set_medicamentos($medicamento);

			$alergias = $row['13'];
			$o->set_alerias($alergias);

			$tratamiento = $row['14'];
			$o->set_tratamiento($tratamiento);

			$condicion = $row['15'];
			$o->set_condicion($condicion);

			$ano = $row['16'];
			if ($ano ==1) {
				$ano=32;
			}
			if ($ano ==2) {
				$ano=33;
			}
			if ($ano ==3) {
				$ano=34;
			}
			if ($ano ==4) {
				$ano=35;
			}
			
			$o->set_ano($ano);





			$consuta=$o->importar();
				echo $consuta;
			exit;

            }
            else
            {
                $count = "1";
            }
        }

	}
}




	
?>