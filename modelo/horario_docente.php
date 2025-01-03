<?php

require_once('conexion.php');
require_once('config/logger.php');

class horario extends datos
{

    private $logger;

    private $id;
    private $clase;
    private $cedula_profesor;
    private $ano;
    private $dia;
    private $clase_inicia;
    private $clase_termina;
    private $ano_academico;
    private $inicio;
    private $fin;
    private $nivel;



    public function __construct() {
        $this->logger = getLogger();
    }


    public function set_id($valor)
    
    {
        if (preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?]*$/", $valor)) {
        $this->id = $valor;
        return true;
        }else{
            return false;
        }
    }

    public function set_clase($valor)
    {
        if (preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?]*$/", $valor)) {
        $this->clase = $valor;
        return true;
        }else{
            return false;
        }
    }
    public function set_cedula_profesor($valor)
    {

        if (preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?]*$/", $valor)) {
        $this->cedula_profesor = $valor;
        return true;
        }else{
            return false;
        }
    }
    public function set_ano($valor)
    {
        if (preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?]*$/", $valor)) {
        $this->ano = $valor;
        return true;
        }else{
            return false;
        }
    }

    public function set_dia($valor)
    {
        if (preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?]*$/", $valor)) {
        $this->dia = $valor;
        return true;
        }else{
            return false;
        }
    }
    public function set_clase_inicia($valor)
    {
        if (preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?]*$/", $valor)) {
        $this->clase_inicia = $valor;
        return true;
        }else{
            return false;
        }
    }
    public function set_clase_termina($valor)
    {
        if (preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?]*$/", $valor)) {
        $this->clase_termina = $valor;
        return true;
        }else{
            return false;
        }
    }
    public function set_inicio($valor)
    {
        if (preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?]*$/", $valor)) {
        $this->inicio = $valor;
        return true;
        }else{
            return false;
        }
    }
    public function set_fin($valor)
    {
        if (preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?]*$/", $valor)) {
        $this->fin = $valor;
        return true;
        }else{
            return false;
        }
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
    private function registrar1()
    {


        $co = $this->conecta();
        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



        try {





            $estado = 1;


            $dia = $this->dia;
            $clase_inicia = $this->clase_inicia;
            $clase_termina = $this->clase_termina;
            $ano = $this->ano;
           
            $result = $this->existe_c($dia, $clase_inicia, $clase_termina, $ano, $estado);
        
            if ($result !== true) {
                return $result;
            }

            $resultado2 = $co->prepare("SELECT * from  ano_academico where estado = 1");
			
    
    
                    $resultado2->execute();
                    $respuesta2="";
                    $fecha_ini="";
                    $fecha_cierr="";
        
                    if ($resultado2->rowCount() > 0) {
                        // Si hay algún resultado, then it means there is an academic year in progress
                        foreach($resultado2 as $r){
                       
                            $respuesta2=$r["id"];
                            $fecha_ini=$r["fecha_ini"];
                            $fecha_cierr=$r["fecha_cierr"];
                        }
                    } else {
                        // Si no hay resultado, then it means there is no academic year in progress
                        $respuesta2 = "4No hay un año académico en curso";
                        return $respuesta2;
                    }

                    
                  
                  
                  
    
            
            $co->exec("SET AUTOCOMMIT = 0");

            $co->exec("LOCK TABLES horario_docente WRITE, docente_horario WRITE, materia_horario_docente WRITE, horario_ano WRITE");        
            $co->exec("START TRANSACTION");

            $r = $co->prepare("Insert into horario_docente(
                    
                    clase_inicia,
                    clase_termina,
                    dia,
                    inicio,
                    fin,
                    id_ano_seccion,
                    estado
                   
                    
                    )
            

                    Values(
                    :clase_inicia,
                    :clase_termina,
                    :dia,
                    :inicio,
                    :fin,
                    :id_ano_seccion,
                    :estado
                    

                    
                    )");
            $r->bindParam(':clase_inicia', $this->clase_inicia);
            $r->bindParam(':clase_termina', $this->clase_termina);
            $r->bindParam(':dia', $this->dia);
            $r->bindParam(':inicio', $fecha_ini);
            $r->bindParam(':fin', $fecha_cierr);
            $r->bindParam(':id_ano_seccion', $this->ano);
            $r->bindParam(':estado', $estado);

             // Validar que clase_inicio no sea mayor a clase_termina
    if ($this->clase_inicia > $this->clase_termina) {
        $this->logger->warning("Fallo al intentar registrar: La Fecha de inicio no puede ser mayor a la de cierre.");
        return"4la hora de inicio no puede ser mayor a la hora final";
    }

    

   

            $r->execute();





            $lid = $co->lastInsertId();



            $r = $co->prepare("Insert into docente_horario(
                    
                    id_docente,
                    id_horario_docente
                    )
            

                    Values(
                    :id_docente,
                    :id_horario_docente
                    
                    
                    )");
            $r->bindParam(':id_docente', $this->cedula_profesor);
            $r->bindParam(':id_horario_docente', $lid);
            $r->execute();

            $r = $co->prepare("Insert into materia_horario_docente(
                    
                    id_materias,
                    id_horario_docente
                    )
            

                    Values(
                    :id_materias,
                    :id_horario_docente
                    
                    
                    )");
            $r->bindParam(':id_materias', $this->clase);
            $r->bindParam(':id_horario_docente', $lid);
            $r->execute();


            



            $r= $co->prepare("Insert into horario_ano(
						
                id_ano,
                id_horario
                )
        

                Values(
                :id_ano,
                :id_horario
                
                
                )");
            $r->bindParam(':id_ano', $respuesta2);	
            $r->bindParam(':id_horario',$lid);	
            $r->execute();

            // Unlock tables
            $co->exec("UNLOCK TABLES");

    // Commit transaction
             $co->exec("COMMIT");

    // Set AutoCommit to 1
        $co->exec("SET AUTOCOMMIT = 1");




            // Registrar en logs
            $this->logger->info("Nueva clase registrada: ID {$lid}.");

            $this->bitacora("se registro una clase", "Horario", $this->nivel);

            return "1Registro incluido";
           
        } catch (Exception $e) {

            // Registrar error en logs
            $this->logger->error("Error al registrar una clase: " . $e->getMessage());

            return $e->getMessage();
            $co->exec("ROOLBACK");
            $co->exec("COMMIT");

        }
    }
    //<!---------------------------------fin de funcion registrar------------------------------------------------------------------>  
















    //<!---------------------------------funcion modificar------------------------------------------------------------------>
    private function modificar1()
    {





        $co = $this->conecta();
        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if ($this->existe($this->id, "SELECT * FROM `horario_docente` WHERE id= :id; ",':id' )) {
            try {

                $consulta = "SELECT * FROM horario_docente WHERE dia = :dia AND id_ano_seccion = :id_ano_seccion AND estado = 1 AND clase_inicia <= :clase_termina AND clase_termina >= :clase_inicia;";
                $r = $co->prepare($consulta);


                $r->bindParam(':dia', $this->dia);
                $r->bindParam(':clase_inicia', $this->clase_inicia);
                $r->bindParam(':clase_termina', $this->clase_termina);
                $r->bindParam(':id_ano_seccion', $this->ano);


                $r->execute();

                if ($r->rowCount() >0) {

                    $this->logger->info("Error al editar la clase: La clase con ID {$this->id} no se puede asiganar a ese bloque academico.");
                    
                    return "4Ya existe una existe una clase en ese bloque academico, eliga una seccion o hora diferente";
                }



                $co->exec("SET AUTOCOMMIT = 0");

                $co->exec("LOCK TABLES horario_docente WRITE");        
                $co->exec("START TRANSACTION");


                $r = $co->prepare("UPDATE horario_docente SET
             
             clase_inicia=:clase_inicia,
             clase_termina=:clase_termina,
             dia=:dia,
             id_ano_seccion=:id_ano_seccion
            
             WHERE 
             id=:id


                
            ");
                $r->bindParam(':id', $this->id);
                $r->bindParam(':clase_inicia', $this->clase_inicia);
                $r->bindParam(':clase_termina', $this->clase_termina);
                $r->bindParam(':id_ano_seccion', $this->ano);
                $r->bindParam(':dia', $this->dia);
               


             // Validar que clase_inicio no sea mayor a clase_termina
             if ($this->clase_inicia > $this->clase_termina) {
                $this->logger->warning("Fallo al intentar modificar: La Fecha de inicio no puede ser mayor a la de cierre.");
                return"4la hora de inicio no puede ser mayor a la hora final";
            }
            
           


                $r->execute();


  // Unlock tables
  $co->exec("UNLOCK TABLES");

  // Commit transaction
           $co->exec("COMMIT");

  // Set AutoCommit to 1
      $co->exec("SET AUTOCOMMIT = 1");

            // Registrar en logs
            $this->logger->info("Nueva clase modificada: ID {$this->id}.");

                $this->bitacora("se modifico una clase", "Horario", $this->nivel);
                

                return "2Registro modificado";
                
            } catch (Exception $e) {

                // Registrar error en logs
                $this->logger->error("Error al registrar una clase: " . $e->getMessage());

                return $e->getMessage();
                $co->exec("ROOLBACK");
                $co->exec("COMMIT");
    
            }
        } else {
            return "4clase no registrada";
        }
    }


    //<!---------------------------------fin de funcion modificar------------------------------------------------------------------>  




















    //<!---------------------------------funcion consultar------------------------------------------------------------------>          
    public function consultar($nivel1)
    {
        $co = $this->conecta();

        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {

            


            $resultado = $co->prepare("SELECT horario_docente.*,materias.nombre as clase,concat(docentes.nombre ,'-', docentes.cedula) as cedula,
            concat(años.anos,'-',secciones.secciones) as seccion, ano_academico.ano_academico as ano, case
         when dia = 1 then 'Lunes'
         when dia = 2 then 'Martes'
          when dia = 3 then 'Miercoles'
           when dia = 4 then 'Jueves'
            when dia = 5 then 'Viernes'
       end as dia2, 
       CASE
       when horario_docente.estado = 1 then 'activo'
       when horario_docente.estado = 0 then 'inactivo'
       end as estado2
       FROM horario_docente
                                                
            
            INNER JOIN docente_horario
            ON horario_docente.id = docente_horario.id_horario_docente 
            INNER JOIN docentes
            ON docente_horario.id_docente = docentes.cedula
            
            
            INNER JOIN materia_horario_docente
            ON horario_docente.id= materia_horario_docente.id_horario_docente
            INNER JOIN materias
            ON materia_horario_docente.id_materias = materias.id
            
            
            
            INNER JOIN secciones_años
            ON horario_docente.id_ano_seccion = secciones_años.id 
         
         INNER JOIN años
         on secciones_años.id_anos=años.id 
         INNER JOIN secciones 
         on secciones_años.id_secciones=secciones.id 
            
            INNER JOIN horario_ano
            ON horario_docente.id = horario_ano.id_horario
            INNER JOIN ano_academico
            ON horario_ano.id_ano = ano_academico.id
          	
            

       

            ORDER BY `horario_docente`.`id` asc;");
            $resultado->execute();



            //Consulta movil
            if(in_array("request_app", $nivel1)){ // Corregido aquí
                $r = $resultado->fetchAll(PDO::FETCH_ASSOC);
                return $r;
            }



            $respuesta = "";

            foreach ($resultado as $r) {
                $respuesta = $respuesta . '<tr>';
                $respuesta = $respuesta . "<th>" . $r['id'] . "</th>";
                $respuesta = $respuesta . "<th>" . $r['clase'] . "</th>";
                $respuesta = $respuesta . "<th>" . $r['cedula'] . "</th>";
                $respuesta = $respuesta . "<th>" . $r['seccion'] . "</th>";
                $respuesta = $respuesta . "<th>" . $r['dia'] . "</th>";
                $respuesta = $respuesta . "<th>" . $r['dia2'] . "</th>";
                $respuesta = $respuesta . "<th>" . $r['clase_inicia'] . "</th>";
                $respuesta = $respuesta . "<th>" . $r['clase_termina'] . "</th>";
                $respuesta = $respuesta . "<th>" . $r['ano'] . "</th>";
                $respuesta = $respuesta . "<th>" . $r['estado2']."</th>";
                $respuesta = $respuesta . '<th>';
                if (in_array("modificar horario_docente", $nivel1)) {
                    $estado= $r['estado'];
                    if($estado > 0){
                    
                    $respuesta=$respuesta. '<a href="#editClase" class="edit" data-toggle="modal" onclick="modificar(`'.$r['id'].'`)">
                   <i class="material-icons" title="MODIFICAR"><img src="assets/icon/pencill.png"/></i>
                   </a>';
                   }
                   else{
                        $respuesta .= '<a href="#" onclick="delete_info(`'.$r['estado2'].'`)">
                        <i class="material-icons"  title="MODIFICAR"><img style="width: 18px;" src="assets/icon/pencil2.png"/></i>    
                        </a>';
                    }
                }
                if (in_array("eliminar horario_docente", $nivel1)) {
                    $estado= $r['estado'];
                    if($estado > 0){
                    

                    $respuesta = $respuesta . '<a href="#deleteClase" class="delete" data-toggle="modal"  onclick="eliminar(`' . $r['id'] . '`)">
               <i class="material-icons"  title="BORRAR"><img src="assets/icon/trashh.png"/></i>    
               </a>';
            }
            else{
                 $respuesta .= '<a href="#" onclick="delete_info(`'.$r['estado2'].'`)">
                 <i class="material-icons"  title="MODIFICAR"><img style="width: 18px;" src="assets/icon/basura.png"/></i>    
                 </a>';
             }
                }
                $respuesta = $respuesta . '</th>';
                $respuesta = $respuesta . '</tr>';
            }


            return $respuesta;
        } catch (Exception $e) {

            return false;
        }
    }

    public function consultar_app($nivel1)
    {
        $co = $this->conecta();

        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {
            

            $resultado = $co->prepare("SELECT horario_docente.*,materias.nombre as clase,concat(docentes.nombre ,'-', docentes.cedula) as cedula,
            concat(años.anos,'-',secciones.secciones) as seccion, ano_academico.ano_academico as ano , case
         when dia = 1 then 'Lunes'
         when dia = 2 then 'Martes'
          when dia = 3 then 'Miercoles'
           when dia = 4 then 'Jueves'
            when dia = 5 then 'Viernes'
       end as dia2
       FROM horario_docente
                                                
            
            INNER JOIN docente_horario
            ON horario_docente.id = docente_horario.id_horario_docente 
            INNER JOIN docentes
            ON docente_horario.id_docente = docentes.cedula
            
            
            INNER JOIN materia_horario_docente
            ON horario_docente.id= materia_horario_docente.id_horario_docente
            INNER JOIN materias
            ON materia_horario_docente.id_materias = materias.id
            
            
            
            INNER JOIN secciones_años
            ON horario_docente.id_ano_seccion = secciones_años.id 
         
         INNER JOIN años
         on secciones_años.id_anos=años.id 
         INNER JOIN secciones 
         on secciones_años.id_secciones=secciones.id 
            
            INNER JOIN horario_ano
            ON horario_docente.id = horario_ano.id_horario
            INNER JOIN ano_academico
            ON horario_ano.id_ano = ano_academico.id
            

            WHERE horario_docente.estado = 1

            ORDER BY `horario_docente`.`id` DESC;");
            $resultado->execute();



            //Consulta movil
            if(in_array("request_app", $nivel1)){ // Corregido aquí
                $r = $resultado->fetchAll(PDO::FETCH_ASSOC);
                return $r;
            }



            $respuesta = "";

            foreach ($resultado as $r) {
                $respuesta = $respuesta . '<tr>';
                $respuesta = $respuesta . "<th>" . $r['id'] . "</th>";
                $respuesta = $respuesta . "<th>" . $r['clase'] . "</th>";
                $respuesta = $respuesta . "<th>" . $r['cedula'] . "</th>";
                $respuesta = $respuesta . "<th>" . $r['seccion'] . "</th>";
                $respuesta = $respuesta . "<th>" . $r['dia'] . "</th>";
                $respuesta = $respuesta . "<th>" . $r['dia2'] . "</th>";
                $respuesta = $respuesta . "<th>" . $r['clase_inicia'] . "</th>";
                $respuesta = $respuesta . "<th>" . $r['clase_termina'] . "</th>";
                $respuesta = $respuesta . "<th>" . $r['ano'] . "</th>";
                $respuesta = $respuesta . '<th>';
                if (in_array("modificar horario_docente", $nivel1)) {



                    $respuesta = $respuesta . '<a href="#editClase" class="edit" data-toggle="modal" onclick="modificar(`' . $r['id'] . '`)">
                <i class="material-icons"  title="MODIFICAR"><img src="assets/icon/pencill.png"/></i>
               </a>';
                }
                if (in_array("eliminar horario_docente", $nivel1)) {
                    $respuesta = $respuesta . '<a href="#deleteClase" class="delete" data-toggle="modal"  onclick="eliminar(`' . $r['id'] . '`)">
               <i class="material-icons"  title="BORRAR"><img src="assets/icon/trashh.png"/></i>    
               </a>';
                }
                $respuesta = $respuesta . '</th>';
                $respuesta = $respuesta . '</tr>';
            }


            return $respuesta;
        } catch (Exception $e) {

            return false;
        }
    }
    //<!---------------------------------fin funcion consultar------------------------------------------------------------------>

    public function consultar2()
    {
        $co = $this->conecta();

        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {


            $resultado = $co->prepare("SELECT materias.*,años.anos from materias
            INNER join años_materias
            on materias.id = años_materias.id_materias
            INNER JOIN años
            on años_materias.id_anos = años.id
            
            WHERE materias.estado=1;");
            $resultado->execute();
            $respuesta = "";
            $respuesta2 = "";
            $respuesta2 = $respuesta2 . '<option value="" selected hidden>-Seleccionar-</option>';

            foreach ($resultado as $r) {
                $respuesta2 = $respuesta2 . '<option value="' . $r['id'] . '"  >' . $r['nombre'] ." - ". $r['anos'] . '</option>';



                $respuesta = $respuesta . '</tr>';
            }




            return $respuesta2;
        } catch (Exception $e) {

            return false;
        }
    }

    

    public function consultar3()
    {
        $co = $this->conecta();

        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {


            $resultado = $co->prepare("SELECT * from docentes where estado = 1");
            $resultado->execute();
            $respuesta = "";
            $respuesta2 = "";
            $respuesta2 = $respuesta2 . '<option value="" selected hidden>-Seleccionar-</option>';

            foreach ($resultado as $r) {
                $respuesta2 = $respuesta2 . '<option value="' . $r['cedula'] . '"  >' . $r['cedula'] ." - " . $r['nombre'] . '</option>';



                $respuesta = $respuesta . '</tr>';
            }




            return $respuesta2;
        } catch (Exception $e) {

            return false;
        }
    }




    public function consultar4()
    {
        $co = $this->conecta();

        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {


            $resultado = $co->prepare("SELECT secciones_años.id, años.anos, secciones.secciones, secciones_años.estado
            FROM secciones_años
            INNER JOIN años on secciones_años.id_anos=años.id
            INNER JOIN secciones on secciones_años.id_secciones=secciones.id
            WHERE secciones_años.estado=1 AND NOT EXISTS (
              SELECT 1
              FROM secciones
              WHERE secciones.id = secciones_años.id_secciones AND secciones.secciones = 'vacia'
            );");
            $resultado->execute();
            $respuesta = "";
            $respuesta2 = "";
            $respuesta2 = $respuesta2 . '<option value="" selected hidden>-Seleccionar-</option>';

            foreach ($resultado as $r) {
                $respuesta2 = $respuesta2 . '<option value="' . $r['id'] . '"  >' . $r['anos'] . " - " . $r['secciones'] . '</option>';



                $respuesta = $respuesta . '</tr>';
            }




            return $respuesta2;
        } catch (Exception $e) {

            return false;
        }
    }



   



    public function eventos()
    {
        $co = $this->conecta();

        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {


            $resultado = $co->prepare("SELECT horario_docente.*,materias.nombre as clase,concat(docentes.nombre ,' ', docentes.cedula) as cedula,
            concat(años.anos,'-',secciones.secciones) as seccion
                        FROM horario_docente
                        
                        INNER JOIN docente_horario
                        ON horario_docente.id = docente_horario.id_horario_docente 
                        INNER JOIN docentes
                        ON docente_horario.id_docente = docentes.cedula
                        
                        
                        INNER JOIN materia_horario_docente
                        ON horario_docente.id= materia_horario_docente.id_horario_docente
                        INNER JOIN materias
                        ON materia_horario_docente.id_materias = materias.id
                        
                        
                        
                        INNER JOIN secciones_años
                        ON horario_docente.id_ano_seccion = secciones_años.id  
                        
                         INNER JOIN años
                     on secciones_años.id_anos=años.id 
                     INNER JOIN secciones 
                     on secciones_años.id_secciones=secciones.id 
                        
            
                        WHERE horario_docente.estado = 1  
            ORDER BY `horario_docente`.`id_ano_seccion` DESC;");
            $resultado->execute();

            $evento = $resultado->fetchAll(PDO::FETCH_ASSOC);


            return $evento;
        } catch (Exception $e) {

            return false;
        }
    }

    public function eventos_selector()
    {
        $co = $this->conecta();

        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {


            $resultado = $co->prepare("SELECT DISTINCT concat(docentes.nombre ,' ', docentes.cedula) as cedula
            FROM horario_docente
            
            INNER JOIN docente_horario
            ON horario_docente.id = docente_horario.id_horario_docente 
            INNER JOIN docentes
            ON docente_horario.id_docente = docentes.cedula
            
            
            INNER JOIN materia_horario_docente
            ON horario_docente.id= materia_horario_docente.id_horario_docente
            
            
            
            
            INNER JOIN secciones_años
            ON horario_docente.id_ano_seccion = secciones_años.id  

            WHERE horario_docente.estado = 1;


            ORDER BY `horario_docente`.`id` ASC;");
            $resultado->execute();

            $evento = $resultado->fetchAll(PDO::FETCH_ASSOC);

            return $evento;
        } catch (Exception $e) {

            return false;
        }
    }
    public function eventos_selector2()
    {
        $co = $this->conecta();

        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {


            $resultado = $co->prepare("SELECT DISTINCT   horario_docente.id_ano_seccion as ide,concat(años.anos ,'-', secciones.secciones) as seccion
            FROM horario_docente
            
            
            INNER JOIN secciones_años
            ON horario_docente.id_ano_seccion = secciones_años.id  
            
             INNER JOIN años
         	on secciones_años.id_anos=años.id 
        	 INNER JOIN secciones 
        	 on secciones_años.id_secciones=secciones.id 

            WHERE horario_docente.estado = 1;");
            $resultado->execute();

            $evento = $resultado->fetchAll(PDO::FETCH_ASSOC);

            return $evento;
        } catch (Exception $e) {

            return false;
        }
    }














    //<!---------------------------------funcion existe------------------------------------------------------------------>


    //<!---------------------------------fin de funcion existe------------------------------------------------------------------>



    private function existe_c($dia, $clase_inicia, $clase_termina, $ano, $estado)
{
    $co = $this->conecta();

        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        try {
    $consulta = "SELECT * FROM horario_docente WHERE dia = :dia AND id_ano_seccion = :id_ano_seccion AND estado = :estado AND clase_inicia <= :clase_termina AND clase_termina >= :clase_inicia;";
    $r = $this->conecta()->prepare($consulta);
    $r->bindParam(':dia', $dia);
    $r->bindParam(':clase_inicia', $clase_inicia);
    $r->bindParam(':clase_termina', $clase_termina);
    $r->bindParam(':id_ano_seccion', $ano);
    $r->bindParam(':estado', $estado);
    $r->execute();

    if ($r->rowCount() > 0) {
        return "4Ya existe una existe una clase en ese bloque academico, eliga una seccion o hora diferente";
    }

    return true;

} catch (Exception $e) {

    return false;
}
}

















    //<!---------------------------------funcion eliminar------------------------------------------------------------------>
    private function eliminar1()
    {
        $co = $this->conecta();
        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if ($this->existe($this->id, "SELECT * FROM `horario_docente` WHERE id= :id; ",':id')) {


            try {
                $r = $co->prepare("UPDATE `horario_docente` SET `estado`= 0 WHERE id=:id");
                $r->bindParam(':id', $this->id);
                $r->execute();

                // Registrar en logs
                $this->logger->info("Clase Eliminada: ID {$this->id}.");

                $this->bitacora("se elimino una clase", "Horario", $this->nivel);
                return "3Registro Eliminado";
            } catch (Exception $e) {

                // Registrar error en logs
                $this->logger->error("Error al eliminar la clase: " . $e->getMessage());

                return $e->getMessage();
            }
        } else {
            return "4Clase no registrada";
        }
    }


    private function bitacora($accion, $modulo, $id)
    {
        try {
            $co = $this->conecta1();
            $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            parent::registrar_bitacora($accion, $modulo, $id);;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }




    //<!---------------------------------Fin de funcion eliminar------------------------------------------------------------------>
}
