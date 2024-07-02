<?php

class confirmar extends datos{
    public function confirmar_code($Usuario,$Codigo) {
        $co = $this->conecta();
        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {
        $resultado = $co->prepare("SELECT * FROM usuarios WHERE nombre = :nombre AND usuarios.estado = 1");
        $resultado->bindParam(':nombre', $Usuario);
        $resultado->execute();
        
        $row = $resultado->fetch(PDO::FETCH_ASSOC);
        $expirar = ($row['expirar']);
        $current_date = date('Y-m-d H:i:s');

            // Logica de verificación del código
            if ($row['request_password'] == 1 && $expirar > $current_date) {
                return json_encode([
                    'success' => ($row['codigo'] == $Codigo),
                    'msg' => ($row['codigo'] == $Codigo) ? 'Usuario Puede cambiar la clave' : 'Clave incorrecta'
                ]);
            } else {
                return json_encode([
                    'success' => false,
                    'msg' => ($row['request_password'] != 1) ? 'No hay solicitud de cambio de Clave' : 'Token expirado'
                ]);
            }

        } catch (Exception $e) {
            return $exception = json_encode([
            'success' => false,
            'msg' => $e->getMessage()
            ]);
        }
    }
}