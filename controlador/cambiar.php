<?php 
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


if (!is_file("modelo/".$pagina.".php")){
	
	echo "Falta definir la clase ".$pagina;
	exit;
}
require_once("modelo/".$pagina.".php"); 


	if(is_file("vista/".$pagina.".php")){

		
		if (!empty($_POST)) {
			$o = new cambiar();
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