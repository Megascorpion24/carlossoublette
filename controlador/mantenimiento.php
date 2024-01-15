<?php
require 'vendor/autoload.php';


if (!is_file("modelo/" . $pagina . ".php")) {

	echo "Falta definir la clase " . $pagina;
	exit;
}
require_once("modelo/" . $pagina . ".php");

if (is_file("vista/" . $pagina . ".php")) {

	$o = new mantenimiento();



	if (isset($_POST['respaldo'])) {
		//$fileName = $_FILES['import_file']['name'];
		//$file_ext = pathinfo($fileName, PATHINFO_EXTENSION);
		//if(in_array($file_ext, $allowed_ext)){
		//	$inputFileNamePath = $_FILES['import_file'];

		$o->respaldo();
		//}
	}

	if (isset($_POST['restaurar'])) {
		$fileName = $_FILES['import_file']['name'];
		$file_ext = pathinfo($fileName, PATHINFO_EXTENSION);

		$allowed_ext = ['sql'];

		if(in_array($file_ext, $allowed_ext)){
		$inputFileNamePath = $_FILES['import_file']['tmp_name'];
		$o->importarBaseDatos($inputFileNamePath);
		}
	}

	require_once("vista/" . $pagina . ".php");
} else {
	echo "PAGINA EN CONSTRUCCION";
}
