<?php

function decryptUrl($encoded_encrypted_url, $encoded_key) {
    // Método de encriptación (debe ser el mismo que el utilizado para encriptar)
    $method = "AES-256-CBC";

    // Decodificar la clave y la URL encriptada desde base64
    $key = base64_decode($encoded_key);
    $encrypted_url = urldecode($encoded_encrypted_url);
    list($encrypted_data, $iv) = explode('::', base64_decode($encrypted_url), 2);

    // Decodificar el IV desde base64
    $iv = base64_decode($iv);

    // Desencriptar la URL
    $decrypted_url = openssl_decrypt($encrypted_data, $method, $key, 0, $iv);

    return $decrypted_url;
}


$pagina = "login";

if (!empty($_GET['pagina'])&& $_GET['pagina']!== "manual") {
    if (isset($_GET['pagina']) && isset($_GET['key'])) {
        $encoded_encrypted_url = $_GET['pagina'];
        $encoded_key = $_GET['key'];

        $decrypted_url = decryptUrl($encoded_encrypted_url, $encoded_key);

        if ($decrypted_url !== false) {
            // Redirigir a la URL desencriptada
            $pagina = $decrypted_url;
        } else {
            echo "Error al desencriptar la URL.";
        }
    } else {
        echo "No se proporcionó una URL o clave encriptada.";
    }
}else if($pagina !== "login"){
	$pagina = $_GET['pagina'];
}

if (is_file("controlador/" . $pagina . ".php")) {
    require_once("controlador/" . $pagina . ".php");
} else {
    echo "PAGINA EN CONSTRUCCION";
}
?>