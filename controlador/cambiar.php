<?php 
require 'vendor/autoload.php';


if (!is_file("modelo/".$pagina.".php")){
	
	echo "Falta definir la clase ".$pagina;
	exit;
}
require_once("modelo/".$pagina.".php"); 

$o = new cambiar();

	if(is_file("vista/".$pagina.".php")){
		
	$dato =$_GET['token'];
		$o->set_url($dato);
		$expiracion=$o->expiracion();
		if ($expiracion === "token expirado") {
			// El token ha expirado, puedes mostrar un mensaje de error o redirigir al usuario a la página de inicio de sesión
			header('Location:index.php');
		} elseif ($expiracion === "token valido") {
			// El token es válido, puedes continuar con la sesión del usuario
		
		} else {
			// Si el mensaje devuelto no es "token expirado" ni "token valido", puedes mostrar un mensaje de error
			echo "Ha ocurrido un error";
		}
			
		
		if (!empty($_POST)) {
		
			if (preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?]*$/", $_POST['password'])) {
				$o->set_clave($_POST['password']);
			}
			if (preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?]*$/", $_POST['url'])) {
				$o->set_url($_POST['url']);
			}
		
			 $o->cambiar();
			
		
			header('Location:index.php');
			
		}
		




		require_once("vista/".$pagina.".php");
	}
	else{
		echo "PAGINA EN CONSTRUCCION";
	}

?>