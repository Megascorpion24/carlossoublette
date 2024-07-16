<?php 
 
require_once('conexion.php');
class ano_academico extends datos{

 
    private $id;
	private $fecha_ini;
    private $fecha_cierr;
    private $ano_academico; 
    private $estatus;
    private $nivel;
    private $estado;


    public function set_id($valor){
        if (preg_match("/^[0-9]{1,5}$/", $valor)) {
		$this->id = $valor; 
        return true;
        }else{
            return false;
        }
	}
	public function set_fecha_ini($valor){
        if (preg_match("/^\d{4}-\d{2}-\d{2}$/",$valor )) {
		$this->fecha_ini = $valor; 
        return true;
    }else{
        return false;
    }
        
	}
    public function set_fecha_cierr($valor){
        if (preg_match("/^\d{4}-\d{2}-\d{2}$/",$valor )) {
		$this->fecha_cierr = $valor; 
        return true;
    }else{
        return false;
    }
	}
	public function set_ano_academico($valor){
        if (preg_match("/^\d{4}-\d{4}$/",$valor )) {
		$this->ano_academico = $valor; 
        return true;
    }else{
        return false;
    }
	}

    public function set_estado($valor){
        $this->estado = $valor; 
    }

    public function set_estatus($valor){
        $this->estatus = $valor; 
    }


    public function registrar()
    {
        $val = $this->registrar1();
        return $val;
    }

    public function modificar()
    {
        $val = $this->modificar1();
        return $val;
    }

    public function eliminar()
    {
        $val = $this->eliminar1();
        return $val;
    }

    public function set_nivel($valor)
    {
        $this->nivel = $valor;
    }
	
   






//<!---------------------------------funcion registrar------------------------------------------------------------------>
    private function registrar1(){

        $co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            try{


                $co->exec("SET AUTOCOMMIT = 0");
                $co->exec("LOCK TABLES ano_academico WRITE");                    
                $co->exec("START TRANSACTION");
                $co->exec("SAVEPOINT savepoint1");




                $estado = 1;

                $estatus = "HABILITADO";

                $consulta = "SELECT * FROM ano_academico WHERE estado = :estado;";
            $r = $co->prepare($consulta);

            $r->bindParam(':estado', $estado);

            $r->execute();

            if ($r->rowCount() > 0) {
                return "4Ya existe un año academico asignado al año en curso";
            }


                $r= $co->prepare("Insert into ano_academico(
						
                            fecha_ini,
                            fecha_cierr,
                            ano_academico,
                            estatus,
                            estado
                            )
            
                    Values( :fecha_ini,
                            :fecha_cierr,
                            :ano_academico,
                            :estatus,
                            :estado
                    )"
                );

                $r->bindParam(':fecha_ini',$this->fecha_ini);
                $r->bindParam(':fecha_cierr',$this->fecha_cierr);
                $r->bindParam(':ano_academico',$this->ano_academico);
                $r->bindParam(':estatus', $estatus);
                $r->bindParam(':estado', $estado);

                // Validar que fecha_ini no sea mayor a fecha_cierr
    if ($this->fecha_ini > $this->fecha_cierr) {
        return"4La fecha de inicio no puede ser mayor a la fecha de cierre";
    }

    // Validar que fecha_cierr no sea menor a fecha_ini
    if ($this->fecha_cierr < $this->fecha_ini) {
        return"4La fecha de finalizacion no puede ser menor a la fecha de inicio";
    }
            
             
                $r->execute();

                $this->bitacora("se registro un año academico", "ano_academico", $this->nivel);

             
                    
                
                    $co->exec("UNLOCK TABLES");
                    $co->exec("COMMIT");
                    return "1Registro Incluido";	
                    $co->exec("SET AUTOCOMMIT = 1");
    
                }catch(Exception $e){
                    return $e->getMessage();
                    $co->exec("ROLLBACK TO SAVEPOINT savepoint1");
                    
                }
  }

 //<!---------------------------------fin de funcion registrar------------------------------------------------------------------>  
        



