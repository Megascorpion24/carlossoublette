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
		
			$resultado = $o->busca();
			if ($resultado) {
				$correo = $resultado[0];
   				 $clave = $resultado[1];
				$mail = new PHPMailer(true);

try {
    
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp-mail.outlook.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'santiagocasamayor14@hotmail.com';                     //SMTP username
    $mail->Password   = 'Santi2002.30019081';                               //SMTP password
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('santiagocasamayor14@hotmail.com', 'SISTEMA GPUECCS');
    $mail->addAddress($correo, $correo);     //Add a recipient
      

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Recuperacion de clave';
    $mail->Body    = 'Hola! este link te enviara a la ventana donde podras cambiar tu clave, recuerda no compartir tu nueva clave con nadie http://localhost/git_proyecto/carlossoublette/?pagina=cambiar&clave='.$clave.'';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "usuario ingresado no existe";
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