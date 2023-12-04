<?php

require_once('modelo/conexion.php');
class horario extends datos
{


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
    public function set_ano_academico($valor){
        if (preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?]*$/", $valor)) {
		    $this->ano_academico = $valor;  
            // $this->s;
            return true;
            }else{
                return false;
            }
	}

    public function registrar()
    {
        $val = $this->registrar1();
        echo $val;
    }

    public function modificar()
    {
        $val = $this->modificar1();
        echo $val;
    }

    public function eliminar()
    {
        $val = $this->eliminar1();
        echo $val;
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


            $consulta = "SELECT * FROM horario_docente WHERE dia = :dia AND id_ano_seccion = :id_ano_seccion AND estado = :estado AND clase_inicia <= :clase_termina AND clase_termina >= :clase_inicia;";
            $r = $co->prepare($consulta);


            $r->bindParam(':dia', $this->dia);
            $r->bindParam(':clase_inicia', $this->clase_inicia);
            $r->bindParam(':clase_termina', $this->clase_termina);
            $r->bindParam(':id_ano_seccion', $this->ano);
            $r->bindParam(':estado', $estado);

            $r->execute();

            if ($r->rowCount() > 0) {
                return "Ya existe una existe una clase en ese bloque academico, eliga una seccion o hora diferente";
            }

            $resultado2 = $co->prepare("SELECT * from  ano_academico");
			
    
    
                    $resultado2->execute();
                    $respuesta2="";
                    $fecha_ini="";
                    $fecha_cierr="";
        
                    foreach($resultado2 as $r){
                       
                        $respuesta2=$r["id"];
                        $fecha_ini=$r["fecha_ini"];
                        $fecha_cierr=$r["fecha_cierr"];
                    }
                  
                  
                  
    
            




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
        throw new Exception("La hora de inicio no puede ser mayor a la hora de término");
    }

    // Validar que clase_termina no sea menor a clase_inicio
    if ($this->clase_termina < $this->clase_inicia) {
        throw new Exception("La hora de término no puede ser menor a la hora de inicio");
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








            $this->bitacora("se registro un horario", "horario_docente", $this->nivel);

            return "Registro incluido";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    //<!---------------------------------fin de funcion registrar------------------------------------------------------------------>  
















    //<!---------------------------------funcion modificar------------------------------------------------------------------>
    private function modificar1()
    {


        $co = $this->conecta();
        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if ($this->existe($this->id)) {
            try {

                $consulta = "SELECT * FROM horario_docente WHERE dia = :dia AND id_ano_seccion = :id_ano_seccion AND estado = 1 AND clase_inicia <= :clase_termina AND clase_termina >= :clase_inicia;";
                $r = $co->prepare($consulta);


                $r->bindParam(':dia', $this->dia);
                $r->bindParam(':clase_inicia', $this->clase_inicia);
                $r->bindParam(':clase_termina', $this->clase_termina);
                $r->bindParam(':id_ano_seccion', $this->ano);


                $r->execute();

                if ($r->rowCount() >1) {
                    return "Ya existe una existe una clase en ese bloque academico, eliga una seccion o hora diferente";
                }






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
                throw new Exception("La hora de inicio no puede ser mayor a la hora de término");
            }
        
            // Validar que clase_termina no sea menor a clase_inicio
            if ($this->clase_termina < $this->clase_inicia) {
                throw new Exception("La hora de término no puede ser menor a la hora de inicio");
            }
            
           


                $r->execute();




                $this->bitacora("se modifico un horario", "horario_docente", $this->nivel);

                return "Registro modificado";
            } catch (Exception $e) {
                return $e->getMessage();
            }
        } else {
            return "clase no modificada";
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



                    $respuesta = $respuesta . '<a href="#editEmployeeModal" class="edit" data-toggle="modal" onclick="modificar(`' . $r['id'] . '`)">
                <i class="material-icons"  title="MODIFICAR"><img src="assets/icon/pencill.png"/></i>
               </a>';
                }
                if (in_array("eliminar horario_docente", $nivel1)) {
                    $respuesta = $respuesta . '<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"  onclick="eliminar(`' . $r['id'] . '`)">
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


            $resultado = $co->prepare("SELECT * from materias where estado = 1");
            $resultado->execute();
            $respuesta = "";
            $respuesta2 = "";
            $respuesta2 = $respuesta2 . '<option value="seleccionar" selected hidden>-Seleccionar-</option>';

            foreach ($resultado as $r) {
                $respuesta2 = $respuesta2 . '<option value="' . $r['id'] . '"  >' . $r['nombre'] . '</option>';



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
            $respuesta2 = $respuesta2 . '<option value="seleccionar" selected hidden>-Seleccionar-</option>';

            foreach ($resultado as $r) {
                $respuesta2 = $respuesta2 . '<option value="' . $r['cedula'] . '"  >' . $r['nombre'] . '</option>';



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


            $resultado = $co->prepare("SELECT secciones_años.id, años.anos, secciones.secciones, secciones_años.estado FROM secciones_años INNER JOIN años on secciones_años.id_anos=años.id INNER JOIN secciones on secciones_años.id_secciones=secciones.id WHERE secciones_años.estado=1;");
            $resultado->execute();
            $respuesta = "";
            $respuesta2 = "";
            $respuesta2 = $respuesta2 . '<option value="seleccionar" selected hidden>-Seleccionar-</option>';

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

    private function existe($id)
    {

        $co = $this->conecta();

        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        try {


            $resultado = $co->prepare("SELECT * FROM `horario_docente` WHERE id= :id; ");

            $resultado->bindParam(':id', $id);
            $resultado->execute();
            $fila = $resultado->fetchAll(PDO::FETCH_BOTH);
            if ($fila) {

                return true;
            } else {

                return false;
            }
        } catch (Exception $e) {

            return false;
        }
    }

    //<!---------------------------------fin de funcion existe------------------------------------------------------------------>





















    //<!---------------------------------funcion eliminar------------------------------------------------------------------>
    private function eliminar1()
    {
        $co = $this->conecta();
        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if ($this->existe($this->id)) {


            try {
                $r = $co->prepare("UPDATE `horario_docente` SET `estado`= 0 WHERE id=:id");
                $r->bindParam(':id', $this->id);
                $r->execute();
                $this->bitacora("se elimino un horario", "horario_docente", $this->nivel);
                return "Registro Eliminado";
            } catch (Exception $e) {
                return $e->getMessage();
            }
        } else {
            return "Clase no eliminada";
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




    //<!---------------------------------Fin de funcion eliminar------------------------------------------------------------------>
}
