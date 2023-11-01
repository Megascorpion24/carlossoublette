<?php 

if (!is_file("modelo/".$pagina.".php")){
	
	echo "Falta definir la clase ".$pagina;
	exit;
}
require_once("modelo/".$pagina.".php"); 


	if(is_file("vista/".$pagina.".php")){





		
		$o = new ano_academico();
		if(!empty($_POST['accion'])){
		
			$valor=true;
			$retorno="";
			
			$validacion[1]=$o->set_fecha_ini($_POST['fecha_ini']);
			$dato[1]="error en la validacion del fecha_ini";
			$validacion[2]=$o->set_fecha_cierr($_POST['fecha_cierr']);
			$dato[2]="error en la validacion del fecha_cierr";
			$validacion[3]=$o->set_lapso($_POST['lapso']);
			$dato[3]="error en la validacion del lapso";
			$validacion[4]=$o->set_ano_academico($_POST['ano_academico']);
			$dato[4]="error en la validacion del ano_academico";
			for ($i=1; $i <= 3 ; $i++) { 
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
			
			$validacion[1]=$o->set_fecha_ini($_POST['fecha_ini1']);
			$dato[1]="error en la validacion del fecha_ini";
			$validacion[2]=$o->set_fecha_cierr($_POST['fecha_cierr1']);
			$dato[2]="error en la validacion del fecha_cierr";
			$validacion[3]=$o->set_lapso($_POST['lapso1']);
			$dato[3]="error en la validacion del lapso";
			$validacion[4]=$o->set_ano_academico($_POST['ano_academico1']);
			$dato[4]="error en la validacion del ano_academico";
			$validacion[5]=$o->set_id($_POST['id1']);
			$dato[5]="error en la validacion del id";
			for ($i=1; $i <= 5 ; $i++) { 
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
			$validacion[1]=$o->set_id($_POST['id2']);
			$dato[1]="error en la validacion del id";
			
			for ($i=1; $i <= 1 ; $i++) { 
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
	
			$consuta=$o->consultar();
			echo $consuta;
			exit;
		  }


		$consuta=$o->consultar();


		if(!empty($_POST['eventos'])){
	
			$evento=$o->eventos();
			echo ($evento);
			exit;
		  }

		  
		  $evento=$o->eventos();

		require_once("vista/".$pagina.".php");



	}else{
		echo "PAGINA EN CONSTRUCCION";
	}

?>