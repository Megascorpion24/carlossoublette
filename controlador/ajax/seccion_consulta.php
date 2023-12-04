<?php

require_once('../../modelo/seccion.php');
 
$obj=new secciones();
// -------------------
if (isset($_POST['ajaxPet']) && $_POST['action'] == 'abc') {
  try {
      
      $resultado= $obj->abc();

      echo $resultado;

  } catch (PDOException $e) {
      // Manejar errores de la base de datos
      echo "Error en la consulta: " . $e->getMessage();
  }
}


if (isset($_POST['ajaxPet']) && $_POST['action'] == 'abc2') {
  try {
      
      $resultado= $obj->abc2();

      echo $resultado;

  } catch (PDOException $e) {
      // Manejar errores de la base de datos
      echo "Error en la consulta: " . $e->getMessage();
  }
}

// ----------------Modal Estudiantes---------------
if (isset($_POST['ajaxPet']) && isset($_POST['action']) && $_POST['action'] == 'getData') {
    try {
      $id=$_POST['id'];

        $resultado= $obj->consulta_E($id);

        $json = array();
        foreach($resultado as $valores)
         {
           
            $json[] = array(
              'cedula' => $valores['cedula'],
              'nombre' => $valores['nombre'],
              'apellido' => $valores['apellido'],
              'edad' => $valores['edad'],
              'observaciones' => $valores['observaciones']
            );
         }
        
          $jsonstring = json_encode($json);
          echo $jsonstring;    

    } catch (PDOException $e) {
        // Manejar errores de la base de datos
        echo "Error en la consulta: " . $e->getMessage();
    }
}

// -------------------------Validacion Existe Frontend----------------------------------
if (isset($_POST['ajaxPet']) && isset($_POST['action']) && $_POST['action'] == 'existe') {
  try {
    $nombre=$_POST['nombre'];
    $ano= $_POST['ano'];
    $ano_academico= $_POST['acad'];
      // echo "llego:".$nombre;

      $resultado= $obj->exists($nombre, $ano, $ano_academico);

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


?>
