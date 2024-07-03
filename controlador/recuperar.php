<?php 
require 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable("../carlossoublette/");
$dotenv->load(); 

if (!is_file("modelo/$pagina.php")) {
    echo "Falta definir la clase $pagina";
    exit;
}
require_once("modelo/$pagina.php");

if (is_file("vista/$pagina.php")) {
    if (!empty($_POST)) {
        $o = new Recuperar();
        if (preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?]*$/", $_POST['user'])) {
            $o->set_usuario($_POST['user']);
        }
        $resultado = $o->busca();
        $mensaje = $resultado ? "Se envió un mensaje de recuperación a su correo" : "El usuario ingresado no existe";
        if (!$resultado) echo $resultado;
    }
    require_once("vista/$pagina.php");
} else {
    echo "PÁGINA EN CONSTRUCCIÓN";
}
?>
