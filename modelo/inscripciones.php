<?php

require_once('conexion.php');
class inscripciones extends datos
{
    private $cedula_repre;
    private $estudiante;
    private $cedula_estudiante;
    private $nombre_estudiante;
    private $apellido_estudiante;
    private $edad_estudiante;
    private $materia;
    private $observaciones;
    private $sangre;
    private $vacunas;
    private $operaciones;
    private $enfermedades;
    private $medicamentos;
    private $alergias;
    private $tratamientos;
    private $condicion;
    private $ano;
    private $seccion;
    private $nivel;






    public function set_cedula_repre($valor)
    {
        if (preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\\s|,.<>\/?\s]{7,9}$/", $valor)) {
            $this->cedula_repre = $valor;
            return true;
        } else {
            return false;
        }
    }
    public function set_estudiante($valor)
    {
        if (preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?\s]*$/", $valor)) {
            $this->estudiante = $valor;
            return true;
        } else {
            return false;
        }
    }
    public function set_cedula_estudiante($valor)
    {
        $cexryp = $this->decryptMessage($valor);
        if (preg_match("/^[0-9\s]{7,8}$/", $cexryp)) {
            $this->cedula_estudiante = $cexryp;
            return true;
        } else {
            return false;
        }
    }
    public function set_cedula_estudiante1($valor)
    {
       
        if (preg_match("/^[0-9\s]{7,8}$/", $valor)) {
            $this->cedula_estudiante = $valor;
            return true;
        } else {
            return false;
        }
    }
    public function set_nombre_estudiante($valor)
    {
        $cexryp = $this->decryptMessage($valor);
        if (preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?\s]*$/", $cexryp)) {
            $this->nombre_estudiante = $cexryp;
            return true;
        } else {
            return false;
        }
    }
    public function set_nombre_estudiante1($valor)
    {
      
        if (preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?\s]*$/", $valor)) {
            $this->nombre_estudiante = $valor;
            return true;
        } else {
            return false;
        }
    }
    public function set_apellido_estudiante($valor)
    {
        $cexryp = $this->decryptMessage($valor);
        if (preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?\s]*$/", $cexryp)) {
            $this->apellido_estudiante = $cexryp;
            return true;
        } else {
            return false;
        }
    }
    public function set_apellido_estudiante1($valor)
    {

        if (preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?\s]*$/", $valor)) {
            $this->apellido_estudiante = $valor;
            return true;
        } else {
            return false;
        }
    }
    public function set_edad_estudiante($valor)
    {
        $cexryp = $this->decryptMessage($valor);
        if (preg_match("/^[0-9\s]{1,2}$/", $cexryp)) {
            $this->edad_estudiante = $cexryp;
            return true;
        } else {
            return false;
        }
    }
    public function set_edad_estudiante1($valor)
    {

        if (preg_match("/^[0-9\s]{1,2}$/", $valor)) {
            $this->edad_estudiante = $valor;
            return true;
        } else {
            return false;
        }
    }
    public function set_materia($valor)
    {
        if (preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?\s]*$/", $valor)) {
            $this->materia = $valor;
            return true;
        } else {
            return false;
        }
    }
    public function set_observaciones($valor)
    {
        if (preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?\s]*$/", $valor)) {
            $this->observaciones = $valor;
            return true;
        } else {
            return false;
        }
    }
    public function set_sangre($valor)
    {
        if (preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?\s]*$/", $valor)) {
            $this->sangre = $valor;
            return true;
        } else {
            return false;
        }
    }
    public function set_vacunas($valor)
    {
        if (preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?\s]*$/", $valor)) {
            $this->vacunas = $valor;
            return true;
        } else {
            return false;
        }
    }
    public function set_operaciones($valor)
    {
        if (preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?\s]*$/", $valor)) {
            $this->operaciones = $valor;
            return true;
        } else {
            return false;
        }
    }
    public function set_enfermedades($valor)
    {
        if (preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?\s]*$/", $valor)) {
            $this->enfermedades = $valor;
            return true;
        } else {
            return false;
        }
    }
    public function set_medicamentos($valor)
    {
        if (preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?\s]*$/", $valor)) {
            $this->medicamentos = $valor;
            return true;
        } else {
            return false;
        }
    }
    public function set_alerias($valor)
    {
        if (preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?\s]*$/", $valor)) {
            $this->alergias = $valor;
            return true;
        } else {
            return false;
        }
    }
    public function set_condicion($valor)
    {
        if (preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?\s]*$/", $valor)) {
            $this->condicion = $valor;
            return true;
        } else {
            return false;
        }
    }
    public function set_tratamiento($valor)
    {
        if (preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?\s]*$/", $valor)) {
            $this->tratamientos = $valor;
            return true;
        } else {
            return false;
        }
    }
    public function set_ano($valor)
    {
        if (preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?\s]*$/", $valor)) {
            $this->ano = $valor;
            return true;
        } else {
            return false;
        }
    }
    public function set_seccion($valor)
    {
        if (preg_match("/^[0-9\s]{1,5}$/", $valor)) {
            $this->seccion = $valor;
            return true;
        } else {
            return false;
        }
    }

    public function set_nivel($valor)
    {
        $this->nivel = $valor;
    }














    public function registrar()
    {
        $var = $this->registrar1();
        return $var;
    }

    public function modificar()
    {
        $var = $this->modificar1();
        return $var;
    }

    public function eliminar()
    {
        $var = $this->eliminar1();
        return $var;
    }

    private function registrar1()
    {


        $co = $this->conecta();
        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        try {









            if ($this->estudiante == 1) {



                if (!$this->existe($this->cedula_estudiante, "Select * from estudiantes where cedula=:cedula", ':cedula')) {










                    $estado = 1;

                    $co->exec("SET AUTOCOMMIT = 0");

                    $co->exec("LOCK TABLES estudiantes WRITE, ficha_medica WRITE, estudiantes_tutor WRITE, estudiante_ficha WRITE, ano_academico WRITE,ano_estudiantes WRITE,deudas WRITE");
                    $co->exec("START TRANSACTION");

                    $r = $co->prepare("Insert into estudiantes(
						
                        cedula,
                        nombre,
                        apellido,
                        edad,
                        observaciones,
                        materias_pendientes,
                        id_anos_secciones,
                        estado 
                        )
                
    
                        Values(
                            :cedula,
                            :nombre,
                            :apellido,
                            :edad,
                            :observaciones,
                            :materias_pendientes,
                            :id_anos_secciones,
                            :estado

                        
                        )");
                    $r->bindParam(':cedula', $this->cedula_estudiante);
                    $r->bindParam(':nombre', $this->nombre_estudiante);
                    $r->bindParam(':apellido', $this->apellido_estudiante);
                    $r->bindParam(':edad', $this->edad_estudiante);
                    $r->bindParam(':observaciones', $this->observaciones);
                    $r->bindParam(':materias_pendientes', $this->materia);
                    $r->bindParam(':id_anos_secciones', $this->ano);
                    $r->bindParam(':estado', $estado);



                    $r->execute();



                    $r = $co->prepare("Insert into ficha_medica(
						
                        tratamientos,
                        alergias,
                        medicamentos,
                        enfermedades,
                        operaciones,
                        vacunas,
                        tipo_de_sangre,
                        condicion_medica 
                        )
                
    
                        Values(
                        :tratamientos,
                        :alergias,
                        :medicamentos,
                        :enfermedades,
                        :operaciones,
                        :vacunas,
                        :tipo_de_sangre,
                        :condicion_medica 

                        
                        )");
                    $r->bindParam(':tratamientos', $this->tratamientos);
                    $r->bindParam(':alergias', $this->alergias);
                    $r->bindParam(':medicamentos', $this->medicamentos);
                    $r->bindParam(':enfermedades', $this->enfermedades);
                    $r->bindParam(':operaciones', $this->operaciones);
                    $r->bindParam(':vacunas', $this->vacunas);
                    $r->bindParam(':tipo_de_sangre', $this->sangre);
                    $r->bindParam(':condicion_medica', $this->condicion);






                    $r->execute();

                    $lid = $co->lastInsertId();



                    $r = $co->prepare("Insert into estudiantes_tutor(
						
                        id_estudiantes,
                        id_tutor
                        )
                
    
                        Values(
                        :id_estudiantes,
                        :id_tutor
                        
                        
                        )");
                    $r->bindParam(':id_estudiantes', $this->cedula_estudiante);
                    $r->bindParam(':id_tutor', $this->cedula_repre);
                    $r->execute();

                    $r = $co->prepare("Insert into estudiante_ficha(
						
                        id_estudiantes,
                        id_ficha
                        )
                
    
                        Values(
                        :id_estudiantes,
                        :id_ficha
                        
                        
                        )");



                    $r->bindParam(':id_estudiantes', $this->cedula_estudiante);
                    $r->bindParam(':id_ficha', $lid);
                    $r->execute();


                    $resultado2 = $co->prepare("SELECT * from  ano_academico");



                    $resultado2->execute();
                    $respuesta2 = "";

                    foreach ($resultado2 as $r) {

                        $respuesta2 = $r["id"];
                    }



                    $r = $co->prepare("Insert into ano_estudiantes(
						
                        id_ano,
                        id_estudiantes
                        )
                
    
                        Values(
                        :id_ano,
                        :id_estudiantes
                        
                        
                        )");
                    $r->bindParam(':id_ano', $respuesta2);
                    $r->bindParam(':id_estudiantes', $this->cedula_estudiante);
                    $r->execute();

                    $r = $co->prepare("Insert into deudas(
						
                        id_estudiante,
                        monto,
                        concepto,
                        fecha,
                        estado,
                        estado_deudas
                        )
                
    
                        Values(
                        :id_estudiante,
                        :monto,
                        :concepto,
                        :fecha,
                        :estado,
                        :estado_deudas
                        
                        
                        )");

                    $fecha = date('Y-m-d');
                    $monto = "0";
                    $concepto = "inscripcion";
                    $estado = 1;
                    $r->bindParam(':id_estudiante', $this->cedula_estudiante);
                    $r->bindParam(':monto', $monto);
                    $r->bindParam(':concepto', $concepto);
                    $r->bindParam(':fecha', $fecha);
                    $r->bindParam(':estado', $estado);
                    $r->bindParam(':estado_deudas', $estado);
                    $r->execute();

                    $r = $co->prepare("Insert into deudas(
						
                        id_estudiante,
                        monto,
                        concepto,
                        fecha,
                        estado,
                        estado_deudas
                        )
                
    
                        Values(
                        :id_estudiante,
                        :monto,
                        :concepto,
                        :fecha,
                        :estado,
                        :estado_deudas
                        
                        
                        )");

                    $fecha = date('Y-m-d');
                    $monto = "0";
                    $concepto = "mensualidad";
                    $estado = 1;
                    $r->bindParam(':id_estudiante', $this->cedula_estudiante);
                    $r->bindParam(':monto', $monto);
                    $r->bindParam(':concepto', $concepto);
                    $r->bindParam(':fecha', $fecha);
                    $r->bindParam(':estado', $estado);
                    $r->bindParam(':estado_deudas', $estado);
                    $r->execute();
                } else {
                    return "cedula registrada";
                }
            } else {
                if ($this->existe($this->cedula_estudiante, "Select * from estudiantes where cedula=:cedula", ':cedula')) {








                    $r = $co->prepare("Update estudiantes set 
                            
                       
                    nombre=:nombre,
    
                    apellido=:apellido,
                    edad=:edad,
                    observaciones=:observaciones,
                    materias_pendientes=:materias_pendientes,
                    id_anos_secciones =:id_anos_secciones,
                    estado =:estado
                    
                    where
                    cedula =:cedula

                        
                    ");
                    $estado = 1;
                    $r->bindParam(':cedula', $this->cedula_estudiante);
                    $r->bindParam(':nombre', $this->nombre_estudiante);
                    $r->bindParam(':edad', $this->edad_estudiante);
                    $r->bindParam(':observaciones', $this->observaciones);
                    $r->bindParam(':materias_pendientes', $this->materia);
                    $r->bindParam(':id_anos_secciones', $this->ano);
                    $r->bindParam(':apellido', $this->apellido_estudiante);
                    $r->bindParam(':estado', $estado);



                    $r->execute();




                    $resultado2 = $co->prepare("SELECT * from estudiante_ficha WHERE estudiante_ficha.id_estudiantes=:id_estudiantes");

                    $resultado2->bindParam(':id_estudiantes', $this->cedula_estudiante);

                    $resultado2->execute();
                    $respuesta2 = "";

                    foreach ($resultado2 as $r) {

                        $respuesta2 = $r["id_ficha"];
                    }



                    $r = $co->prepare("Update ficha_medica set 
                            
                       
                tratamientos=:tratamientos,

   
                alergias=:alergias,
                medicamentos=:medicamentos,
                enfermedades=:enfermedades,
                operaciones =:operaciones,
                vacunas=:vacunas,
                tipo_de_sangre=:tipo_de_sangre,
                condicion_medica =:condicion_medica  
                
                where
                id =:id

                    
                ");

                    $r->bindParam(':tratamientos', $this->tratamientos);
                    $r->bindParam(':alergias', $this->alergias);
                    $r->bindParam(':medicamentos', $this->medicamentos);
                    $r->bindParam(':enfermedades', $this->enfermedades);
                    $r->bindParam(':operaciones', $this->operaciones);
                    $r->bindParam(':vacunas', $this->vacunas);
                    $r->bindParam(':tipo_de_sangre', $this->sangre);
                    $r->bindParam(':condicion_medica', $this->condicion);
                    $r->bindParam(':id', $respuesta2);


                    $r->execute();

                    $resultado2 = $co->prepare("SELECT * from  ano_academico");



                    $resultado2->execute();
                    $respuesta2 = "";

                    foreach ($resultado2 as $r) {

                        $respuesta2 = $r["id"];
                    }



                    $r = $co->prepare("Insert into ano_estudiantes(
						
                        id_ano,
                        id_estudiantes
                        )
                
    
                        Values(
                        :id_ano,
                        :id_estudiantes
                        
                        
                        )");
                    $r->bindParam(':id_ano', $respuesta2);
                    $r->bindParam(':id_estudiantes', $this->cedula_estudiante);
                    $r->execute();

                    $r = $co->prepare("Insert into deudas(
						
                        id_estudiante,
                        monto,
                        concepto,
                        fecha,
                        estado,
                        estado_deudas
                        )
                
    
                        Values(
                        :id_estudiante,
                        :monto,
                        :concepto,
                        :fecha,
                        :estado,
                        :estado_deudas
                        
                        
                        )");

                    $fecha = date('Y-m-d');
                    $monto = "20";
                    $concepto = "inscripcion";
                    $estado = 1;
                    $r->bindParam(':id_estudiante', $this->cedula_estudiante);
                    $r->bindParam(':monto', $monto);
                    $r->bindParam(':concepto', $concepto);
                    $r->bindParam(':fecha', $fecha);
                    $r->bindParam(':estado', $estado);
                    $r->bindParam(':estado_deudas', $estado);
                    $r->execute();
                } else {
                    return "4cedula no registradammmmmmmmmmmm";
                }
            }

            $resultado2 = $co->prepare("SELECT cantidad from secciones_años WHERE id=:id_estudiantes");

            $resultado2->bindParam(':id_estudiantes', $this->ano);

            $resultado2->execute();
            $cantidad = "";

            foreach ($resultado2 as $r) {

                $cantidad = $r["cantidad"];
            }

            $cantidad = $cantidad - 1;

            $r = $co->prepare("Update secciones_años set 
                            
                       
                    cantidad=:cantidad
    
       
                
                    
                    where
                    id =:id
    
                        
                    ");

            $r->bindParam(':cantidad', $cantidad);
            $r->bindParam(':id', $this->ano);


            $r->execute();

            // Unlock tables
            $co->exec("UNLOCK TABLES");

            // Commit transaction
            $co->exec("COMMIT");

            // Set AutoCommit to 1
            $co->exec("SET AUTOCOMMIT = 1");


            $this->bitacora("se inscribio un estudiante", "inscripciones", $this->nivel);


            return "1Registro incluido";
        } catch (Exception $e) {
            return $e->getMessage();
            $co->exec("ROOLBACK");
            $co->exec("COMMIT");
        }
    }

































    private function modificar1()
    {


        $co = $this->conecta();
        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if ($this->existe($this->cedula_estudiante,  "Select * from estudiantes where cedula=:cedula", ':cedula')) {
            try {


                $co->exec("SET AUTOCOMMIT = 0");

                $co->exec("LOCK TABLES estudiantes WRITE, estudiante_ficha WRITE, ficha_medica WRITE");
                $co->exec("START TRANSACTION");


                $r = $co->prepare("Update estudiantes set 
                            
                       
                    nombre=:nombre,
    
                    apellido=:apellido,
                    edad=:edad,
                    observaciones=:observaciones,
                    materias_pendientes=:materias_pendientes,
                    id_anos_secciones =:id_anos_secciones 
                    
                    where
                    cedula =:cedula

                        
                    ");

                $r->bindParam(':cedula', $this->cedula_estudiante);
                $r->bindParam(':nombre', $this->nombre_estudiante);
                $r->bindParam(':edad', $this->edad_estudiante);
                $r->bindParam(':observaciones', $this->observaciones);
                $r->bindParam(':materias_pendientes', $this->materia);
                $r->bindParam(':id_anos_secciones', $this->ano);
                $r->bindParam(':apellido', $this->apellido_estudiante);


                $r->execute();

                $resultado2 = $co->prepare("SELECT * from estudiante_ficha WHERE estudiante_ficha.id_estudiantes=:id_estudiantes");

                $resultado2->bindParam(':id_estudiantes', $this->cedula_estudiante);

                $resultado2->execute();
                $respuesta2 = "";

                foreach ($resultado2 as $r) {

                    $respuesta2 = $r["id_ficha"];
                }



                $r = $co->prepare("Update ficha_medica set 
                            
                       
                tratamientos=:tratamientos,

   
                alergias=:alergias,
                medicamentos=:medicamentos,
                enfermedades=:enfermedades,
                operaciones =:operaciones,
                vacunas=:vacunas,
                tipo_de_sangre=:tipo_de_sangre,
                condicion_medica =:condicion_medica  
                
                where
                id =:id

                    
                ");

                $r->bindParam(':tratamientos', $this->tratamientos);
                $r->bindParam(':alergias', $this->alergias);
                $r->bindParam(':medicamentos', $this->medicamentos);
                $r->bindParam(':enfermedades', $this->enfermedades);
                $r->bindParam(':operaciones', $this->operaciones);
                $r->bindParam(':vacunas', $this->materia);
                $r->bindParam(':tipo_de_sangre', $this->sangre);
                $r->bindParam(':condicion_medica', $this->condicion);
                $r->bindParam(':id', $respuesta2);


                // Unlock tables
                $co->exec("UNLOCK TABLES");

                // Commit transaction
                $co->exec("COMMIT");

                // Set AutoCommit to 1
                $co->exec("SET AUTOCOMMIT = 1");





                $this->bitacora("se modifico un estudiante", "inscripciones", $this->nivel);
                return "2Registro modificado";
            } catch (Exception $e) {
                return $e->getMessage();
                $co->exec("ROOLBACK");
                $co->exec("COMMIT");
            }
        } else {
            return "4cedula no registrada";
        }
    }


    public function consultar($nivel1, $id1)
    {
        $co = $this->conecta();

        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {
            if ($id1 == 0) {


                $resultado = $co->prepare("SELECT * FROM `ano_academico` WHERE estado=1");
                $resultado->execute();
                $respuesta = '';
                $posision = 0;
                foreach ($resultado as $r) {

                    $respuesta = $r['id'];
                }
                $id = $respuesta;
            } else {
                $id = $id1;
            }


            $resultado = $co->prepare("SELECT estudiantes.*, años.anos, secciones.secciones, secciones_años.id, estudiantes.estado validacion FROM secciones_años INNER JOIN años on secciones_años.id_anos=años.id INNER JOIN secciones on secciones_años.id_secciones=secciones.id INNER JOIN estudiantes on secciones_años.id=estudiantes.id_anos_secciones INNER JOIN ano_estudiantes on ano_estudiantes.id_estudiantes=estudiantes.cedula INNER JOIN ano_academico ON ano_academico.id=ano_estudiantes.id_ano ORDER by años.anos, secciones.secciones;");
            $resultado->execute();
            //Consulta movil
            if (in_array("request_app", $nivel1)) { // Corregido aquí
                $r = $resultado->fetchAll(PDO::FETCH_ASSOC);
                return $r;
            }

            //Consulta web
            $respuesta = "";

            foreach ($resultado as $r) {
                
                $respuesta = $respuesta . "<td>" . $r['cedula'] . "</td>";
                $respuesta = $respuesta . "<td>" . $r['nombre'] . "</td>";
                $respuesta = $respuesta . "<td>" . $r['apellido'] . "</td>";
                $respuesta = $respuesta . "<td>" . $r['edad'] . "</td>";
                $respuesta = $respuesta . "<td>" . $r['observaciones'] . "</td>";
                $respuesta = $respuesta . "<td>" . $r['materias_pendientes'] . "</td>";
                $respuesta = $respuesta . "<td>" . $r['anos'] . "</td>";
                $respuesta = $respuesta . "<td>" . $r['secciones'] . "</td>";

                $respuesta = $respuesta . '<td>';
                
                if (in_array("modificar inscipcion", $nivel1)) {
                    $estado= $r['estado'];
                    if($estado > 0){
                        if ($r['secciones']=="vacia") {
                            $respuesta =  '<tr style="background-color: #c4ffe5;">'.$respuesta;
                          
                        }else{
                            $respuesta =  '<tr>'.$respuesta;
                        }
                        $respuesta = $respuesta . '<a href="#editEmployeeModal" class="edit" data-toggle="modal" onclick="modificar(`' . $r['cedula'] . '`,`' . $r['anos'] . ' - ' . $r['secciones'] . '`)">
                        <i class="material-icons"  title="MODIFICAR"><img src="assets/icon/pencill.png"/></i>
                       </a>';
                   }
                   else{
                    $respuesta = $respuesta . '<a href="#" class="edit" data-toggle="modal" >
                    <i class="material-icons"  title="MODIFICAR"><img style="width: 18px;" src="assets/icon/pencil2.png"/></i>
                   </a>';
                    }


                    
                }
                if (in_array("eliminar inscipcion", $nivel1)) {
                    $estado= $r['estado'];
                    if($estado > 0){
                    

                        $respuesta = $respuesta . '<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"  onclick="eliminar(`' . $r['cedula'] . '`)">
                        <i class="material-icons"  title="BORRAR"><img src="assets/icon/trashh.png"/></i>    
                        </a>';
            }
            else{
                
                $respuesta = $respuesta . '<a href="#" class="delete" data-toggle="modal" >
                <i class="material-icons"  title="BORRAR"><img  style="width: 18px;" src="assets/icon/basura.png"/></i>    
                </a>';

           
             }
             
                }
                $respuesta = $respuesta . '</td>';

                $respuesta = $respuesta . '</tr>';
            }


            return $respuesta;
        } catch (Exception $e) {

            return false;
        }
    }

    public function consultar20()
    {
        $co = $this->conecta();

        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {


            $resultado = $co->prepare("SELECT * FROM `ano_academico` WHERE 1");
            $resultado->execute();
            $respuesta = '';
            $posision = 0;
            foreach ($resultado as $r) {
                if ($posision == 0) {
                    $respuesta = $respuesta . '<option value="' . $r['id'] . '" selected>' . $r['ano_academico'] . '</option>';
                } else {
                    $respuesta = $respuesta . '<option value="' . $r['id'] . '">' . $r['ano_academico'] . '</option>';
                }


                $posision++;
            }


            return $respuesta;
        } catch (Exception $e) {

            return false;
        }
    }

    public function consultar1()
    {
        $co = $this->conecta();

        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {


            $resultado = $co->prepare("SELECT *FROM (SELECT * FROM tutor_legal) n WHERE  n.estado=1");
            $resultado->execute();
            $respuesta = "";
            $respuesta2 = "";
            $respuesta2 = $respuesta2 . '<option value="seleccionar" selected hidden>-Seleccionar-</option>';

            foreach ($resultado as $r) {
                $respuesta2 = $respuesta2 . '<option value="' . $r['cedula'] . '"  >' . $r['cedula'] . ' -- ' . $r['nombre1'] . '</option>';
                $respuesta = $respuesta . '<tr>';
                $respuesta = $respuesta . "<th>" . $r['cedula'] . "</th>";
                $respuesta = $respuesta . "<th>" . $r['nombre1'] . "</th>";
                $respuesta = $respuesta . "<th>" . $r['nombre2'] . "</th>";
                $respuesta = $respuesta . "<th>" . $r['apellido1'] . "</th>";
                $respuesta = $respuesta . "<th>" . $r['apellido2'] . "</th>";
                $respuesta = $respuesta . "<th>" . $r['telefono'] . "</th>";
                $respuesta = $respuesta . "<th>" . $r['correo'] . "</th>";



                $respuesta = $respuesta . '</tr>';
            }

            $fila = array($respuesta, $respuesta2);


            return $fila;
        } catch (Exception $e) {

            return false;
        }
    }

    public function consultar2()
    {
        $co = $this->conecta();

        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {

            $resultado2 = $co->prepare("SELECT * from  ano_academico");



            $resultado2->execute();
            $respuesta2 = "";

            foreach ($resultado2 as $r) {

                $respuesta2 = $r["id"];
            }

            $resultado = $co->prepare("SELECT * FROM estudiantes INNER JOIN estudiante_ficha ON estudiante_ficha.id_estudiantes=estudiantes.cedula INNER JOIN ficha_medica on ficha_medica.id=estudiante_ficha.id_ficha INNER JOIN secciones_años on secciones_años.id= estudiantes.id_anos_secciones WHERE estudiantes.estado='0'");
            $resultado->execute();
            $respuesta = "";
            $respuesta2 = "";
            $respuesta2 = $respuesta2 . '<option value="seleccionar" selected hidden>-Seleccionar-</option>';
            $respuesta45 = "";
            foreach ($resultado as $r) {
                $respuesta2 = $respuesta2 . '<option value="' . $r['cedula'] . '"  >' . $r['cedula'] . ' -- ' . $r['nombre'] . '</option>';
                $respuesta = $respuesta . '<tr>';
                $respuesta = $respuesta . "<th>" . $r['cedula'] . "</th>";
                $respuesta = $respuesta . "<th>" . $r['nombre'] . "</th>";
                $respuesta = $respuesta . "<th>" . $r['apellido'] . "</th>";
                $respuesta = $respuesta . "<th>" . $r['edad'] . "</th>";
                $respuesta = $respuesta . "<th>" . $r['observaciones'] . "</th>";



                $respuesta = $respuesta . "<th>" . $r['materias_pendientes'] . "</th>";


                $respuesta = $respuesta . "<th>" . $r['tratamientos'] . "</th>";
                $respuesta = $respuesta . "<th>" . $r['alergias'] . "</th>";
                $respuesta = $respuesta . "<th>" . $r['medicamentos'] . "</th>";
                $respuesta = $respuesta . "<th>" . $r['enfermedades'] . "</th>";
                $respuesta = $respuesta . "<th>" . $r['operaciones'] . "</th>";
                $respuesta = $respuesta . "<th>" . $r['vacunas'] . "</th>";
                $respuesta = $respuesta . "<th>" . $r['tipo_de_sangre'] . "</th>";
                $respuesta = $respuesta . "<th>" . $r['condicion_medica'] . "</th>";
                $respuesta = $respuesta . "<th>" . $r['id_anos'] . "</th>";






                $respuesta = $respuesta . '</tr>';
            }




            $fila = array($respuesta, $respuesta2, $respuesta45);


            return $fila;
        } catch (Exception $e) {

            return false;
        }
    }


    public function consultar54()
    {
        $co = $this->conecta();

        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {

            $resultado2 = $co->prepare("SELECT * from  ano_academico");



            $resultado2->execute();
            $respuesta2 = "";

            foreach ($resultado2 as $r) {

                $respuesta2 = $r["id"];
            }

            $resultado = $co->prepare("SELECT * FROM estudiantes INNER JOIN estudiante_ficha ON estudiante_ficha.id_estudiantes=estudiantes.cedula INNER JOIN ficha_medica on ficha_medica.id=estudiante_ficha.id_ficha INNER JOIN secciones_años on secciones_años.id= estudiantes.id_anos_secciones WHERE estudiantes.estado='1'");
            $resultado->execute();
            $respuesta = "";
            $respuesta2 = "";
            $respuesta2 = $respuesta2 . '<option value="seleccionar" selected hidden>-Seleccionar-</option>';
            $respuesta45 = "";
            foreach ($resultado as $r) {
                $respuesta2 = $respuesta2 . '<option value="' . $r['cedula'] . '"  >' . $r['cedula'] . ' -- ' . $r['nombre'] . '</option>';
                $respuesta = $respuesta . '<tr>';
                $respuesta = $respuesta . "<th>" . $r['cedula'] . "</th>";
                $respuesta = $respuesta . "<th>" . $r['nombre'] . "</th>";
                $respuesta = $respuesta . "<th>" . $r['apellido'] . "</th>";
                $respuesta = $respuesta . "<th>" . $r['edad'] . "</th>";
                $respuesta = $respuesta . "<th>" . $r['observaciones'] . "</th>";



                $respuesta = $respuesta . "<th>" . $r['materias_pendientes'] . "</th>";


                $respuesta = $respuesta . "<th>" . $r['tratamientos'] . "</th>";
                $respuesta = $respuesta . "<th>" . $r['alergias'] . "</th>";
                $respuesta = $respuesta . "<th>" . $r['medicamentos'] . "</th>";
                $respuesta = $respuesta . "<th>" . $r['enfermedades'] . "</th>";
                $respuesta = $respuesta . "<th>" . $r['operaciones'] . "</th>";
                $respuesta = $respuesta . "<th>" . $r['vacunas'] . "</th>";
                $respuesta = $respuesta . "<th>" . $r['tipo_de_sangre'] . "</th>";
                $respuesta = $respuesta . "<th>" . $r['condicion_medica'] . "</th>";
                $respuesta = $respuesta . "<th>" . $r['id_anos'] . "</th>";






                $respuesta = $respuesta . '</tr>';
            }




            $fila = array($respuesta, $respuesta2, $respuesta45);


            return $fila;
        } catch (Exception $e) {

            return false;
        }
    }

    public function consultar3()
    {
        $co = $this->conecta();

        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {


            $resultado = $co->prepare("SELECT secciones_años.id, años.anos, secciones.secciones, secciones_años.cantidad,secciones_años.estado FROM secciones_años INNER JOIN años on secciones_años.id_anos=años.id INNER JOIN secciones on secciones_años.id_secciones=secciones.id ORDER by  años.anos, secciones.secciones AND secciones.estado=1 and años.estado=1 and secciones_años.cantidad=0;");
            $resultado->execute();

            $respuesta2 = "";
            $respuesta2 =  '<option value="seleccionar" selected hidden>-Seleccionar-</option>';

            foreach ($resultado as $r) {
                if ($r['cantidad'] > 0 && $r['secciones'] != "vacia" && $r['estado'] != 0) {
                    $respuesta2 = $respuesta2 . '<option value="' . $r['id'] . '"  >' . $r['anos'] . " - " . $r['secciones'] . ' - ' . 'cupos: ' . $r['cantidad'] . '</option>';
                }
            }




            return $respuesta2;
        } catch (Exception $e) {

            return false;
        }
    }


    public function consulta5()
    {
        $co = $this->conecta();

        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {


            $resultado = $co->prepare("SELECT * FROM `deudas` INNER JOIN estudiantes on estudiantes.cedula=deudas.id_estudiante WHERE estado_deudas=1 and concepto='mensualidad' AND estudiantes.estado=0");
            $resultado->execute();
            $respuesta = "";


            foreach ($resultado as $r) {
                $respuesta = $respuesta . '<tr>';
                $respuesta = $respuesta . "<th>" . $r['id_estudiante'] . "</th>";


                $respuesta = $respuesta . '</tr>';
            }




            return $respuesta;
        } catch (Exception $e) {

            return false;
        }
    }



    public function consultar4()
    {
        $co = $this->conecta();

        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {


            $resultado = $co->prepare("SELECT * FROM años");
            $resultado->execute();
            $respuesta = "";
            $respuesta2 = "";
            $respuesta2 = $respuesta2 . '<option value="seleccionar" selected hidden>-Seleccionar-</option>';

            foreach ($resultado as $r) {
                $respuesta2 = $respuesta2 . '<option value="' . $r['id'] . '"  >' . $r['anos'] . '</option>';



                $respuesta = $respuesta . '</tr>';
            }




            return $respuesta2;
        } catch (Exception $e) {

            return false;
        }
    }









    public function eliminar1()
    {
        $co = $this->conecta();
        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if ($this->existe($this->cedula_estudiante,  "Select * from estudiantes where cedula=:cedula", ':cedula')) {


            try {

                $resultado = $co->prepare("SELECT * FROM deudas WHERE deudas.id_estudiante=:cedula and deudas.estado_deudas=1 AND deudas.estado=1;");
                $resultado->bindParam(':cedula', $this->cedula_estudiante);
                $resultado->execute();
                $respuesta = "";
                $respuesta2 = "";


                foreach ($resultado as $r) {
                    $respuesta2 = $r['id_estudiante'];
                }

                if (empty($respuesta2)) {
                    # code...

                    $estado = 0;
                    $r = $co->prepare("Update estudiantes set 
                            
                       
                estado=:estado
                
                where
                cedula =:cedula

                    
                ");

                    $r->bindParam(':cedula', $this->cedula_estudiante);
                    $r->bindParam(':estado', $estado);



                    $r->execute();

                    $r = $co->prepare("UPDATE deudas set 
                        
                        estado_deudas=0,
                        estado=0
               
                where
                id_estudiante =:id

                ");
                    $r->bindParam(':id', $this->cedula_estudiante);



                    $r->execute();

                    $this->bitacora("se elimino un estudiante", "inscripciones", $this->nivel);
                    return "3Registro Eliminado";
                } else {
                    return "4no se puede eliminar porque este estudiante tiene deudas pendientes";
                }
            } catch (Exception $e) {
                return $e->getMessage();
            }
        } else {
            return "4Cedula no registrada";
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




    //funcion para importar 
    public function importar()
    {

        $co = $this->conecta();
        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        try {









            if ($this->estudiante == 1) {


                if (!$this->existe($this->cedula_estudiante,  "Select * from estudiantes where cedula=:cedula", ':cedula')) {














                    $estado = 1;

                    $co->exec("SET AUTOCOMMIT = 0");

                    $co->exec("LOCK TABLES estudiantes WRITE, ficha_medica WRITE, estudiantes_tutor WRITE, estudiante_ficha WRITE, ano_academico WRITE,ano_estudiantes WRITE,deudas WRITE");
                    $co->exec("START TRANSACTION");

                    $r = $co->prepare("Insert into estudiantes(
						
                        cedula,
                        nombre,
                        apellido,
                        edad,
                        observaciones,
                        materias_pendientes,
                        id_anos_secciones,
                        estado 
                        )
                
    
                        Values(
                            :cedula,
                            :nombre,
                            :apellido,
                            :edad,
                            :observaciones,
                            :materias_pendientes,
                            :id_anos_secciones,
                            :estado

                        
                        )");
                    $r->bindParam(':cedula', $this->cedula_estudiante);
                    $r->bindParam(':nombre', $this->nombre_estudiante);
                    $r->bindParam(':apellido', $this->apellido_estudiante);
                    $r->bindParam(':edad', $this->edad_estudiante);
                    $r->bindParam(':observaciones', $this->observaciones);
                    $r->bindParam(':materias_pendientes', $this->materia);
                    $r->bindParam(':id_anos_secciones', $this->ano);
                    $r->bindParam(':estado', $estado);



                    $r->execute();



                    $r = $co->prepare("Insert into ficha_medica(
						
                        tratamientos,
                        alergias,
                        medicamentos,
                        enfermedades,
                        operaciones,
                        vacunas,
                        tipo_de_sangre,
                        condicion_medica 
                        )
                
    
                        Values(
                        :tratamientos,
                        :alergias,
                        :medicamentos,
                        :enfermedades,
                        :operaciones,
                        :vacunas,
                        :tipo_de_sangre,
                        :condicion_medica 

                        
                        )");
                    $r->bindParam(':tratamientos', $this->tratamientos);
                    $r->bindParam(':alergias', $this->alergias);
                    $r->bindParam(':medicamentos', $this->medicamentos);
                    $r->bindParam(':enfermedades', $this->enfermedades);
                    $r->bindParam(':operaciones', $this->operaciones);
                    $r->bindParam(':vacunas', $this->vacunas);
                    $r->bindParam(':tipo_de_sangre', $this->sangre);
                    $r->bindParam(':condicion_medica', $this->condicion);






                    $r->execute();

                    $lid = $co->lastInsertId();



                    $r = $co->prepare("Insert into estudiantes_tutor(
						
                        id_estudiantes,
                        id_tutor
                        )
                
    
                        Values(
                        :id_estudiantes,
                        :id_tutor
                        
                        
                        )");
                    $r->bindParam(':id_estudiantes', $this->cedula_estudiante);
                    $r->bindParam(':id_tutor', $this->cedula_repre);
                    $r->execute();

                    $r = $co->prepare("Insert into estudiante_ficha(
						
                        id_estudiantes,
                        id_ficha
                        )
                
    
                        Values(
                        :id_estudiantes,
                        :id_ficha
                        
                        
                        )");



                    $r->bindParam(':id_estudiantes', $this->cedula_estudiante);
                    $r->bindParam(':id_ficha', $lid);
                    $r->execute();


                    $resultado2 = $co->prepare("SELECT * from  ano_academico");



                    $resultado2->execute();
                    $respuesta2 = "";

                    foreach ($resultado2 as $r) {

                        $respuesta2 = $r["id"];
                    }



                    $r = $co->prepare("Insert into ano_estudiantes(
						
                        id_ano,
                        id_estudiantes
                        )
                
    
                        Values(
                        :id_ano,
                        :id_estudiantes
                        
                        
                        )");
                    $r->bindParam(':id_ano', $respuesta2);
                    $r->bindParam(':id_estudiantes', $this->cedula_estudiante);
                    $r->execute();

                    $r = $co->prepare("Insert into deudas(
						
                        id_estudiante,
                        monto,
                        concepto,
                        fecha,
                        estado,
                        estado_deudas
                        )
                
    
                        Values(
                        :id_estudiante,
                        :monto,
                        :concepto,
                        :fecha,
                        :estado,
                        :estado_deudas
                        
                        
                        )");

                    $fecha = date('Y-m-d');
                    $monto = "0";
                    $concepto = "inscripcion";
                    $estado = 1;
                    $r->bindParam(':id_estudiante', $this->cedula_estudiante);
                    $r->bindParam(':monto', $monto);
                    $r->bindParam(':concepto', $concepto);
                    $r->bindParam(':fecha', $fecha);
                    $r->bindParam(':estado', $estado);
                    $r->bindParam(':estado_deudas', $estado);
                    $r->execute();

                    $r = $co->prepare("Insert into deudas(
						
                        id_estudiante,
                        monto,
                        concepto,
                        fecha,
                        estado,
                        estado_deudas
                        )
                
    
                        Values(
                        :id_estudiante,
                        :monto,
                        :concepto,
                        :fecha,
                        :estado,
                        :estado_deudas
                        
                        
                        )");

                    $fecha = date('Y-m-d');
                    $monto = "0";
                    $concepto = "mensualidad";
                    $estado = 1;
                    $r->bindParam(':id_estudiante', $this->cedula_estudiante);
                    $r->bindParam(':monto', $monto);
                    $r->bindParam(':concepto', $concepto);
                    $r->bindParam(':fecha', $fecha);
                    $r->bindParam(':estado', $estado);
                    $r->bindParam(':estado_deudas', $estado);
                    $r->execute();
               
                } else {
                    return "cedula registrada";
                }
            } else {
                if ($this->existe($this->cedula_estudiante,  "Select * from estudiantes where cedula=:cedula", ':cedula')) {








                    $r = $co->prepare("Update estudiantes set 
                            
                       
                    nombre=:nombre,
    
                    apellido=:apellido,
                    edad=:edad,
                    observaciones=:observaciones,
                    materias_pendientes=:materias_pendientes,
                    id_anos_secciones =:id_anos_secciones 
                    
                    where
                    cedula =:cedula

                        
                    ");

                    $r->bindParam(':cedula', $this->cedula_estudiante);
                    $r->bindParam(':nombre', $this->nombre_estudiante);
                    $r->bindParam(':edad', $this->edad_estudiante);
                    $r->bindParam(':observaciones', $this->observaciones);
                    $r->bindParam(':materias_pendientes', $this->materia);
                    $r->bindParam(':id_anos_secciones', $this->ano);
                    $r->bindParam(':apellido', $this->apellido_estudiante);


                    $r->execute();




                    $resultado2 = $co->prepare("SELECT * from estudiante_ficha WHERE estudiante_ficha.id_estudiantes=:id_estudiantes");

                    $resultado2->bindParam(':id_estudiantes', $this->cedula_estudiante);

                    $resultado2->execute();
                    $respuesta2 = "";

                    foreach ($resultado2 as $r) {

                        $respuesta2 = $r["id_ficha"];
                    }



                    $r = $co->prepare("Update ficha_medica set 
                            
                       
                tratamientos=:tratamientos,

   
                alergias=:alergias,
                medicamentos=:medicamentos,
                enfermedades=:enfermedades,
                operaciones =:operaciones,
                vacunas=:vacunas,
                tipo_de_sangre=:tipo_de_sangre,
                condicion_medica =:condicion_medica  
                
                where
                id =:id

                    
                ");

                    $r->bindParam(':tratamientos', $this->tratamientos);
                    $r->bindParam(':alergias', $this->alergias);
                    $r->bindParam(':medicamentos', $this->medicamentos);
                    $r->bindParam(':enfermedades', $this->enfermedades);
                    $r->bindParam(':operaciones', $this->operaciones);
                    $r->bindParam(':vacunas', $this->materia);
                    $r->bindParam(':tipo_de_sangre', $this->sangre);
                    $r->bindParam(':condicion_medica', $this->condicion);
                    $r->bindParam(':id', $respuesta2);


                    $r->execute();

                    $resultado2 = $co->prepare("SELECT * from  ano_academico");



                    $resultado2->execute();
                    $respuesta2 = "";

                    foreach ($resultado2 as $r) {

                        $respuesta2 = $r["id"];
                    }



                    $r = $co->prepare("Insert into ano_estudiantes(
						
                        id_ano,
                        id_estudiantes
                        )
                
    
                        Values(
                        :id_ano,
                        :id_estudiantes
                        
                        
                        )");
                    $r->bindParam(':id_ano', $respuesta2);
                    $r->bindParam(':id_estudiantes', $this->cedula_estudiante);
                    $r->execute();

                    $r = $co->prepare("Insert into deudas(
						
                        id_estudiante,
                        monto,
                        concepto,
                        fecha,
                        estado,
                        estado_deudas
                        )
                
    
                        Values(
                        :id_estudiante,
                        :monto,
                        :concepto,
                        :fecha,
                        :estado,
                        :estado_deudas
                        
                        
                        )");

                    $fecha = date('Y-m-d');
                    $monto = "20";
                    $concepto = "inscripcion";
                    $estado = 1;
                    $r->bindParam(':id_estudiante', $this->cedula_estudiante);
                    $r->bindParam(':monto', $monto);
                    $r->bindParam(':concepto', $concepto);
                    $r->bindParam(':fecha', $fecha);
                    $r->bindParam(':estado', $estado);
                    $r->bindParam(':estado_deudas', $estado);
                    $r->execute();
                } else {
                    return "cedula no registradammmmmmmmmmmm";
                }
            }



 // Unlock tables
 $co->exec("UNLOCK TABLES");

 // Commit transaction
 $co->exec("COMMIT");

 // Set AutoCommit to 1
 $co->exec("SET AUTOCOMMIT = 1");

            $this->bitacora("se inscribio un estudiante", "inscripciones", $this->nivel);


            return "Registro incluido";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
