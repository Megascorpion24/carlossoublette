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
			$o = new Recuperar();
			if (preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?]*$/", $_POST['user'])) {
				$o->set_usuario($_POST['user']);
			}
		
			$resultado2 = $o->busca();
			if ($resultado2) {
				$correo = $resultado2[0];
   				 $token = $resultado2[1];
				$mail = new PHPMailer(true);

try {
    
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp-mail.outlook.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'colegioclave@hotmail.com';                     //SMTP username
    $mail->Password   = 'Sistema2024.';                               //SMTP password
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('colegioclave@hotmail.com', 'SISTEMA GPUECCS');
    $mail->addAddress($correo, $correo);     //Add a recipient
      

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Recuperacion de clave';
    $mail->Body    = 'Hola! este link te enviara a la ventana donde podras cambiar tu clave, recuerda no compartir tu nueva clave con nadie http://localhost/git_proyecto/carlossoublette/?pagina=cambiar&token='.$token.'';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    $mensaje = "Se ha enviado un mensaje al correo afiliado al usuario!";
} catch (Exception $e) {
    $mensaje = "usuario ingresado no existe";
}
			} else {
				$mensaje = "El usuario ingresado no existe";
			}
		
			// Mostrar el mensaje de error en la vista
			
		}
		




		require_once("vista/".$pagina.".php");
	}
	else{
		echo "PAGINA EN CONSTRUCCION";
	}

?>