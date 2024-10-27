<?php

function encryptData($data) {
    // $file = 'key/public.key';
    $file = __DIR__ .'/key/public.key';

    // $file = '../api/auth/key/public.key';
      $publicKey = openssl_pkey_get_public(file_get_contents($file));

      // Encriptar con llave publica
    if (is_array($data)) {
        return array_map(function($element) use ($publicKey) {

            if (!openssl_public_encrypt($element, $encryptedData, $publicKey)) {
                throw new Exception("Error al encriptar los datos: " . openssl_error_string());
            }
            /* Codificación en base64: base64_encode($encryptedData) se asegura de que los datos encriptados sean codificados en base64 antes de ser devueltos, lo que facilita su almacenamiento y transmisión.*/
            return base64_encode($encryptedData);
        }, $data);
    }
    else{
        if(!openssl_public_encrypt($data, $encryptData, $publicKey)){
            throw new Exception("Error al encriptar los datos: " . openssl_error_string());
        }
        // return $encryptData);
        return base64_encode($encryptData);

    }
  
    
}

function decryptData($data) {
    $file = __DIR__ .'/key/private.key';
    // $file = '../api/auth/key/private.key';
    
    // Desencriptar con llave privada
    $privKey = openssl_pkey_get_private(file_get_contents($file));
    openssl_private_decrypt($data, $decryptData, $privKey);
    
    return $decryptData;
}
 
// $data = json_decode(file_get_contents("php://input"));
// // Verifica si se recibieron los datos de usuario y contraseña
// if (isset($data->dato_encriptado)) {
//     $dato = base64_decode($data->dato_encriptado);
//     $r=decryptData($dato);
//     echo json_encode($r);
// }



// $data = json_decode(file_get_contents("php://input"));
// // Verifica si se recibieron los datos de usuario y contraseña
// if (isset($data->clave)) {
//     try {
//     echo json_encode([
//         "codigo"=> encryptData($data->clave)
//     ]);
//     } catch (Exception $e) {
//         return $e;
//     }
    
// }
// if (isset($data->user) && isset($data->password)) {
//     try {
//     echo json_encode([
//         "user"=> encryptData($data->user),
//         "password"=> encryptData($data->password)
//     ]);
//     } catch (Exception $e) {
//         return $e;
//     }
    
// }


?>