<?php

require_once('modelo/conexion.php');
require_once 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;


class principal extends datos
{

    private $id;
    private $nombre;
    private $nivel;


    public function set_id($valor)
    {
        $this->id = $valor;
    }
    public function set_nombre($valor)
    {
        $this->nombre = $valor;
    }
    public function set_nivel($valor)
    {
        $val = $this->nivel = $valor;
    }


    //<!---------------------------------funcion registrar------------------------------------------------------------------>
    public function morocidad()
    {

        $co = $this->conecta();
        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //Existe el id

        try {
            $resultado = $co->prepare("SELECT d.id_estudiante,pagos.id, estudiantes.nombre,pagos.fecha, tutor_legal.correo 
                        FROM pagos 
                        INNER JOIN deudas d on d.id=pagos.id_deudas 
                        INNER JOIn estudiantes on estudiantes.cedula=d.id_estudiante 
                        INNER JOIN deudas de on pagos.id_deudas=de.id 
                        INNER JOIN estudiantes es on de.id_estudiante = es.cedula 
                        INNER JOIN estudiantes_tutor ON es.cedula = estudiantes_tutor.id_estudiantes 
                        INNER JOIN tutor_legal on estudiantes_tutor.id_tutor = tutor_legal.cedula 
                        WHERE pagos.estado_pagos=1 and pagos.estatus=1");
            $resultado->execute();

            $r1 = "";
            $r2 = "";
            $r3 = "";
            $r4 = "";
            date_default_timezone_set('America/Caracas');
            $fecha = date('Y-m-d');

            foreach ($resultado as $r) {
                $r1 = $r['id_estudiante'];
                $r2 = $r['nombre'];
                $r3 = $r['id'];
                $r5 = $r['correo'];
                $fecha1 = $r["fecha"];
                $nueva_fecha = date('Y-m-d', strtotime('-7 days', strtotime($fecha1)));

                if (strtotime($fecha) == strtotime($nueva_fecha)) {
                    $r = $co->prepare(
                        "Insert into notificaciones(						
                                mensaje,
                                estados,
                                titulo,
                                cedula_estudiante
                                )                
                        Values( 'la deuda se vence en 7 dias del estudiante: $r2',
                                1,
                                'pago de deuda',
                                '$r1'
                                )"
                    );
                    $r->execute();




                    $mail = new PHPMailer(true);
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'smtp-mail.outlook.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'santiagocasamayor14@hotmail.com';                     //SMTP username
                    $mail->Password   = 'Santi2002.30019081';                               //SMTP password
                    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`                  
                    //Recipients
                    $mail->setFrom('santiagocasamayor14@hotmail.com', 'SISTEMA GPUECCS');
                    $mail->addAddress($r5, $r5);     //Add a recipient
                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'U.E.Carlos Soublette-recordatorio';
                    $mail->Body    = 'Hola! este es un recordatorio automatico para recordarle se aproxima el apago de la mensualidad del estudiante ' . $r2 . '-' . $r1 . ' ';
                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                    $mail->send();
                }







                if (strtotime($fecha) >= strtotime($nueva_fecha) and  strtotime($fecha)<= strtotime($fecha1) ) {
                    $r = $co->prepare(
                        "Insert into notificaciones(						
                                mensaje,
                                estados,
                                titulo,
                                cedula_estudiante
                                )                
                        Values( 'la deuda se vence en 7 dias del estudiante: $r2',
                                1,
                                'pago de deuda',
                                '$r1'
                                )"
                    );
                    $r->execute();

                }
              
            


            }
            
            $r = $co->prepare("UPDATE deudas SET estado_deudas = 1 WHERE fecha <= DATE_SUB(NOW(), INTERVAL 1 MONTH) AND estado = 1 AND concepto = 'mensualidad'");
            $r->bindParam(':concepto', $concepto);
            $r->bindParam(':fecha', $fecha);
            $r->bindParam(':estado', $estado);
            $r->bindParam(':estado_deudas', $estado);
            $r->execute();
            
            return $fecha;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    //<!---------------------------------fin de funcion registrar------------------------------------------------------------------>  










    //<!---------------------------------funcion modificar------------------------------------------------------------------>
    public function notificaciones()
    {

        $co = $this->conecta();
        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        try {
            $resultado = $co->prepare("SELECT deudas.id,deudas.concepto, deudas.id_estudiante, es.nombre, tutor_legal.correo FROM deudas INNER JOIN estudiantes on deudas.id_estudiante=estudiantes.cedula INNER JOIN estudiantes es on deudas.id_estudiante = es.cedula INNER JOIN estudiantes_tutor ON es.cedula = estudiantes_tutor.id_estudiantes INNER JOIN tutor_legal on estudiantes_tutor.id_tutor = tutor_legal.cedula WHERE deudas.estado_deudas=1 AND deudas.concepto='mensualidad'");
            $resultado->execute();
            $resultado1 = $co->prepare("SELECT * FROM notificaciones WHERE notificaciones.estados=1");
            $resultado1->execute();
            if (!empty($resultado)) {
                $r1 = "";
                $r2 = "";
                $r3 = "";
                $r4 = "";
                $r5 = "";
                $p1 = "";
                foreach ($resultado1 as $r) {
                    $p1 = $r['mensaje'];
                }
                foreach ($resultado as $r) {
                    $r1 = $r['id'];
                    $r2 = $r['id_estudiante'];
                    $r3 = $r['nombre'];
                    $r4 = $r['concepto'];
                    $r5 = $r['correo'];


                    if (!$p1 == 'hay una deuda pendiente con concepto de: $r4 que corresponde al estudiante: $r3, $r2') {




                        $r = $co->prepare(
                            "Insert into notificaciones(
						
                mensaje,
                estados,
                titulo
                )

        Values( 'hay una deuda pendiente con concepto de: $r4 que corresponde al estudiante: $r3, $r2',
                1,
                'pago de deuda'
        )"
                        );
                        $r->execute();
                        $mail = new PHPMailer(true);



                        $mail->isSMTP();                                            //Send using SMTP
                        $mail->Host       = 'smtp-mail.outlook.com';                     //Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                        $mail->Username   = 'santiagocasamayor14@hotmail.com';                     //SMTP username
                        $mail->Password   = 'Santi2002.30019081';                               //SMTP password
                        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                        //Recipients
                        $mail->setFrom('santiagocasamayor14@hotmail.com', 'SISTEMA GPUECCS');
                        $mail->addAddress($r5, $r5);     //Add a recipient


                        //Content
                        $mail->isHTML(true);                                  //Set email format to HTML
                        $mail->Subject = 'U.E.Carlos Soublette-recordatorio';
                        $mail->Body    = 'Hola! este es un recordatorio automatico para recordarle el sobre el pago de la mensualidad del estudiante ' . $r2 . '-' . $r1 . ', Gracias y que tenga un feliz dia! ';
                        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                        $mail->send();
                    }
                }
            }

            return "Registro modificado";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    //<!---------------------------------fin de funcion modificar------------------------------------------------------------------>  




    //<!---------------------------------funcion consultar------------------------------------------------------------------>          
    public function consultar()
    {
        $co = $this->conecta();

        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {


            $resultado = $co->prepare("SELECT * FROM `notificaciones` WHERE notificaciones.estados=1");
            $resultado->execute();
            $respuesta = "";
            $coun = 0;
            foreach ($resultado as $r) {
                $respuesta = $respuesta . '<li><a href="?pagina=pagos">' . $r["titulo"] . '</a><input type="text" value="' . $r["id"] . '" class="ocultar" name="estados" id="estados" onclick="funcion_estado()"></li><hr>';
                $coun++;
            }
            $fila = array($respuesta, $coun);
            return $fila;
        } catch (Exception $e) {

            return false;
        }
    }
    //<!---------------------------------fin funcion consultar------------------------------------------------------------------>


    //<!---------------------------------funcion existe------------------------------------------------------------------>

    //<!---------------------------------fin de funcion existe------------------------------------------------------------------>



    //<!---------------------------------funcion eliminar------------------------------------------------------------------>




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
