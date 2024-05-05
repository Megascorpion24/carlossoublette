<?php
	$regExps = array(
        'nameInputs' => array('/^[A-Za-z-Á-Ú-á-ú]*$/', 'Nombres no pueden contener caracteres especiales o númericos.')
    );  

    function validate_string($regex, $string) {
        global $regExps;

        if (!preg_match($regExps[$regex][0], $string)) {
            throw new Exception($regExps[$regex][1]);
        }

        return $string;
    }

?>