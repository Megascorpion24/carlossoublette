<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

trait Envio_Correo{

    public function Correo(){
		
try {
    global $mail;
		// $mail = new PHPMailer(true);
    
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = $_ENV['HOST'];                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = $_ENV['USER'];                     //SMTP username
    $mail->Password   = $_ENV['PASS'] ;  
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;                        //SMTP password
    $mail->Port       = $_ENV['PORT'] ;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($_ENV['USER'], 'SISTEMA GPUECCS');
    $mail->addAddress($this->correo, $this->correo);     //Add a recipient
      

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Recuperacion de clave';
    // $mail->Body    = 'Hola! este link te enviara a la ventana donde podras cambiar tu clave, recuerda no compartir tu nueva clave con nadie http://localhost/git_proyecto/carlossoublette/?pagina=cambiar&token='.$token.'';
	$mail->Body = '
    <p>Hola!</p>
    <p><strong>Recuperación por Web:</strong></p>
    <p>Este link te enviará a la ventana donde podrás cambiar tu clave, recuerda no compartir tu nueva clave con nadie:</p>
    <p>http://localhost/git_proyecto/carlossoublette/?pagina=cambiar&token=' . $this->token . '</p>
    <p><strong>Recuperación por Aplicación:</strong></p>
    <p style="text-align: center; font-size: 18px; font-weight: bold; margin-top: 20px; padding: 10px; border: 1px solid #ccc; background-color: #f9f9f9;">' . $this->codigo . '</p>
	';
	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    return true;
} catch (Exception $e) {
    return $e;
}
	

    }
}

?>