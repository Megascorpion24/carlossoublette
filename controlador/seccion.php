<?php 


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
		
		$o = new secciones();
        
        // Registro (f)
		if(!empty($_POST['accion'])){

			
			$o->set_id($_POST['id']);
			$o->set_secciones($_POST['secciones']);
			$o->set_ano($_POST['año']);
			$o->set_cedula_profesor($_POST['Doc_Guia']);				
			$o->set_ano_academico($_POST['ano_academico']);
			$o->set_cantidad($_POST['cantidad']);


			$o->set_nivel($nivel);
			$mensaje = $o->registrar();
			echo $mensaje;
			exit;			
		  }

		

 
		  // Editar (f2)
if (!empty($_POST['id_edit'])) {
	$o->set_id($_POST['id1']);
	$o->set_secciones($_POST['secciones1']);
	$o->set_ano($_POST['año1']);
	$o->set_cedula_profesor($_POST['Doc_Guia1']);
	$o->set_cantidad($_POST['cantidad_e']);

   
		$o->set_nivel($nivel);
    $mensaje = $o->modificar();
    echo $mensaje;
    exit;
}




		if(!empty($_POST['accion3'])){
	
			if (preg_match("/^[0-9]{1,5}$/",$_POST['id2'] )) {
				$o->set_id($_POST['id2']);
					
			}			
			$o->set_nivel($nivel);
			$mensaje = $o->eliminar();			
			echo $mensaje;
			exit;			
		  }
		 

           //Consulta (f4)
		  if(!empty($_POST['consulta'])){

			if(isset($_SESSION['permisos'])){
				$nivel1 = $_SESSION['permisos'];
		   
			 }
			 else{
				 $nivel1 = "";
			 }
			

			$consulta=$o->consultar($nivel1);
			echo $consulta;
			exit;
		  }
	 

		$consulta=$o->consultar($nivel1);
		  $abc=$o->abc();//A,B,C
		  $Año=$o->Año();
		  $Doc_Guia=$o->Doc_Guia();
		  $academico=$o->academico();
		  $Edit_Año=$o->Edit_Año();


		require_once("vista/".$pagina.".php");

	}
    else{
		echo "PAGINA EN CONSTRUCCION";
	}

	

?>