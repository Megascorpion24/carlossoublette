<?php
// require_once('../../modelo/conexion.php');
require_once('../../modelo/materia.php');
$obj=new materias();
 
// echo "conectado";
if (isset($_POST['ajaxPet']) && isset($_POST['action']) && $_POST['action'] == 'getData') {
    try {
      $nombre=$_POST['nombre'];
      $ano= $_POST['ano'];

        // echo "entro".$ano;

        $resultado= $obj->exists($nombre, $ano);

        if($resultado == true){
            echo"1";
        } 
        else{
            echo "0";
        }

    } catch (PDOException $e) {
        // Manejar errores de la base de datos
        echo "Error en la consulta: " . $e->getMessage();
    }
}

if (isset($_POST["term"])) {
    // Realiza la consulta a la base de datos utilizando $term
    // Realiza la consulta a la base de datos y obtiene resultados
    $resultados =  $obj->consultar_materias();

    // Convierte los resultados a formato JSON y envíalos
    echo json_encode($resultados);
    // echo $resultados;
}


?>
