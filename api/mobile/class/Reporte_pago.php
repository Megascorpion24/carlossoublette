<?php
class reporte_pagos extends datos {
    private function obtenerMontos() {
        $co = $this->conecta();
        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
        $stmt = $co->prepare("SELECT * FROM `montos`");
        $stmt->execute();
        $montos = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
        $ins = 20; // Valor predeterminado
        $men = 3;  // Valor predeterminado
  
        foreach ($montos as $monto) {
            if ($monto['tipo'] == "inscripcion") {
                $ins = $monto['m_montos'];
            } 
            if ($monto['tipo'] == "mensualidad") {
                $men = $monto['m_montos'];
            }
        }
  
        return [$ins, $men];
    }
  
    private function consultar($query, $params = []) {
        $co = $this->conecta();
        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
        $stmt = $co->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
  
    // public function consultar6() {
    //     list($ins, $men) = $this->obtenerMontos();
    //     $query = "SELECT * FROM deudas WHERE estado_deudas = 1";
    //     $resultados = $this->consultar($query);
        
    //     $date1 = new DateTime();
    //     $response = [];
    
    //     // Calcular el número de días que han pasado en el mes actual
    //     $startOfMonth = new DateTime($date1->format('Y-m-01'));
    //     $daysPassedInMonth = $date1->diff($startOfMonth)->days + 1;
    
    //     foreach ($resultados as $r) {
    //         $fechaDeuda = new DateTime($r['fecha']);
    //         $intervalo = $date1->diff($fechaDeuda);
    
    //         if ($r['concepto'] == "mensualidad" && $intervalo->m >= 1 && $date1->format('Y') == $fechaDeuda->format('Y') && $date1->format('m') == $fechaDeuda->format('m')) {
    //             $mul = $intervalo->m * $men;
    //             $response[] = ["concepto" => "mensualidad", "monto" => $mul];
    //         }
    
    //         if ($r['concepto'] == "inscripcion" && $date1->format('Y') == $fechaDeuda->format('Y') && $date1->format('m') == $fechaDeuda->format('m')) {
    //             $response[] = ["concepto" => "inscripcion", "monto" => $ins];
    //         }
    //     }
    
    //     // Añadir el número de días pasados en el mes a la respuesta
    //     $response[] = ["dias_pasados_del_mes" => $daysPassedInMonth];
    
    //     return $response;
    // }
    public function consultar6() {
        $date1 = new DateTime();
        $diasTranscurridos = (int) $date1->format('d');
        $diasTotales = (int) $date1->format('t');  // 't' returns the number of days in the month
    
        return [
            "diasTranscurridos" => $diasTranscurridos,
            "diasTotales" => $diasTotales
        ];
    }
    
    
  
    public function consultar7() {
        list($ins, $men) = $this->obtenerMontos();
        $query = "SELECT * FROM pagos WHERE estado_pagos = 1 AND estado = 'CONFIRMADO' AND estatus = 1";
        $resultados = $this->consultar($query);
  
        $date1 = new DateTime();
        $response = [];
        foreach ($resultados as $r) {
            $fechaPago = new DateTime($r['fecha']);
            if ($r['concepto'] == "mensualidad" && $date1->format('Y') == $fechaPago->format('Y') && $date1->format('m') == $fechaPago->format('m')) {
                $response[] = ["concepto" => "mensualidad", "monto" => $r['monto']];
            }
            if ($r['concepto'] == "inscripcion" && $date1->format('Y') == $fechaPago->format('Y') && $date1->format('m') == $fechaPago->format('m')) {
                $response[] = ["concepto" => "inscripcion", "monto" => $r['monto']];
            }
        }
  
        return $response;
    }
   
    public function consultar9() {
        list($ins, $men) = $this->obtenerMontos();
        $query = "SELECT * FROM pagos WHERE estado_pagos = 1 AND estado = 'CONFIRMADO' AND estatus = 1";
        $resultados = $this->consultar($query);
  
        $date1 = new DateTime();
        $response = [];
        foreach ($resultados as $r) {
            $fechaPago = new DateTime($r['fecha']);
            if ($r['concepto'] == "mensualidad" && $date1->format('Y') == $fechaPago->format('Y')) {
                $response[] = ["concepto" => "mensualidad", "monto" => $r['monto']];
            }
            if ($r['concepto'] == "inscripcion" && $date1->format('Y') == $fechaPago->format('Y')) {
                $response[] = ["concepto" => "inscripcion", "monto" => $r['monto']];
            }
        }
  
        return $response;
    }
  }