<?php

require_once('../../modelo/ano_academico.php');
  
$obj=new ano_academico();
// -------------------

// ----------------Modal Estudiantes---------------
if (isset($_POST['ajaxPet']) && isset($_POST['action']) && $_POST['action'] == 'getData') {
    try {
      
      $id=$_POST['id'];

        $resultado= $obj->consulta_E($id);

        $json = array();
        foreach($resultado as $valores)
         {
           
            $json[] = array(

              'id' => $valores['id'],
              'fecha_ini' => $valores['fecha_ini'],
              'fecha_cierr' => $valores['fecha_cierr'],
              'evento' => $valores['evento'],
              
            );
         }
        
          $jsonstring = json_encode($json);
          echo $jsonstring;    

    } catch (PDOException $e) {
        // Manejar errores de la base de datos
        echo "Error en la consulta: " . $e->getMessage();
    }
}



?>
