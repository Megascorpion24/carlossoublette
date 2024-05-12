<?php

require_once('../../modelo/conexion.php');




class horario extends datos
{


      


    //<!---------------------------------funcion consultar------------------------------------------------------------------>          
    public function consultar()
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
            $r = $resultado->fetchAll(PDO::FETCH_ASSOC);
            return $r;

            
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

















}


?>