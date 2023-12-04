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
        if (preg_match("/^[0-9]{1,3}$/", $valor)) {
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
    if (!$this->exists($this->secciones,$this->ano,$this->ano_academico)) {
   
        $estado=1;
        try{


                $r= $co->prepare("Insert into secciones_años(
                    
                    id,
                    cantidad,
                    id_secciones,
                    id_anos,
                    estado
                   
                    
                    )
            

                    Values(
                    :id,
                    :cantidad,
                    :id_secciones,
                    :id_anos,
                    :estado
                    

                    
                    )");
                $r->bindParam(':id',$this->id); 
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
                return "Registro incluido"; 
            
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
        try{
            
            $resultado = $co->prepare("SELECT * from secciones WHERE estado=1");
            $resultado->execute();
           $respuesta2="";

            foreach($resultado as $r){
                $respuesta2 .='<option value="'.$r['id'].'" class="'.$r['estado'].'">'.$r['secciones'].'</option>';

            }  

            return $respuesta2;  
            
        }catch(Exception $e){
            
            return false;
        }
}

public function abc2(){
    $co = $this->conecta();
        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            
            $resultado = $co->prepare("SELECT * from secciones");
            $resultado->execute();
           $respuesta2="";

            foreach($resultado as $r){
                $respuesta2 .='<option value="'.$r['id'].'" class="'.$r['estado'].'">'.$r['secciones'].'</option>';

            }  

            return $respuesta2;  
            
        }catch(Exception $e){
            
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
            $respuesta .= '<div class="form-check mb-1">';
            $respuesta .= '<input class="form-check-input" type="radio" name="año" id="inlineRadio' . $r['id'] . '" value="' . $r['id'] . '">';
            $respuesta .= '<label class="form-check-label" for="inlineRadio' . $r['id'] . '">' . $r['anos'] . '</label>';
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
    try{
        $resultado = $co->prepare("SELECT CONCAT(nombre, ' ', apellido) AS nombre_apellido, cedula
        FROM docentes Where anos_trabajo >= 3");
        $resultado->execute();
        $respuesta2 = '';
        $respuesta2 .='<option value="0" selected disabled hidden>-Seleccionar-</option>';

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
        $resultado = $co->prepare("SELECT CONCAT(nombre, ' ', apellido) AS nombre_apellido, cedula
        FROM docentes Where anos_trabajo >= 3");
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

    if (!$this->exists($this->secciones,$this->ano,$this->ano_academico)) {
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

            return "Registro modificado";
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

       
            $this->bitacora("se modifico datos adicionales de una seccion", "secciones",$this->nivel);

            return "Solo se permitio Actualizar Datos Adicionales de la Seccion";
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
    private function existe($id){
        $co = $this->conecta();
        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {
            $resultado = $co->prepare("SELECT
             COUNT(*) AS cantidad_estudiantes
            FROM estudiantes
            WHERE id_anos_secciones = :id
              AND estado = 1;
            ");
            $resultado->bindParam(':id', $id);
            $resultado->execute();
            
            $cantidadEstudiantes = $resultado->fetchColumn();
    
            // Si no hay estudiantes asignados a esa sección
            if ($cantidadEstudiantes == 0) {
                return true; // La sección existe y no tiene estudiantes asignados
            } else {
                return false; // La sección existe y tiene estudiantes asignados
            }
        } catch (Exception $e) {
            return false; // Manejo de excepciones
        }
	}

// ------------------------------------------------
    public function exists($id_seccion, $ano, $ano_academico) {
        $co = $this->conecta();
        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        try {
            $r = $co->prepare("SELECT id FROM secciones_años 
                                WHERE id_secciones = :id_seccion 
                                AND id_anos = :ano 
                                AND estado = 1");
            $r->bindParam(':id_seccion', $id_seccion);
            $r->bindParam(':ano', $ano);
    
            $r->execute();
    
            $secciones_anos_ids = $r->fetchAll(PDO::FETCH_COLUMN);
    
            foreach ($secciones_anos_ids as $secciones_anos_id) {
                // Para cada ID obtenido, busca una coincidencia en ano_secciones con el ano_academico proporcionado
                $r2 = $co->prepare("SELECT COUNT(*) FROM ano_secciones 
                                    WHERE id_secciones = :id_seccion_anos 
                                    AND id_anos = :ano_academico_id");
                $r2->bindParam(':id_seccion_anos', $secciones_anos_id);
                $r2->bindParam(':ano_academico_id', $ano_academico);
    
                $r2->execute();
    
                $matches = $r2->fetchColumn();
    
                if ($matches > 0) {
                    return true; // Si hay al menos una coincidencia, retorna true
                }
            }
    
            return false; // Si no se encuentra una coincidencia para ningún ID, retorna false
    
        } catch (Exception $e) {
            return false; // Manejo de excepciones
        }
    }
    
    
//<!---------------------------------fin de funcion existe------------------------------------------------------------------>


//<!---------------------------------funcion eliminar------------------------------------------------------------------>
private function eliminar1(){
    $co = $this->conecta();
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if($this->existe($this->id)){
    

        try {
            $r=$co->prepare("UPDATE `secciones_años` SET `estado`= 0 WHERE id=:id");
            $r->bindParam(':id',$this->id);
            $r->execute();
           
            $this->bitacora("se elimino una seccion", "seccion",$this->nivel);

            return "Registro Eliminado";
                
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
        $query = "SELECT id, estado FROM secciones";
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
        $this->bitacora("se Actualizo el Abecedario de secciones", "secciones",$this->nivel);

        return "Se actualizó el estado de las secciones.";
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