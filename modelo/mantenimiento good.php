<?php
use Ifsnop\Mysqldump as IMysqldump;
require_once('modelo/conexion.php');
class mantenimiento extends datos
{

    
private $db;
    
    


    //<!---------------------------------funcion respaldlo------------------------------------------------------------------>
    public function respaldo() {
       

        try {
            $dump = new IMysqldump\Mysqldump('mysql:host=localhost;dbname=colegiocarlossoublette' , 'root', '');
           $d=('Y-m-d');
           $r=rand(10000,99999);
            $dump->start('respaldo/'.$d.$r.'respaldo.sql');
       
        } catch (\Exception $e) {
            echo 'mysqldump-php error: ' . $e->getMessage();
        }
        $message = "respaldo creado correctammente";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }


    public function importarBaseDatos($filePath)
{
    // Conexión a la base de datos
    $co = $this->conecta();

    // Verificamos si la conexión fue exitosa
    if (!$co) {
        die('Error al conectarse a la base de datos: ' . $co->errorInfo());
    }

    // Importamos la base de datos desde el archivo respaldo.sql
    $sql = file_get_contents($filePath);
    $stmt = $co->prepare($sql);
    $stmt->execute();

    // Verificamos si la importación fue exitosa
    if ($stmt->rowCount() > 0) {
        echo 'Base de datos importada correctamente.';
    } else {
        echo 'Error al importar la base de datos.';
    }

    // Cerramos la conexión a la base de datos
    $co = null;
}
    
}

