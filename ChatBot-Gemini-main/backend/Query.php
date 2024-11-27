<?php

// Visualizacion de Errores en Network --Solo en via de desarrollo--
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json'); 

// Iniciar la sesión
session_start();

function retornar(array $array) {
    echo json_encode($array);
}

if ( $_POST['ajaxPet_ChatBot'] && !empty($_COOKIE['token']) ) {
    // echo"entro buscando ..";

     switch ($_POST['Peticion']) {
        case 'Key':
            retornar([
                //Nota devemos distribuir un token para cada Usuario o Roles
                
                // 'apiKey' => "AIzaSyAqtFhT57K2SCavh33uXLdMc1KA3IsAVN4"  // yeissoncolmenarez@gmail.com
                'apiKey' => "AIzaSyAfkpxdQV6oBcSvGozc1d5lp36WCAd2MbY"  // De santiago
            ]);
            //...
            break;

        case 'Datos_Usuario':
            $dataUser=[
                "id"=> $_SESSION['usuario'],
                "name"=>  $_SESSION['nombre'],
                "roles"=> $_SESSION['rol'],
                "ModulosAcceso"=>  $_SESSION['permisos'],
            ];
        
            retornar($dataUser);
            //...
            break;
            
        default: retornar(["error" => "Petición no encontrada"]);
            #...
            break;
     }
    
}
else {
    retornar(["error" => "No se recibió la clave esperada o falta el token."]);
}