<?php

use Ifsnop\Mysqldump as IMysqldump;

require_once('modelo/conexion.php');
class mantenimiento extends datos
{


    private $nivel;

    public function set_nivel($valor)
    {
        $this->nivel = $valor;
    }



    //<!---------------------------------funcion respaldlo------------------------------------------------------------------>
    public function respaldo()
    {


        try {
            $dump = new IMysqldump\Mysqldump('mysql:host=localhost;dbname=colegiocarlossoublette', 'root', '');
            $d = date('Y-m-d');

            $dump->start('respaldo/' . $d . 'respaldo.sql');

            $zip = new ZipArchive();
            $zip->open('respaldo/' . $d . 'respaldo.zip', ZipArchive::CREATE);
            $zip->addFile('respaldo/' . $d . 'respaldo.sql');
            $zip->close();

            // redirigir al usuario a una página de descarga del archivo .sql
            header('Location:respaldo/' . $d . 'respaldo.zip');
        } catch (\Exception $e) {
            echo 'mysqldump-php error: ' . $e->getMessage();
        }
        $mensaje = "respaldo creado correctammente";
        echo "<script type='text/javascript'>alert('$mensaje');</script>";
        return $mensaje;
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
            echo "<script type='text/javascript'>alert(' Error al importar la base de datos.');</script>";
            return "Error al importar la base de datos";
        } else {

            echo "<script type='text/javascript'>alert(' base de datos importada correctamente.');</script>";
            return  " base de datos importada correctamente.";
        }
        // Cerramos la conexión a la base de datos
        $co = null;
    }
}