//<!---------------------------------funcion modificar------------------------------------------------------------------>
        private function modificar1(){



            $co = $this->conecta();
            $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if($this->existe($this->id, "Select * from ano_academico where id=:id", ':id')){
                try{

                    $co->exec("SET AUTOCOMMIT = 0");
                    $co->exec("LOCK TABLES ano_academico WRITE");                    
                    $co->exec("START TRANSACTION");
                    $co->exec("SAVEPOINT savepoint1");



            $consulta = "SELECT * FROM ano_academico WHERE estado = :estado;";
            $r = $co->prepare($consulta);

            $r->bindParam(':estado', $estado);

            $r->execute();

            if ($r->rowCount() > 1) {
                return "4Ya existe un año academico asignado al año en curso";
            }






                    $r= $co->prepare("Update ano_academico set 
                            
                       
                        fecha_ini=:fecha_ini,
                        fecha_cierr=:fecha_cierr,
                        ano_academico=:ano_academico
                        where
						id =:id
                        
                
                         
                            
                            
                        ");
                    $r->bindParam(':id',$this->id);	
                    $r->bindParam(':fecha_ini',$this->fecha_ini);	
                    $r->bindParam(':fecha_cierr',$this->fecha_cierr);
                    $r->bindParam(':ano_academico',$this->ano_academico);

                    // Validar que fecha_ini no sea mayor a fecha_cierr
    if ($this->fecha_ini > $this->fecha_cierr) {
        return"4La fecha de inicio no puede ser mayor a la fecha de cierre";
    }

    // Validar que fecha_cierr no sea menor a fecha_ini
    if ($this->fecha_cierr < $this->fecha_ini) {
        return"4La fecha de finalizacion no puede ser menor a la fecha de inicio";
    } 
                
                 
                    $r->execute();

                    $this->bitacora("se modifico un año academico", "ano_academico", $this->nivel);
    
                 
                  
                    
                        $co->exec("UNLOCK TABLES");
                        $co->exec("COMMIT");
                        return "2Registro modificado";	
                        $co->exec("SET AUTOCOMMIT = 1");
        
                    }catch(Exception $e){
                        return $e->getMessage();
                        $co->exec("ROLLBACK TO SAVEPOINT savepoint1");
                        
                    }
                    
                }
                else{
                    return "4Año no registrado";
                }
        

            }
  //<!---------------------------------fin de funcion modificar------------------------------------------------------------------>  




















  //<!---------------------------------funcion consultar------------------------------------------------------------------> 



public function consultar($nivel1){
    $co = $this->conecta();
        
        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            
            
            $resultado = $co->prepare("SELECT * from ano_academico 

            WHERE ano_academico.estado = 1 OR ano_academico.estado = 0

            ORDER BY ano_academico.id DESC");

           $resultado->execute();

           
            //Consulta movil
            if(in_array("request_app", $nivel1)){ // Corregido aquí
                $r = $resultado->fetchAll(PDO::FETCH_ASSOC);
                return $r;
            }


           $respuesta="";

            foreach($resultado as $r){


                $respuesta .= '<tr class="studentDataRow line" 
         onclick="handleRowClick(`'.$r['id'].'`, `'.$r['ano_academico'].'`, event)" data-bs-toggle="modal" data-bs-target="#infoStudents">';
                $respuesta = $respuesta . "<th>" . $r['id'] . "</th>";
                $respuesta = $respuesta . "<th>" . $r['fecha_ini'] . "</th>";
                $respuesta = $respuesta . "<th>" . $r['fecha_cierr'] . "</th>";
                $respuesta = $respuesta . "<th>" . $r['ano_academico'] . "</th>";
                $respuesta = $respuesta . '<th value="' . $r['estatus'] . '">  <span class="h6 font-weight-bold">' . $r['estatus'] . '</span> </th>';

                $respuesta .= '<th id="option">';
                if (in_array("modificar ano_academico", $nivel1)) {
                    # code...
                $estado= $r['estado'];
                if($estado > 0){
                
                $respuesta=$respuesta. '<a href="#editEmployeeModal" class="edit" data-toggle="modal" onclick="modificar(`'.$r['id'].'`)">
               <i class="material-icons" title="MODIFICAR"><img src="assets/icon/pencill.png"/></i>
               </a>';
               }
               else{
                    $respuesta .= '<a href="#" onclick="delete_info(`'.$r['estado'].'`)">
                    <i class="material-icons"  title="BORRAR"><img style="width: 18px;" src="assets/icon/pencil2.png"/></i>    
                    </a>';
                }
            }
               
               
                if (in_array("eliminar ano_academico", $nivel1)) {
                    # code...
                $estado= $r['estado'];
                if($estado > 0){
                 
               $respuesta=$respuesta. '<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"  onclick="eliminar(`'.$r['id'].'`, `'.$r['estado'].'`)">
               <i class="material-icons" title="BORRAR"><img src="assets/icon/trashh.png"/></i>
               </a>';
               }
               else{
                    $respuesta .= '<a href="#" onclick="delete_info(`'.$r['estado'].'`)">
                    <i class="material-icons"  title="BORRAR"><img style="width: 18px;" src="assets/icon/basura.png"/></i>    
                    </a>';
                }
            }

               

             $respuesta=$respuesta.'</th>';
             $respuesta= $respuesta.'</tr>';
                }

            

        //    echo $respuesta;
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
             
            
           $resultado = $co->prepare("SELECT * FROM `eventos` WHERE id_ano_academico =:id"); 
            $resultado->bindParam(':id',$id);
            $resultado->execute();
           return $resultado;

        }
        catch(Exception $e){     
        return false;
    }
}














 //<!---------------------------------funcion eventos------------------------------------------------------------------>         
public function eventos(){
    $co = $this->conecta();
        
        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            
            
            $resultado = $co->prepare("Select * from ano_academico");
            $resultado->execute();
            
            $evento=$resultado->fetchAll(PDO::FETCH_ASSOC);
            
           return $evento;
            
           
           
         
            
            
        }catch(Exception $e){
            
            return false;
        }
}


