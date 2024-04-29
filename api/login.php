<?php

require_once('./class/login.php');
$login = new login();

   
$data = json_decode(file_get_contents("php://input"));

// Verifica si se recibieron los datos de usuario y contraseña
if (isset($data->user) && isset($data->password)) {
       
    // Crea una instancia de la clase entrada
    // Establece los valores de usuario y contraseña
    $username = $data->user;
    $password = $data->password;
    
    $login->set_usuario($username);
    $login->set_clave($password);

    $resultado = $login->busca();
    // $resultado = busca();
    $mensaje="";
	$entrada= true;
    //VALIDA USUARIO 
    if(empty($resultado[1])){
        $entrada= false;
        $mensaje="El Usuario ingresado es incorrecto";
        echo $mensaje;			
    } else {
        //VALIDA CLAVE
        $verifica = password_verify($password, $resultado[0]);
        if (!$verifica) {
            	$entrada= false;
            $mensaje = "La Contraseña ingresada es incorrecta";
            echo $mensaje;
        }
    }

    if($entrada == true && $resultado[1] !== 3){
        $entrada= false;
        $mensaje = "El Usuario no es un Administrador";
        echo $mensaje;
    }
  
    // Si el resultado es verdadero, enviar respuesta JSON
    if ($entrada) {
        // Construir el array asociativo para la respuesta JSON
        $respuesta = array(
            'entrada' => $entrada,
            'resultado' => $resultado[2]
        );

        // Convertir el array asociativo a JSON y enviarlo como respuesta
        echo json_encode($respuesta);
    }
   
   
} 

?>
