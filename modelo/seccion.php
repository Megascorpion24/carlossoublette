<?php

require_once('conexion.php');
 
class secciones extends datos{
 
    private $id;
	private $secciones;
    private $ano;
    private $cedula_profesor;
    private $ano_academico;
    private $cantidad;
    private $nivel;
    
 
// ----------------

    public function validarAbecedarioFormulario($abecedario) {
        foreach ($abecedario as $abc) {
          
            if (!preg_match("/^[0-9]{1,2}$/", $abc)) {
              return false;
            }
           
        }
      
        return true;
    }
// ----------------
    private $sec = array();

public function setSec($index, $value) {
    $variable = 'sec' . $index;
    $this->sec[$variable] = $value;

     // Mostrar el dato que se guarda
    //  echo 'Valor guardado en ' . $variable . ': ' . $value . '<br>';
}

public function getSec($index) {
    $variable = 'sec' . $index;
    return isset($this->sec[$variable]) ? $this->sec[$variable] : null;
}

 
// ---------------------
    public function set_id($valor){
        if (preg_match("/^[0-9]{0,4}$/", $valor)) {
		        $this->id = $valor; 
            return true;
            }else{
                return false;
            }
        return true;
	}
    public function set_secciones($valor){
        if (preg_match("/^[0-9]{1,3}$/", $valor)) {
		    $this->secciones = $valor;
            // echo 'seccion:'.$this->secciones;   
            return true;
            }else{
                return false;
            }
        return true;
	}
    public function set_ano($valor){
        if (preg_match("/^[0-9]{1,3}$/", $valor)) {
         $this->ano = $valor;  
            return true;
            }else{
                return false;
            }
    }
    public function set_cantidad($valor){
        if (preg_match("/^[0-9]{2}$/", $valor)&& $valor > 10) {
          $this->cantidad = $valor;     
            return true;
            }else{
                return false;
            }
    }
     public function set_cedula_profesor($valor){
        if (preg_match("/^[0-9]{6,15}$/", $valor)) {
                 $this->cedula_profesor = $valor;            
            return true;
            }else{
                return false;
            }
    }
    public function set_ano_academico($valor){
        if (preg_match("/^[0-9]{1,4}$/", $valor)) {
        $this->ano_academico = $valor; 
            return true;
            }else{
                return false;
            }
        return true;
	}

    public function set_nivel($valor){
		$this->nivel = $valor; 
        return true;
	}

// --------------



    public function registrar(){
        $val=$this->registrar1();
        echo $val;
    }

    public function modificar(){
        $val=$this->modificar1();
        echo $val;
    }

    public function eliminar(){
        $val= $this->eliminar1();
        echo $val;
    }
 
//<!---------------------------------funcion registrar------------------------------------------------------------------>
private function registrar1(){


    $co = $this->conecta();
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (!$this->exists($this->secciones,$this->ano,$this->ano_academico) && !$this->exists_doc_guia($this->cedula_profesor) ) {
   
        $estado=1;
        try{


                $r= $co->prepare("Insert into secciones_años(
                    
                    cantidad,
                    id_secciones, 
                    id_anos,
                    estado
                   
                    
                    )
             

                    Values(
                    :cantidad,
                    :id_secciones,
                    :id_anos,
                    :estado
                    

                    
                    )");
                $r->bindParam(':cantidad',$this->cantidad);
                $r->bindParam(':id_secciones',$this->secciones);
                $r->bindParam(':id_anos',$this->ano);   
                $r->bindParam(':estado',$estado);   

                $r->execute();



                $lid = $co->lastInsertId();

                $r= $co->prepare("Insert into docente_guia(
                    
                    id_docente,
                    id_ano_seccion
                    )
            

                    Values(

                    :id_docente,
                    :id_ano_seccion
                    
                    
                    )");
 
                $r->bindParam(':id_docente',$this->cedula_profesor);    
                $r->bindParam(':id_ano_seccion',$lid);  
                $r->execute();

                $r= $co->prepare("Insert into ano_secciones(
                    
                    id_anos,
                    id_secciones
                    )
            

                    Values(

                    :id_anos,
                    :id_secciones
                    
                    
                    )");
 
                $r->bindParam(':id_anos',$this->ano_academico);    
                $r->bindParam(':id_secciones',$lid);  
                $r->execute();



                $this->bitacora("se registro una seccion", "secciones",$this->nivel);            
                return "1Registro incluido"; 
            
        }catch(Exception $e){
            return $e->getMessage();
        }
            
    } else {
        return "Seccion Ya Registrada";
    }

}


