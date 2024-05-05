<?php

function encryptData($data) {
    $file = 'key/public.key';
    
    // Encriptar con llave privada
    $publicKey = openssl_pkey_get_public(file_get_contents($file));
    openssl_public_encrypt($data, $encryptData, $publicKey);
    
    return $encryptData;
}

function decryptData($data) {
    $file = 'key/private.key';
    
    // Desencriptar con llave privada
    $privKey = openssl_pkey_get_private(file_get_contents($file));
    openssl_private_decrypt($data, $decryptData, $privKey);
    
    return $decryptData;
}

?>