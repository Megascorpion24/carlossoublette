<?php 
    /*  Material:
        A partir de PHP 5.4 también se puede usar la sintaxis de array corta, la cual reemplaza array() con [].
        https://www.w3schools.com/php/php_variables_scope.asp
    */
	$regExps = [   
        'cedula' => array('/^[0-9]{5,8}$/', "Formato de cedula incorrecto"),
        'name' => array('/^[A-Za-zÁáÉéÍíÓóÚúÑñ\s]{3,15}/', 'Nombres no pueden contener caracteres especiales o númericos.'),
        'nameMateria' => array('/^[A-Za-zÁáÉéÍíÓóÚúÑñ\s]{5,25}/', 'Nombres no pueden contener caracteres especiales o númericos.'),
        'año' => array('/^[0-9]{1,3}$/', 'El año no es valido'),
        'email' => array('/^[\w\.-]+@[\w\.-]+\.\w{2,4}$/', 'Correo invalido.'),
        'telefono' => array('/^[0-9]{4}[0-9]{7}$/', 'Telefono invalido.'),
        'text' => array('/^[A-Za-z-Á-Ú-á-ú0-9-,.() ]*$/', 'Campo de texto ivnalido.'),
        'fechaEvento' => array('/^\d{4}-\d{2}-\d{2}T\d{2}:\d{2}$/', 'La fecha que ha ingresado no es válida')
    ];  

    //---Main---
    function validate_value($regex, $value) {
        global $regExps;
        
            //array/clave/valor[exprecion regular]
        if (!preg_match($regExps[$regex][0], $value)) {
                            //array/clave/valor[msj]
            throw new Exception($regExps[$regex][1]);
        }

        return $value;
    }

    //----Otros tipos de Validaciones---
    function validate_fecha() {
             // Actualizamos el formato de entrada para que coincida con el del input datetime-local
            $fecha = DateTime::createFromFormat('Y-m-d\TH:i', $string);
            $fechaActual = new DateTime();
        
            if ($fecha < $fechaActual) {
                throw new Exception($regExps[$regex][1]);
            } 
    }

    function validarDocentesFormulario($regex, $docentes) {
        return array_map(function($docente) use ($regex) {
            return validate_value($regex, $docente);
        }, $docentes);
    }
    
    //-----Login(opcional)------
?>

