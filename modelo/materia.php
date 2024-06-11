<?php
 
require_once('conexion.php');
require_once('validator/validations.php');

class materias extends datos{
 
    private $id;
	private $nombre;
    private $ano;
    private $docentes= []; 
    private $nivel;
    
    
 
     //---VALIDACIONES BACKEND---
     public function Validar_Materia($datos) {
        try {
            // Valida datos
            $this->nombre = validate_value('nameMateria', $datos['nombre']);
            $this->ano = validate_value('año', $datos['año']);
            $this->docentes = validarDocentesFormulario('cedula', $datos['docentes']);
            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }
   
    // --------------

   public function Registrar_Materia($datos) {
        //Validar para Registrar
         $val = $this->Validar_Materia($datos);
         return $val ? $res=$this->registrar1() : null;
          
   }

   public function Modificar_Materia($datos) {
     //Validar para Modificar
    //  print_r($datos);
       $val = $this->Validar_Materia($datos);
              $this->id = $datos['id']; 
       return $val ? $this->modificar1() : null;
    }

    public function Eliminar_Materia($valor){
        $this->id = $valor; 
        return $this->eliminar1();
    
    }
    // ---------
    public function set_nivel($valor){
		$this->nivel = $valor; 
        return true;
	}
 


private function registrar1() {
    $co = $this->conecta();
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (!$this->exists($this->nombre,$this->ano)) {
        try {
            // ------Materia---
            $r = $co->prepare("INSERT into materias (nombre, estado) Values(:nombre, 1)");
            $r->bindParam(':nombre', $this->nombre);
            $r->execute();

            // Recuperar el ID de la materia recién insertada
            $lid = $co->lastInsertId();

            // -------Año Materia-----
            $r = $co->prepare("INSERT INTO años_materias (id_anos, id_materias) VALUES (:ano, :id_materia)");
            $r->bindParam(':ano', $this->ano);
            $r->bindParam(':id_materia', $lid);
            $r->execute();
           

            //Registrar Docentes

            // $docentes = array($this->docente1, $this->docente2, $this->docente3, $this->docente4, $this->docente5, $this->docente6);

            foreach ($this->docentes as $docente) {   
                    $r = $co->prepare("INSERT INTO materias_docentes (estado, id_materias, id_docente) 
                    VALUES (1, :id_materia, :docente)");

                    $r->bindParam(':id_materia', $lid);
                    $r->bindParam(':docente', $docente);
                    $r->execute();
            }



            $this->bitacora("se registró una materia", "materias", $this->nivel);
            return "1Registro Incluido";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    } else {
        return "MATERIA Ya esta Registrada";
    }
}



 //<!---------------------------------fin de funcion registrar------------------------------------------------------------------>  
        
 public function Año(){
    $co = $this->conecta();
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    try{
        $resultado = $co->prepare("SELECT * from años  WHERE estado=1");
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

 
public function Docente(){
    $co = $this->conecta();
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    try{
        $resultado = $co->prepare("SELECT CONCAT(nombre, ' ', apellido) AS nombre_apellido, cedula
        FROM docentes WHERE estado=1");
        $resultado->execute();
        $respuesta2 = '';

        foreach($resultado as $r){
            $respuesta2 .= '<option value="'.$r['cedula'].'">'.$r['nombre_apellido'].'</option>';
        }

        return $respuesta2;
        // return "consulto";
    } catch(Exception $e){
        return false;
    }
}


public function Edit_Año(){
    $co = $this->conecta();
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    try{
        $resultado = $co->prepare("SELECT * from años  WHERE estado=1");
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

  //<!---------------------------------fin de funcion modificar------------------------------------------------------------------>  

//<!---------------------------------funcion modificar------------------------------------------------------------------>
private function modificar1(){
    $co = $this->conecta();
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (!$this->exists($this->nombre, $this->ano)) {
        try {
            // Actualiza la materia en la tabla materias
            $r = $co->prepare("UPDATE materias SET nombre = :nombre WHERE id = :id");
            $r->bindParam(':nombre', $this->nombre);
            $r->bindParam(':id', $this->id);
            $r->execute();

            // Modifica el valor de id_anos en la tabla años_materias
            $r = $co->prepare("UPDATE años_materias SET id_anos = :ano WHERE id_materias = :id");
            $r->bindParam(':ano', $this->ano);
            $r->bindParam(':id', $this->id);
            $r->execute();

            // Manejo de docentes
            try {
                $this->off_Docente(); // Llama a la función que elimina los docentes actuales
                $this->insert_Docente(); // Llama a la función que registra los docentes nuevos
            } catch (Exception $e) {
                return "Error al manejar docentes: " . $e->getMessage();
            }

            $this->bitacora("se modificó una materia", "materias", $this->nivel);
            return "Registro Modificado";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    } else {
        try {
            $this->off_Docente(); // Llama a la función que elimina los docentes actuales
            $this->insert_Docente(); // Llama a la función que registra los docentes nuevos

            $this->bitacora("se modificó Docente de una materia", "materias", $this->nivel);
            return "Registro Modificado";
        } catch (Exception $e) {
            return "Error al manejar docentes: " . $e->getMessage();
        }
    }
}

//<!---------------------------fin de funcion modificar--------------------------->


private function off_Docente() {
    try {
        $co = $this->conecta();
        // Obtén la lista de docentes asociados a la materia antes de realizar la modificación
        $r = $co->prepare("SELECT id_docente FROM materias_docentes WHERE id_materias = :id");
        $r->bindParam(':id', $this->id);
        $r->execute();
        $docentesAsociados = $r->fetchAll(PDO::FETCH_COLUMN);

        foreach ($docentesAsociados as $docente) {
            if (!in_array($docente, $this->docentes)) {
                $r = $co->prepare("DELETE FROM materias_docentes WHERE id_materias = :id AND id_docente = :docente");
                $r->bindParam(':id', $this->id);
                $r->bindParam(':docente', $docente);
                $r->execute();
            }
        }
        return "Docentes eliminados correctamente";
    } catch (Exception $e) {
        throw new Exception("Error en off_Docente: " . $e->getMessage());
    }
}

 

private function insert_Docente() {
    $co = $this->conecta();
    
    foreach ($this->docentes as $index => $docente) {
        if (!empty($docente)) {
            // Verifica si la relación ya existe
            $exists = $this->verificarRelacionExistente($this->id, $docente);
            
            if (!$exists) {
                try {
                    $r = $co->prepare("INSERT INTO materias_docentes (estado, id_materias, id_docente) 
                                       VALUES (1, :id_materia, :docente)");
                    $r->bindParam(':id_materia', $this->id);
                    $r->bindParam(':docente', $docente);
                    $r->execute();
                } catch (Exception $e) {
                    throw new Exception("Error en la inserción de docente: " . $e->getMessage());
                }
            }
        }
    }
    return "Docentes insertados correctamente";
}


private function verificarRelacionExistente($materiaId, $docenteId) {
    try {
        $co = $this->conecta();
        $r = $co->prepare("SELECT COUNT(*) as count FROM materias_docentes 
                           WHERE id_materias = :id_materia AND id_docente = :docente AND estado = 1");
        $r->bindParam(':id_materia', $materiaId);
        $r->bindParam(':docente', $docenteId);
        $r->execute();

        $result = $r->fetch(PDO::FETCH_ASSOC);

        return ($result['count'] > 0);
    } catch (Exception $e) {
        // Maneja la excepción aquí, puedes registrar el error o devolver un mensaje personalizado
        throw new Exception("Error al verificar la relación existente: " . $e->getMessage());
    }
}



  //<!--------------------------------funcion consultar------------------------------>          
public function consultar($nivel1){
    $co = $this->conecta();
		
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
			
			
			$resultado = $co->prepare("SELECT
            materias.id AS id_materias,
            materias.nombre AS materias,
            GROUP_CONCAT(DISTINCT años.id) AS id_anos,
            GROUP_CONCAT(DISTINCT años.anos) AS Años,
            GROUP_CONCAT(DISTINCT CONCAT(docentes.nombre, ' ', docentes.apellido) ORDER BY docentes.nombre) AS docente_nombre_apellido,
            GROUP_CONCAT(DISTINCT docentes.cedula ORDER BY docentes.nombre) AS docente_cedula
        FROM
            materias
        LEFT JOIN 
            años_materias ON materias.id = años_materias.id_materias
        LEFT JOIN
            años ON años_materias.id_anos = años.id
        LEFT JOIN
            materias_docentes ON materias.id = materias_docentes.id_materias
        LEFT JOIN
            docentes ON materias_docentes.id_docente = docentes.cedula
        WHERE
            materias.estado = 1
            AND materias_docentes.estado = 1  -- Agregar esta línea para filtrar por estado en materias_docentes
        GROUP BY
            materias.id;
        
            ");
			$resultado->execute();

            //Consulta movil
            if(in_array("request_app", $nivel1)){ 
                $r = $resultado->fetchAll(PDO::FETCH_ASSOC);
                return $r;
            } 
      
            //Consulta web
           $respuesta="";

            foreach($resultado as $r){
                $respuesta= $respuesta.'<tr>';
                
                $respuesta.="<th>".$r['id_materias']."</th>";
                $respuesta.='<th> <span class="h6 font-weight-bold">'.$r['materias']."</th>";
                $respuesta.='<th value="'. $r['id_anos'] .'"> <span class="h6 font-weight-bold">'.$r['Años']."</th>";

                $docentes_nombres_apellidos = explode(',', $r['docente_nombre_apellido']);
                $docentes_cedulas = explode(',', $r['docente_cedula']);

                for ($i = 0; $i < 6; $i++) {
                    $nombre_apellido = isset($docentes_nombres_apellidos[$i]) ? $docentes_nombres_apellidos[$i] : "-";
                    $cedula = isset($docentes_cedulas[$i]) ? $docentes_cedulas[$i] : "-";
                    
                    $respuesta .= '<th value="'. $cedula .'">' . $nombre_apellido . '</th>';
                }


                $respuesta.='<th>';
                if (in_array("modificar materias",$nivel1)) {
                    # code...
                    
                    $respuesta.='<a href="#editEmployeeModal" class="edit" data-toggle="modal" onclick="modificar(`'.$r['id_materias'].'`)">
                    <i class="material-icons"  title="MODIFICAR"><img src="assets/icon/pencill.png"/></i>
                   </a>';
                
            }
            if(in_array("eliminar materias",$nivel1)){
               
                $respuesta.='<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"  onclick="eliminar(`'.$r['id_materias'].'`)">
                <i class="material-icons"  title="BORRAR"><img src="assets/icon/trashh.png"/></i>    
                </a>';
                
            }
            $respuesta.='</th>';
             $respuesta.='</tr>';

            }
 
            return $respuesta;
        

			
		}catch(Exception $e){
			
			return false;
		}
}
//<!---------------------------------fin funcion consultar---------------------------------------------------------->

  //<!--------------------------------funcion consultar MATERIA------------------------------>          
 
  public function consultar_materias(){
		
    $co = $this->conecta();
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try{

        // $resultado = $co->prepare("SELECT * from materias where nombre LIKE :term and estado=1");
        $resultado = $co->prepare("SELECT DISTINCTROW nombre FROM materias WHERE estado=1;");

        // $term = '%' . $term . '%'; 
        // $resultado->bindParam(':term', $term);
        $resultado->execute();

         // Obtener los resultados en un array asociativo
        $result = $resultado->fetchAll(PDO::FETCH_BOTH);
        
        
        return $result;
    }catch(Exception $e){
        
        return false;
    } 
}

//<!---------------------------------funcion existe------------------------------------------------------------------>
    private function existe($id){
		
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
		try{
			
			$resultado = $co->prepare("SELECT * from materias where id=:id");
			
			$resultado->bindParam(':id',$id);
			$resultado->execute();
			$fila = $resultado->fetchAll(PDO::FETCH_BOTH);
			if($fila){ 

				return true;  
			    
			}
            //necesario?
			else{
				
				return false; 
			}
			
		}catch(Exception $e){
			
			return false;
		}  
	}
//<!---------------------------------fin de funcion existe------------------------------------------------------------------>
public function exists($nombre, $ano) {
    $co = $this->conecta();
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try { 
        // Verificar si ya existe una materia con el mismo nombre en la tabla materias
        $r = $co->prepare("SELECT materias.nombre, materias.estado, años_materias.id_anos
         FROM materias 
         INNER JOIN años_materias ON materias.id = años_materias.id_materias
          WHERE materias.nombre = :nombre
           AND años_materias.id_anos= :ano
            AND materias.estado=1;");
        $r->bindParam(':nombre', $nombre);
        $r->bindParam(':ano', $ano);
        $r->execute();

        $materia =  $r->fetchAll(PDO::FETCH_BOTH);

        if($materia){ 
 
            return true; 
            
        }
        else{ 
            
            return false; 
        }

    } catch (Exception $e) {
        return false;
    }
}





//<!---------------------------------funcion eliminar------------------------------------------------------------------>
 private function eliminar1(){
     $co = $this->conecta();
     $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     if($this->existe($this->id)){
    

         try {
              
                $estado=0;
                $r= $co->prepare("UPDATE materias set 
                               
                estado=:estado

                where
                id =:id

                    
                ");


                 $r->bindParam(':id',$this->id);
                 $r->bindParam(':estado',$estado);
                 $r->execute();
                 $this->bitacora("se elimino una materia", "materias",$this->nivel);
                 return "3Registro Eliminado";
                
         } catch(Exception $e) {
             return $e->getMessage();
         }
        

     }
     else{
         return "materia no registrada";
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





}
//<!---------------------------------Fin de funcion eliminar------------------------------------------------------------------>
?>