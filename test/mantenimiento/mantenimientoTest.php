<?php

use PHPUnit\Framework\TestCase;
require_once("./modelo/mantenimiento.php");

class mantenimientoTest extends TestCase
{
    private $mantenimiento;

    public function setUp(): void
    {
        $this->mantenimiento = new mantenimiento();
    }

    public function testRespaldo(): void
    {
       

        // Verificar si el resultado es el esperado
        $this->assertEquals("respaldo creado correctammente",$this->mantenimiento->respaldo($this->mantenimiento));
        
    }


    public function testRestaurar()
    {
        $filePath = 'C:\Users\Santiago casamayor\Desktop\colegiocarlossoublette (31-1).sql';

        $this->assertEquals(
            ' base de datos importada correctamente.',
            $this->mantenimiento->importarBaseDatos($filePath)
        );
    }



    

    
}