//<!---------------------------------fin funcion eventos------------------------------------------------------------------>


private function existe2() {
    $co = $this->conecta();
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try {
        $r = $co->prepare("SELECT COUNT(*) as count FROM ano_academico 
            INNER JOIN ano_estudiantes ON ano_estudiantes.id_ano = ano_academico.id
            INNER JOIN estudiantes ON ano_estudiantes.id_estudiantes = estudiantes.cedula 

            INNER JOIN horario_ano ON horario_ano.id_ano = ano_academico.id
            INNER JOIN horario_docente ON horario_ano.id_horario = horario_docente.id
            WHERE ano_academico.estado = 1 AND estudiantes.estado = 1 AND horario_docente.estado = 1");

        $r->execute();
        $count = $r->fetch(PDO::FETCH_ASSOC)['count'];

        return $count > 0;
    } catch (Exception $e) {
        // Manejar errores de manera más descriptiva
        error_log("Error en la función existe2: " . $e->getMessage());
        return false;
    }
}










//<!---------------------------------funcion eliminar------------------------------------------------------------------>
private function eliminar1(){

    $co = $this->conecta();
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    if($this->existe($this->id, "Select * from ano_academico where id=:id", ':id') && $this->existe2()) {
    

        try {

                $co->exec("SET AUTOCOMMIT = 0");
                $co->exec("LOCK TABLES ano_academico WRITE,ano_estudiantes WRITE,estudiantes WRITE,horario_ano WRITE,horario_docente WRITE,ano_secciones WRITE,secciones_años WRITE,deudas WRITE,eventos WRITE");                    
                $co->exec("START TRANSACTION");
                $co->exec("SAVEPOINT savepoint1");


                
                $r=$co->prepare("UPDATE ano_academico 

                INNER JOIN ano_estudiantes 
                ON  ano_estudiantes.id_ano  = ano_academico.id

                INNER JOIN estudiantes 
                ON ano_estudiantes.id_estudiantes = estudiantes.cedula 

                INNER JOIN horario_ano
                ON horario_ano.id_ano = ano_academico.id

                INNER JOIN horario_docente
                ON horario_ano.id_horario = horario_docente.id

                INNER JOIN ano_secciones 
                ON  ano_secciones.id_anos  = ano_academico.id

                INNER JOIN secciones_años 
                ON ano_secciones.id_secciones = secciones_años.id 


                SET ano_academico.estado = 0, ano_academico.estatus='DESHABILITADO', estudiantes.estado = 0 , horario_docente.estado = 0, secciones_años.estado = 0
                 WHERE ano_academico.estado = 1 AND estudiantes.estado = 1 AND horario_docente.estado = 1 AND secciones_años.estado = 1;");
                

                $r->execute();

                $r = $co->prepare("UPDATE `deudas` SET `estado`= 0 WHERE `estado`= 1 AND `estado_deudas`= 0 "  );

                $r->execute();

                $r = $co->prepare("UPDATE `eventos` SET `estado`= 0 WHERE `estado`= 1");

                $r->execute();


                $this->bitacora("se elimino un año academico", "ano_academico", $this->nivel);


                

                
                $co->exec("UNLOCK TABLES");
                $co->exec("COMMIT");
                return "3Registro Eliminado";
                $co->exec("SET AUTOCOMMIT = 1");

            }catch(Exception $e){
                return $e->getMessage();
                $co->exec("ROLLBACK TO SAVEPOINT savepoint1");
                
            }
        
    

    }
    else{
        return "4No se puede eliminar";
    }
}


 private function bitacora($accion, $modulo, $id)
    {
        try {
            $co = $this->conecta();
            $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            parent::registrar_bitacora($accion, $modulo, $id);;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}
//<!---------------------------------Fin de funcion eliminar------------------------------------------------------------------>
?>