 //<!---------------------------------Modal Registrar------------------------------------------------------------------>  

public function abc(){
    $co = $this->conecta();
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try {
        $resultado = $co->prepare("SELECT * FROM secciones WHERE estado = 1");
        $resultado->execute();
        
        $respuesta2 = "";

        foreach ($resultado as $r) {
            $respuesta2 .= '<option value="' . $r['id'] . '" class="' . $r['estado'] . '">' . $r['secciones'] . '</option>';
        }

        // Cerrar la conexión si es persistente

        return $respuesta2;
    } catch (Exception $e) {
        // Manejo de errores
        return false;
    }
}

public function abc2(){
    $co = $this->conecta();
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try {
        $resultado = $co->prepare("SELECT * FROM secciones");
        $resultado->execute();
        $respuesta2 = "";
        $primerResultado = true;

        foreach ($resultado as $r) {
            // Omitir el primer resultado
            if ($primerResultado) {
                $primerResultado = false;
                continue;
            }

            $respuesta2 .= '<option value="' . $r['id'] . '" class="' . $r['estado'] . '">' . $r['secciones'] . '</option>';
        }

        return $respuesta2;
    } catch (Exception $e) {
        // Manejo de errores
        return false;
    }
}


 public function Año(){ 
    $co = $this->conecta();
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    try{
        $resultado = $co->prepare("SELECT * from años WHERE estado=1");
        $resultado->execute();
        $respuesta = "";
        
        foreach($resultado as $r){
            // Construir un conjunto de elementos de radio con el valor del campo 'id' y el texto del campo 'anos'
            $respuesta .= '<div class="custom-radio mb-1">';
            $respuesta .= '<input class="custom-radio-input" type="radio" name="año" id="inlineRadio' . $r['id'] . '" value="' . $r['id'] . '">';
            $respuesta .= '<label class="custom-radio-label" for="inlineRadio' . $r['id'] . '">' . $r['anos'] . '</label>';
            $respuesta .= '</div>';
        }
 
        return $respuesta;
    }catch(Exception $e){
        return false;
    }
}


public function Doc_Guia(){
    $co = $this->conecta(); 
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    try {
        // Consulta para obtener el ID del año académico activo
        $query = $co->prepare("SELECT id FROM ano_academico WHERE estado = 1");
        $query->execute();
        $id_academico = $query->fetchColumn(); // Obtenemos el ID del año académico activo

        // Consulta principal utilizando la tabla ano_secciones
        $resultado = $co->prepare("
        SELECT CONCAT(docentes.nombre, ' ', docentes.apellido) AS nombre_apellido, docentes.cedula
        FROM docentes
        WHERE docentes.anos_trabajo >= 3 
        AND docentes.estado = 1 
        AND docentes.cedula NOT IN (
            SELECT docente_guia.id_docente
            FROM docente_guia
            INNER JOIN secciones_años ON docente_guia.id_ano_seccion = secciones_años.id
            INNER JOIN ano_secciones ON secciones_años.id = ano_secciones.id_secciones
            WHERE ano_secciones.id_anos = :id_academico
            AND secciones_años.estado = 1
            GROUP BY docente_guia.id_docente
            HAVING COUNT(*) >= 2
        )
        GROUP BY docentes.nombre, docentes.apellido, docentes.cedula
        ");

        // Asignar el valor del parámetro
        $resultado->bindParam(':id_academico', $id_academico, PDO::PARAM_INT);
        $resultado->execute();

        $respuesta2 = '';

        foreach($resultado as $r){
            $respuesta2 .= '<option value="'.$r['cedula'].'">'.$r['nombre_apellido'].'</option>';
        }

        return $respuesta2;
    } catch(Exception $e){
        return false;
    }
}

 
public function Doc_Guia_Edit(){
    $co = $this->conecta(); 
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    try{
        // Consultar el ID del año académico activo
        $query = $co->prepare("SELECT id FROM ano_academico WHERE estado = 1");
        $query->execute();
        $id_academico = $query->fetchColumn();

        $resultado = $co->prepare("
                  SELECT 
                CONCAT(docentes.nombre, ' ', docentes.apellido) AS nombre_apellido, 
                docentes.cedula, 
                COUNT(CASE WHEN secciones_años.estado <> 0 THEN ano_secciones.id_secciones ELSE NULL END) AS cantidad_secciones
            FROM docentes
            LEFT JOIN docente_guia ON docentes.cedula = docente_guia.id_docente
            LEFT JOIN secciones_años ON docente_guia.id_ano_seccion = secciones_años.id
            LEFT JOIN ano_secciones ON secciones_años.id = ano_secciones.id_secciones AND ano_secciones.id_anos = :id_academico
            WHERE docentes.anos_trabajo >= 3 
            AND docentes.estado = 1 
            GROUP BY docentes.cedula, docentes.nombre, docentes.apellido
        ");

        $resultado->bindParam(':id_academico', $id_academico, PDO::PARAM_INT);
        $resultado->execute();

        $respuesta2 = '';

        foreach ($resultado as $r) {
            $disabled = ($r['cantidad_secciones'] >= 2) ? 'disabled' : '';
            $class = ($disabled) ? '' : 'text-dark'; // Agrega la clase text-dark si no está deshabilitado
            $respuesta2 .= '<option value="'.$r['cedula'].'" '.$disabled.' class="'.$class.'">'.$r['nombre_apellido'].'</option>';
        }
        
        return $respuesta2;
    } catch(Exception $e){
        return false;
    }
}





public function academico(){
    $co = $this->conecta();
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    try{
        $resultado = $co->prepare("SELECT * FROM ano_academico WHERE estado = 1 ");
        $resultado->execute();
        $respuesta2 = '';

        foreach($resultado as $r){
            
            $respuesta2 .= '<input type="text" class="form-control" name="ano_academico" style="display: none;" id="ano_academico" value="'.$r['id'].'">';
            $respuesta2 .= '<p class="p-1 mb-2 border border-secondary text-secondary rounded">'.$r['ano_academico']."</p>";
           

        }

        return $respuesta2;
    } catch(Exception $e){
        return false;
    }
}




 //<!---------------------------------fin de funcion registrar------------------------------------------------------------------>  
  // <!---------------------------------funcion modificar------------------------------------------------------------------>
private function modificar1(){
    $co = $this->conecta();
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (!$this->exists($this->secciones,$this->ano,$this->ano_academico) && !$this->exists_doc_guia($this->cedula_profesor, false) ) {
        try {
            // Actualizar la tabla secciones_años
            $r = $co->prepare("UPDATE secciones_años 
                                SET cantidad = :cantidad,
                                    id_secciones = :id_secciones,
                                    id_anos = :id_anos
                                WHERE id = :id");

            $r->bindParam(':id', $this->id);
            $r->bindParam(':cantidad', $this->cantidad);
            $r->bindParam(':id_secciones', $this->secciones);
            $r->bindParam(':id_anos', $this->ano);

            $r->execute();

            // Actualizar la tabla docente_guia
            $r = $co->prepare("UPDATE docente_guia
                                SET id_docente = :id_docente
                                WHERE id_ano_seccion = :id");

            $r->bindParam(':id_docente', $this->cedula_profesor);
            $r->bindParam(':id', $this->id);

            $r->execute();

            $this->bitacora("se modifico una seccion", "secciones",$this->nivel);

            return "2Registro Modificado";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    } else { 
 
        try {
            // Actualizar la tabla secciones_años
            $r = $co->prepare("UPDATE secciones_años 
                                SET cantidad = :cantidad        
                                WHERE id = :id");

            $r->bindParam(':id', $this->id);
            $r->bindParam(':cantidad', $this->cantidad);
            // $r->bindParam(':id_secciones', $this->secciones);
            // $r->bindParam(':id_anos', $this->ano);

            $r->execute();

            // Actualizar la tabla docente_guia
            $r = $co->prepare("UPDATE docente_guia
                                SET id_docente = :id_docente
                                WHERE id_ano_seccion = :id");

            $r->bindParam(':id_docente', $this->cedula_profesor);
            $r->bindParam(':id', $this->id);

            $r->execute();

       
            $this->bitacora("se modifico Docente Guia o Cantidad de la Seccion", "secciones",$this->nivel);


            return "2Registro Modificado"; 
        } catch (Exception $e) {
            return $e->getMessage();
        }
    } 



}
 
  //<!---------------------------------fin de funcion modificar------------------------------------------------------------------>  


  public function Edit_Año(){
    $co = $this->conecta();
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    try{
        $resultado = $co->prepare("SELECT * from años WHERE estado=1");
        $resultado->execute();
        $respuesta = "";

        foreach($resultado as $r){
            $respuesta.= '<option value="'.$r['id'].'">'.$r['anos'].'</option>';
        }

        return $respuesta;

    }catch(Exception $e){
        return false;
    }
}



  //<!---------------------------------funcion consultar------------------------------------------------------------------>          
  public function consultar($nivel1){
    $co = $this->conecta(); 
        
        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
             
            
           $resultado = $co->prepare("SELECT 
           secciones_años.id, 
           secciones.id AS id_secciones,  
           secciones.secciones, 
           secciones_años.cantidad, 
           años.id AS id_anos, 
           años.anos AS año, 
           años.turnos, 
           CONCAT(docentes.nombre, ' ', docentes.apellido) AS docente_guia, 
           ano_academico.id AS id_ano_academico,  -- Agregar el ID de la tabla ano_academico
           ano_academico.ano_academico,
           COUNT(estudiantes.cedula) AS cantidad_estudiantes
       FROM 
           secciones_años
           INNER JOIN secciones ON secciones_años.id_secciones = secciones.id
           INNER JOIN años ON secciones_años.id_anos = años.id
           INNER JOIN docente_guia ON secciones_años.id = docente_guia.id_ano_seccion
           INNER JOIN docentes ON docente_guia.id_docente = docentes.cedula
           INNER JOIN ano_secciones ON secciones_años.id = ano_secciones.id_secciones
           INNER JOIN ano_academico ON ano_secciones.id_anos = ano_academico.id
           LEFT JOIN estudiantes ON secciones_años.id = estudiantes.id_anos_secciones AND estudiantes.estado = 1
       WHERE 
           secciones_años.estado = 1 
           AND ano_academico.estado = 1
       GROUP BY 
           secciones_años.id, 
           secciones.id,  
           secciones.secciones, 
           secciones_años.cantidad, 
           años.id, 
           años.anos, 
           años.turnos, 
           CONCAT(docentes.nombre, ' ', docentes.apellido),
           ano_academico.id,  -- Agregar el ID de la tabla ano_academico al grupo
           ano_academico.ano_academico
       ORDER BY 
           secciones_años.id;
       
           "); 
 
            $resultado->execute();
             //Consulta movil
             if(in_array("request_app", $nivel1)){ 
                $r = $resultado->fetchAll(PDO::FETCH_ASSOC);
                return $r;
            }

           $respuesta="";
  
            foreach($resultado as $r){

         $respuesta .= '<tr class="studentDataRow line" 
         onclick="handleRowClick(`'.$r['id'].'`, `'.$r['secciones'].'`, `'.$r['año'].'`, event)" data-bs-toggle="modal" data-bs-target="#infoStudents">';
        $respuesta .= '<th class="text-muted id-column">' . $r['id'] . "</th>";
        $respuesta .= '<th value="'. $r['id_secciones'] .'"> 
        <span class="h6 font-weight-bold">' . $r['secciones'] .'</span> </th>';
        $respuesta .= '<th value="'. $r['id_anos'] .'">  <span class="h6 font-weight-bold">' . $r['año'] . '</span> </th>';
        $respuesta .= "<th>" . $r['turnos'] . "</th>";
        $respuesta .= "<th>" . $r['docente_guia'] . "</th>";
        $respuesta .= "<th>" . $r['cantidad'] . "</th>";
        $respuesta .= "<th>" . $r['cantidad_estudiantes'] . "</th>";
        $respuesta .= '<th value="'. $r['id_ano_academico'] .'">' . $r['ano_academico'] . "</th>";
        $respuesta .= '<th id="option">';
        if (in_array("modificar secciones",$nivel1)) {

                $respuesta.='<a href="#editEmployeeModal" class="edit" data-toggle="modal" onclick="modificar(`'.$r['id'].'`)">
                <i class="material-icons"  title="MODIFICAR"><img src="assets/icon/pencill.png"/></i>
               </a>';
            
            }
        if(in_array("eliminar secciones",$nivel1)){
            $cantidad_est= $r['cantidad_estudiantes'];
                if($cantidad_est <= 0){
               $respuesta.='<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"  onclick="eliminar(`'.$r['id'].'`, `'.$r['secciones'].'`, `'.$r['año'].'`)">
               <i class="material-icons"  title="BORRAR"><img src="assets/icon/trashh.png"/></i>    
               </a>';
                }
                else{
                    $respuesta .= '<a href="#" onclick="delete_info(`'.$r['secciones'].'`, `'.$r['año'].'`)">
                    <i class="material-icons"  title="BORRAR"><img style="width: 18px;" src="assets/icon/basura.png"/></i>    
                    </a>';
                }
         }
            
            $respuesta=$respuesta.'</th>';
             $respuesta= $respuesta.'</tr>';
                
            }

           
            return $respuesta;
         
                            
            
        }catch(Exception $e){
            
            return false;
        }
}
//<!---------------------------------fin funcion consultar------------------------------------------------------------------>


public function consulta_E($id){
    $co = $this->conecta(); 
        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
             
            
           $resultado = $co->prepare("SELECT * FROM `estudiantes` WHERE id_anos_secciones =:id AND estado=1"); 
			$resultado->bindParam(':id',$id);
            $resultado->execute();
           return $resultado;

        }
        catch(Exception $e){     
        return false;
    }
}

 
//<!---------------------------------fin funcion consultar------------------------------------------------------------------>



//<!---------------------------------funcion existe------------------------------------------------------------------>

 
    public function exists($id_seccion, $ano, $ano_academico) {
        $co = $this->conecta();
        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        try {
            $co->beginTransaction();
    
            $r = $co->prepare("SELECT sa.id 
                               FROM secciones_años sa
                               INNER JOIN ano_secciones ans ON sa.id = ans.id_secciones
                               WHERE sa.id_secciones = :id_seccion 
                                 AND sa.id_anos = :ano 
                                 AND sa.estado = 1
                                 AND ans.id_anos = :ano_academico");
    
            $r->bindParam(':id_seccion', $id_seccion);
            $r->bindParam(':ano', $ano);
            $r->bindParam(':ano_academico', $ano_academico);
    
            $r->execute();
    
            $secciones_anos_ids = $r->fetchAll(PDO::FETCH_COLUMN);
    
            $co->commit();
            // echo $secciones_anos_ids;
            // print_r($secciones_anos_ids);
            return !empty($secciones_anos_ids);
    
        } catch (Exception $e) {
            $co->rollBack();
            // Aquí puedes registrar o manejar la excepción adecuadamente
            return false;
        } finally {
            // Asegúrate de cerrar la conexión, incluso en caso de excepción
            $co = null;
        }
    }
    
    
    public function exists_doc_guia($cedula_profesor, $comparacion_igual_o_mayor = true){
        $co = $this->conecta(); 
        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            $query = $co->prepare("SELECT id FROM ano_academico WHERE estado = 1");
            $query->execute();
            $id_academico = $query->fetchColumn();
    
            $stmt = $co->prepare("
                SELECT COUNT(*) 
                FROM docente_guia 
                INNER JOIN secciones_años ON docente_guia.id_ano_seccion = secciones_años.id AND secciones_años.estado = 1
                INNER JOIN ano_secciones ON secciones_años.id = ano_secciones.id_secciones AND ano_secciones.id_anos = :id_academico
                WHERE docente_guia.id_docente = :cedula_profesor
            ");
    
            $stmt->bindParam(':cedula_profesor', $cedula_profesor);
            $stmt->bindParam(':id_academico', $id_academico, PDO::PARAM_INT);
            $stmt->execute();

            $cantidad_registros = $stmt->fetchColumn();


            if ($comparacion_igual_o_mayor) {
                
                return ($cantidad_registros >= 2);

            } else {
            
                return ($cantidad_registros > 2);
            }

            
        } catch(Exception $e){
            return false;
        }
    }
    

    
//<!---------------------------------fin de funcion existe------------------------------------------------------------------>


           

//<!---------------------------------funcion eliminar------------------------------------------------------------------>
private function eliminar1(){
    $co = $this->conecta();
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if($this->existe($this->id, "SELECT COUNT(*) AS cantidad_estudiantes  FROM estudiantes WHERE id_anos_secciones = :id AND estado = 1; ", ':id')){
    

        try {
            $r=$co->prepare("UPDATE `secciones_años` SET `estado`= 0 WHERE id=:id");
            $r->bindParam(':id',$this->id);
            $r->execute();
           
            $this->bitacora("se elimino una seccion", "seccion",$this->nivel);

            return "3Registro Eliminado";
                
        } catch(Exception $e) {
            return $e->getMessage();
        }
        
    }
    else{
        return "Sección no existe, o tiene estudiantes afiliados";
    }
}
 

//<!---------------------------------Fin de funcion eliminar------------------------------------------------------------------>


public function Asig_Seccion() {
    $co = $this->conecta();
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try {
        // Obtener todos los IDs de la tabla secciones
        $query = "SELECT id, estado FROM secciones ORDER BY id LIMIT 10000 OFFSET 1";
        $stmt = $co->prepare($query);
        $stmt->execute();
        $all_secciones = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Encontrar la intersección entre los IDs de la tabla y los IDs de $sec
        $secciones_a_activar = array_intersect(array_column($all_secciones, 'id'), $this->sec);
        // var_dump($all_secciones);
        // print_r($this->sec);
        // print_r($all_secciones);
        // print_r($secciones_a_activar);


        // Actualizar el estado de las secciones en base a la intersección encontrada
        foreach ($all_secciones as $seccion) {
            $id = $seccion['id'];
            $estado = in_array($id, $secciones_a_activar) ? 1 : 0;

            $update_query = "UPDATE secciones SET estado = :estado WHERE id = :id";
            $update_stmt = $co->prepare($update_query);
            $update_stmt->bindParam(':estado', $estado, PDO::PARAM_INT);
            $update_stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $update_stmt->execute();

            // Mostrar información sobre el cambio de estado
           // echo "ID: {$id}, Estado actual: {$seccion['estado']}, Nuevo estado: {$estado}<br>";
        }
        $this->bitacora("Se Actualizo el Abecedario de Secciones", "secciones",$this->nivel);

        return "1Se Actualizo el Abecedario de Secciones";
    } catch (Exception $e) {
        return $e->getMessage();
    }
}



// ---------------------------------------

private function bitacora($accion, $modulo,$id){
    try {
        $co = $this->conecta();
        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    parent::registrar_bitacora($accion, $modulo,$id);

                
        } catch(Exception $e) {
            return $e->getMessage();
        }
    
}


//fin classs
}


?>