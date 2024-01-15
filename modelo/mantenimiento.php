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
            $d = date('Y-m-d');
           
            $dump->start('respaldo/'.$d.'respaldo.sql');
       
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

    // Obtener lista de tablas en la base de datos
    $tables = $co->query('SELECT TABLE_NAME FROM information_schema.tables WHERE TABLE_SCHEMA = "colegiocarlossoublette"');

    // Recorrer la lista de tablas y ejecutar DROP TABLE para cada una de ellas
    foreach ($tables as $table) {
        $tableName = $table['TABLE_NAME'];

        // Desactivamos la verificación de restricciones en la tabla actual
        $co->query('SET FOREIGN_KEY_CHECKS=0;');

        // Eliminamos la tabla
        $co->query('DROP TABLE ' . $tableName);

        // Reactivamos la verificación de restricciones
        $co->query('SET FOREIGN_KEY_CHECKS=1;');
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

