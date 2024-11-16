<?php

require 'vendor/autoload.php'; // Asegúrate de cargar el autoload de Composer

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

function getLogger()
{
    // Crear una instancia de Logger
    $logger = new Logger('SISTEMA CARLOS SOUBLETTE');

    // Añadir un handler que guardará los logs en un archivo
    $logFile = __DIR__ . '/logs/system.log';
    $logger->pushHandler(new StreamHandler($logFile, Logger::DEBUG));

    return $logger;
}
