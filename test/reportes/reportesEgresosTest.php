<?php

use PHPUnit\Framework\TestCase;
require_once("./modelo/reporte_egresos.php");

class reportesegresosTest extends TestCase
{
    private $reporte;

    public function setUp(): void
    {
        $this->reporte = new reporte_egreso();
    }

   
    public function testConsultaExitosa()
    {
        $respuesta = $this->reporte->consultar_ano();
        $this->assertNotEmpty($respuesta);
        
    }

    public function testConsulta1Exitosa()
    {
        $respuesta = $this->reporte->consultar1();
        $this->assertIsInt($respuesta);
    }

    public function testConsulta2Exitosa()
    {
        $respuesta = $this->reporte->consultar2();
        $this->assertIsInt($respuesta);
    }

    public function testConsulta3Exitosa()
    {
        $respuesta = $this->reporte->consultar3();
        $this->assertIsInt($respuesta);
    }

    public function testConsulta4Exitosa()
    {
        $respuesta = $this->reporte->consultar4();
        $this->assertIsInt($respuesta);
    }

    public function testConsulta5Exitosa()
    {
        $respuesta = $this->reporte->consultar5();
        $this->assertIsInt($respuesta);
    }

    

    
}