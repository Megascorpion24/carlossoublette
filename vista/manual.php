<?php


require 'vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$key = '1a3LM3W966D6QTJ5BJb9opunkUcw_d09NCOIJb9QZTsrneqOICoMoeYUDcd_NfaQyR787PAH98Vhue5g938jdkiyIZyJICytKlbjNBtebaHljIR6-zf3A2h3uy6pCtUFl1UhXWnV6madujY4_3SyUViRwBUOP-UudUL4wnJnKYUGDKsiZePPzBGrF4_gxJMRwF9lIWyUCHSh-PRGfvT7s1mu4-5ByYlFvGDQraP4ZiG5bC1TAKO_CnPyd1hrpdzBzNW4SfjqGKmz7IvLAHmRD-2AMQHpTU-hN2vwoA-iQxwQhfnqjM0nnwtZ0urE6HjKl6GWQW-KLnhtfw5n_84IRQ';

if(isset($_COOKIE['token'])){
	$decoded = JWT::decode($_COOKIE['token'], new Key($key, 'HS256'));
} else {
	header('location:index.php');
}
		  if(empty($_SESSION)){
		  session_start();
		  }

	  	  if(isset($_SESSION['permisos'])){
			 $nivel1 = $_SESSION['permisos'];
		
		  }
		  else{
			  $nivel1 = "";
		  }
	    ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<?php  require_once('comunes/header.php');?>
	


<!-- MENU -->
<div class="wrapper">
     
	 <div class="body-overlay"></div>
	
	<!-------TITULO------------>
	
	<div id="sidebar">
	   <div class="sidebar-header">
		  <h3><img src="assets/img/logo.jpeg" class="img-fluid"/><span>Sistema GPUECCS</span></h3>
	   </div>
	   <ul class="list-unstyled component m-0">
	   <!-------1 PAGINA------------>
		 <li class="active">
		 <a href="#" class="" onclick="funcionr('#inicio')">Inicio </a>
		 </li>
		 <!-------2 PAGINA------------>
		 <li class="">
		 <a href="#" onclick="funcionr('#login')"><img class="pr-3 " src="assets/icon/comment-user.png" />login </a>
		 </li>	
		 <li class="">
		 <a href="#" onclick="funcionr('#usuarios')"><img class="pr-3 " src="assets/icon/comment-user.png" />Usuarios </a>
		 </li>	
	   <!-------3 PAGINA------------>
	   <li class="">
		 <a href="#" onclick="funcionr('#docentes')"><img class="pr-3" src="assets/icon/usuario.png"/>Docentes</a>
		 </li>	
		 <!-------4 PAGINA------------>	
		 <li class="">
		 <a href="#" onclick="funcionr('#representantes')"><img class="pr-3" src="assets/icon/users.png"/>Representantes </a>
		 </li>	
	   <!-------5 PAGINA------------>	
		 <li class="">
		 <a href="#" onclick="funcionr('#inscripciones')"><img class="pr-3" src="assets/icon/comprobacion-de-comentarios.png"/>Inscripciones </a>
		 </li>	
			 <!-------6 PAGINA------------>
		 <li class="">
		 <a href="#" onclick="funcionr('#pagos')"><img class="pr-3" src="assets/icon/coins.png"/>Pagos </a>
		 </li>	
	   <!-------6 PAGINA------------>
		 <li class="">
		 <a href="#" onclick="funcionr('#materias')"><img class="pr-3" src="assets/icon/books.png"/>Materias </a>
		 </li>

		 <!-------7 PAGINA------------>
		 <li class="">
		 <a href="#" onclick="funcionr('#secciones')"><img class="pr-3" src="assets/icon/usuario-de-pizarra.png"/>Secciones</a>
		 </li>
		 <!-------8 PAGINA------------>

		 <li class="dropdown">
		 <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" 
		 class="dropdown-toggle">
		 <img class="pr-3" src="assets/icon/calculadora.png"/>Lapso Academico
		 </a>
		 <ul class="collapse list-unstyled menu" id="homeSubmenu2">
			<li><a href="#" onclick="funcionr('#año_academico')"><img class="pr-3" src="assets/icon/calendario2.png"/>Año Academico</a>
			<li><a href="#" onclick="funcionr('#eventos')"><img class="pr-3" src="assets/icon/calendario.png"/>Eventos</a></li>
		 </ul>
		 </li>


	   <!-------9 PAGINA------------>	

	   <li class="">
	   <a href="#" onclick="funcionr('#horarios')"><img class="pr-3" src="assets/icon/editar.png"/>Horarios</a>
	   </li>

		 <!-------11 PAGINA------------>	
		<li class="">
		 <a href="#" onclick="funcionr('#seguridad')"><img class="pr-3" src="assets/icon/layout-fluid.png"/>seguridad </a>
		 </li>	

		  <!-------12 PAGINA------------>	

		  <li class="dropdown">
		 <a href="#homeSubmenu3" data-toggle="collapse" aria-expanded="false" 
		 class="dropdown-toggle">
		 <img class="pr-3" src="assets/icon/grafico.png"/>Reportes
		 </a>
		 <ul class="collapse list-unstyled menu" id="homeSubmenu3">
			<li><a href="#" onclick="funcionr('#reportes_ingreso')"><img class="pr-3" src="assets/icon/grafico-simple.png"/>reporte de ingresos </a></li>
			<li><a href="#" onclick="funcionr('#reportes_egreso')"><img class="pr-3" src="assets/icon/grafico-simple-horizontal.png"/>reporte de egresos </a></li>
			<li><a href="#" onclick="funcionr('#reportes_pagos')"><img class="pr-3" src="assets/icon/grafico-simple-horizontal.png"/>reporte de pagos </a></li>
		 </ul>
		 </li>


<!-------13 PAGINA------------>	
	   <li class="">
		 <a href="#"onclick="funcionr('#bitacora')"><img class="pr-3" src="assets/icon/ajustes.png"/>bitacora</a>
		 </li>			  
		   
	   

			 
	   </ul>

	
	<!-------14 PAGINA------------>	
	<li class="">
		 <a href="?pagina=manual"  target="_blank" class=""><img class="pr-3" src="assets/icon/ajustes.png"/>manual de usuario</a>
		 </li>			  
		   
	   

			 
	   </ul>
	</div>

  <!-------fIN DEL MENU----------->
  
  
  
	 <!-------page-content start----------->
  
	 <div id="content">
		
		 <!------BOTON RESPONSIVE-----------> 
			
		 <div class="top-navbar">
			<div class="xd-topbar">
				<div class="row">
					<div class="col-2 col-md-1 col-lg-1 order-2 order-md-1 align-self-center">
					   <div class="xp-menubar">
					   <img class="p-1" style="Width:30px; height:30px;" src="assets/icon/apps.png" />
					   </div>
					</div>
				

		   
					
				</div>
				

				
				
			</div>
		 </div>
		 <!------top-navbar-end-----------> 

</head>
<body>


<div id="dina">

</div>

<div id="contenido">



<!---------------------------------------LOGIN-------------------------------------------->
<div id="login">
<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="img/1.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Inicio de sesión: </h5>
    <p class="card-text">En esta sección del sistema el usuario ingresa sus credenciales para acceder al sistema</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Rojo: Se ingresa el nombre de usuario asociado al sistema para ingresar </li>
    <li class="list-group-item">naranja: Se ingresa la contraseña asociada al sistema para ingresar </li>

  </ul>
  
</div>
</div>



</div>
<!--------------------------------------------------------------------------------------------->




<!--------------------------------------INICIO------------------------------------------------->
<div id="inicio">
<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="img/2.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Inicio de sesión: </h5>
    <p class="card-text">En esta sección del sistema el usuario podra leer una reseña de la comunidad</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Rojo: reseña de la comunidad </li>
    <li class="list-group-item">negro: menu de navegacion del sistema</li>

  </ul>
  
</div>
</div>



</div>
<!--------------------------------------------------------------------------------------------->




<!--------------------------------------USUARIOS----------------------------------------------->
<div id="usuarios">
<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="img/3.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">gestionar usuarios: </h5>
    <p class="card-text">En esta sección del sistema el usuario podra modificar, eliminar, crear y consultar usuarios registrados en el sistema</p>
  </div>
  <ul class="list-group list-group-flush">

    <li class="list-group-item">negro: boton para registrar usuarios, al precionarlo se despliega un modal con un formulario </li>

    <li class="list-group-item">naranja: es la consulta de todos los usuarios registrados en el sistema</li>

	<li class="list-group-item">verde: boton de modificar el cual despliega un modal con los datos del usuario seleccionado</li>

	<li class="list-group-item">azul: boton para eliminar el usuario seleccionado</li>

  </ul>
  
</div>
</div>


<!--------------------------------------------------------------------------------------------->

<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="img/4 f.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">formulario: agregar usuario </h5>
    <p class="card-text">En esta sección del sistema el usuario puede registrar un usuario</p>
  </div>
  <ul class="list-group list-group-flush">


  	<li class="list-group-item">negro: formulario de registro de estudiantes </li>

    <li class="list-group-item">rojo: boton de cancelar accion, al presionarlo se anulara el registro y se cerrara el modal. </li>

    <li class="list-group-item">azul: boton de registrar, al presionarlo el registro se efectuara de manera exitosa y se cerrara el modal.  </li>



  </ul>
  
</div>
</div>


</div>
<!--------------------------------------------------------------------------------------------->




<!--------------------------------------DOCENTES----------------------------------------------->
<div id="docentes">
<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="img/5.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">gestionar docentes: </h5>
    <p class="card-text">En esta sección del sistema el usuario podra modificar, eliminar, crear y consultar docentes registrados en el sistema</p>
  </div>
  <ul class="list-group list-group-flush">

    <li class="list-group-item">azul: boton para registrar docentes, al precionarlo se despliega un modal con un formulario </li>

    <li class="list-group-item">negro: es la consulta de todos los docentes registrados en el sistema</li>

	<li class="list-group-item">rojo: boton de modificar el cual despliega un modal con los datos del docente seleccionado</li>

	<li class="list-group-item">verde: boton para eliminar el docente seleccionado</li>

  </ul>
  
</div>
</div>



</div>
<!--------------------------------------------------------------------------------------------->




<!-----------------------------------REPRESENTANTES-------------------------------------------->
<div id="representantes">
<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="img/6.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">gestionar representantes: </h5>
    <p class="card-text">En esta sección del sistema el usuario podra modificar, eliminar, crear y consultar representantes registrados en el sistema</p>
  </div>
  <ul class="list-group list-group-flush">

    <li class="list-group-item">naranja: boton para registrar representantes, al presionarlo se despliega un modal con un formulario </li>

    <li class="list-group-item">negro: es la consulta de todos los representantes registrados en el sistema</li>

	<li class="list-group-item">rojo: boton de modificar el cual despliega un modal con los datos del representante seleccionado</li>

	<li class="list-group-item">azul: boton para eliminar el representante seleccionado</li>

  </ul>
  
</div>
</div>



</div>
<!--------------------------------------------------------------------------------------------->




<!---------------------------------INSCRIPCIONES----------------------------------------------->
<div id="inscripciones">
<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="img/7.0.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">gestionar inscripciones: </h5>
    <p class="card-text">En esta sección del sistema el usuario podra modificar, eliminar, crear y consultar inscripciones registradas en el sistema</p>
  </div>
  <ul class="list-group list-group-flush">

    <li class="list-group-item">naranja: boton para registrar estudiantes en lote, al presionarlo se despliega un modal con una opcion para elegir un archivo en formato excel el cual contenga datos de estudiantes</li>

    <li class="list-group-item">amarillo: boton para registrar estudiantes, al presionarlo se despliega un modal con un formulario</li>

	<li class="list-group-item">negro: es la consulta de todos las inscripciones registradas en el sistema</li>

	<li class="list-group-item">rojo: boton de modificar el cual despliega un modal con los datos de la inscripcion seleccionada</li>

	<li class="list-group-item">azul: boton para eliminar la inscripcion seleccionada</li>

  </ul>
  
</div>
</div>

<!--------------------------------------------------------------------------------------------->
<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="img/7.1.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">importar estudiantes </h5>
    <p class="card-text">En esta sección del sistema el usuario puede elegir importar datos de estudiantes</p>
  </div>
  <ul class="list-group list-group-flush">


  	<li class="list-group-item">negro: boton para seleccionar archivo, al presionarlo nos permitira buscar algun archivo excel con gran data de estudiantes para subirlo al sistema  </li>

    <li class="list-group-item">rojo: boton de cancelar accion, al presionarlo se anulara la importancion y se cerrara el modal. </li>

    <li class="list-group-item">azul: boton de importar, al presionarlo la importacion se efectuara de manera exitosa y se cerrara el modal.  </li>



  </ul>
  
</div>
</div>


<!--------------------------------------------------------------------------------------------->
<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="img/7.2.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">inscribir estudiantes: pagos </h5>
    <p class="card-text">En esta sección del sistema el usuario puede registrar un estudiante</p>
  </div>
  <ul class="list-group list-group-flush">


  	<li class="list-group-item">rojo: diferentes secciones en las que esta dividido el formulario.  </li>

    <li class="list-group-item">negro: boton de seleccionar donde se puede elegir el representante de dicho estudiante. </li>

    <li class="list-group-item">naranja: formulario que se debe de llenar con los datos del representante escogido.  </li>

    <li class="list-group-item">azul: boton de cancelar, si se presiona se cancela la inscripcion y se cierra el modal.  </li>

    <li class="list-group-item">verde: boton siguiente, al presionarse se pasa a la siguiente seccion del formulario.  </li>





  </ul>
  
</div>
</div>


<!--------------------------------------------------------------------------------------------->
<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="img/7.3.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">inscribir estudiantes: datos </h5>
    <p class="card-text">En esta sección del sistema el usuario puede registrar un estudiante</p>
  </div>
  <ul class="list-group list-group-flush">


  	<li class="list-group-item">negro: opciones para escoger si el estudiante que inscribira sera uno regular o si por el contrario sera un estudiante nuevo ingreso.   </li>

    <li class="list-group-item">rojo: boton de seleccionar, muestra los estudiantes regulares. este boton solo se podra usar si se inscribira a un estudiante regular. </li>

    <li class="list-group-item">naranja: formulario que se debe de llenar con los datos del estudiante escogido. si se escogio a un estudianmte regular entonces se rellenara solo.  </li>





  </ul>
  
</div>
</div>


<!--------------------------------------------------------------------------------------------->
<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="img/7.4.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">inscribir estudiantes: secciones </h5>
    <p class="card-text">En esta sección del sistema el usuario puede registrar un estudiante</p>
  </div>
  <ul class="list-group list-group-flush">


  	<li class="list-group-item">negro: boton selecccionar, al presinarlo mostrara una lista de secciones las cuales se les pueden asignar al estudiante que se inscribira.   </li>

    <li class="list-group-item">azul: boton de inscribir, al presinarlo la inscripcion se habra raalizado de forma exitosa y se cerrara el formulario. </li>



  </ul>
  
</div>
</div>




</div>
<!--------------------------------------------------------------------------------------------->




<!-----------------------------------------PAGOS----------------------------------------------->
<div id="pagos">
<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="img/8.0.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">gestionar pagos: </h5>
    <p class="card-text">En esta sección del sistema el usuario podra modificar, eliminar, crear, confirmar y consultar pagos registrados en el sistema asi como tambien consultar y editar los montos de las inscripciones y mensualidades</p>
  </div>
  <ul class="list-group list-group-flush">

    <li class="list-group-item">negro: es la consulta de los montons de mensualidad e inscripcion </li>

    <li class="list-group-item">naranja: boton de modificar el cual despliega un modal con los datos del monto seleccionado</li>

	<li class="list-group-item">rojo: boton de confirmar, al presionarlo despliega un modal donde se puede confirmar los pagos realizados</li>

	<li class="list-group-item">azul: boton para registrar pagos, al presionarlo se despliega un modal con un formulario</li>

	<li class="list-group-item">amarillo: es la consulta de todos los pagos registrados en el sistema</li>

	<li class="list-group-item">violeta: boton de modificar el cual despliega un modal con los datos de pago seleccionada</li>

	<li class="list-group-item">marron: boton de consultar el cual despliega un modal donde solo se pueden visualizar todos los datos del pago seleccionado</li>

	<li class="list-group-item">gris: boton para eliminar el pago seleccionado</li>



  </ul>
  
</div>
</div>

<!--------------------------------------------------------------------------------------------->
<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="img/8.1.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">confirmar pagos </h5>
    <p class="card-text">En esta sección del sistema el usuario puede confirmar los pagos que se hayan realizado previamente</p>
  </div>
  <ul class="list-group list-group-flush">


  	<li class="list-group-item">negro: boton de seleccionar, al presionarlo mostrara una lista de pagos que faltan por confirmar.  </li>

    <li class="list-group-item">verde: formulario que se rellana automaticamente con los datos del pago anteriormente seleccionado. </li>



  </ul>
  
</div>
</div>

<!--------------------------------------------------------------------------------------------->
<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="img/8.2.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">registro de pagos </h5>
    <p class="card-text">En esta sección del sistema el usuario podra pagar sus deudas pendientes.</p>
  </div>
  <ul class="list-group list-group-flush">


  	<li class="list-group-item">negro: boton de seleccionar, al presionarlo mostrara una lista de deudas pendientes por pagar.  </li>

    <li class="list-group-item">gris: deuda unica pendiente, es la deuda que se va a pagar en el momento. </li>

    <li class="list-group-item">rojo: meses, cantidad de meses que aun se estan debiendo</li>

    <li class="list-group-item">naranja: monto total, la cantidad total de dinero que aun se esta debiendo. </li>

    <li class="list-group-item">verde: precio base, aqui muestra el precio actual de la mensualidad o inscripcion, segun sea el caso. </li>

    <li class="list-group-item">marron: numero de deuda, el numero de registro de la deuda. </li>

    <li class="list-group-item">violeta: concepto, aqui se coloca el motivo por el cual se esta haciendo el pago. </li>

    <li class="list-group-item">amarillo: deuda generada, aqui se muestra la fecha en la que se genero la deuda que se va a pagar. </li>

    <li class="list-group-item">azul: monto, cantidad que se va a pagar. </li>

    <li class="list-group-item">morado: identificador, codigo que se le coloca al pago para identificarlo. </li>



  </ul>
  
</div>
</div>





</div>
<!--------------------------------------------------------------------------------------------->




<!--------------------------------------MATERIAS----------------------------------------------->
<div id="materias">
<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="img/9.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">gestionar materias: </h5>
    <p class="card-text">En esta sección del sistema el usuario podra modificar, eliminar, crear y consultar materias registradas en el sistema</p>
  </div>
  <ul class="list-group list-group-flush">

    <li class="list-group-item">azul: boton para registrar materias, al presionarlo se despliega un modal con un formulario </li>

    <li class="list-group-item">negro: es la consulta de todos las materias registradas en el sistema</li>

	<li class="list-group-item">naranja: boton de modificar el cual despliega un modal con los datos de la materia seleccionada</li>

	<li class="list-group-item">rojo: boton para eliminar la materia seleccionada</li>

  </ul>
  
</div>
</div>



</div>
<!--------------------------------------------------------------------------------------------->




<!-------------------------------------SECCIONES----------------------------------------------->
<div id="secciones">
<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="img/10.0.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">gestionar secciones: </h5>
    <p class="card-text">En esta sección del sistema el usuario podra modificar, eliminar, crear y consultar secciones registradas en el sistema</p>
  </div>
  <ul class="list-group list-group-flush">

    <li class="list-group-item">rojo: boton para registrar secciones, al presionarlo se despliega un modal con un formulario </li>

    <li class="list-group-item">morado: boton de abecedario donde se pueden habilitar o inhabilitar los grados</li>

	<li class="list-group-item">negro: es la consulta de todas las secciones registradas en el sistema</li>

	<li class="list-group-item">azul: boton de modificar el cual despliega un modal con los datos de la seccion seleccionada</li>

	<li class="list-group-item">violeta: boton para eliminar la seccion seleccionada</li>

  </ul>
  
</div>
</div>


<!--------------------------------------------------------------------------------------------->
<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="img/10.1.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Registrar Seccion </h5>
    <p class="card-text">En esta sección del sistema el usuario puede realizar la conformacion de las secciones</p>
  </div>
  <ul class="list-group list-group-flush">


  	<li class="list-group-item">negro: formulario que debe de llenarse para conformar la seccion.  </li>

    <li class="list-group-item">naranja: boton de registrar el cual al presionarse registra exitosamente la seccion y cierra el formulario. </li>



  </ul>
  
</div>
</div>

<!--------------------------------------------------------------------------------------------->
<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="img/10.2.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Gestionar Abecedario de Secciones </h5>
    <p class="card-text">En esta sección del sistema el usuario habilitar o inhabilitar los grados que se usaran en el registro de secciones</p>
  </div>
  <ul class="list-group list-group-flush">


  	<li class="list-group-item">negro: letras que pertenecen a cada uno de los grados, las cuales se peuden habilitar o deshabilitar para que aparezcan o no a la hora de realizar el registro.  </li>

    <li class="list-group-item">rojo: boton de actualizar que al presionarse guarda los cambios hechos y cierra el modal. </li>



  </ul>
  
</div>
</div>




</div>
<!--------------------------------------------------------------------------------------------->




<!------------------------------------AÑO ACADEMICO-------------------------------------------->
<div id="año_academico">
<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="img/11.0.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">gestionar año academico: </h5>
    <p class="card-text">En esta sección del sistema el usuario podra crear y consultar años academicos registrados en el sistema</p>
  </div>
  <ul class="list-group list-group-flush">

    <li class="list-group-item">negro: boton de calendario academico el cual permite visualizar el calendario </li>

    <li class="list-group-item">rojo: boton de tabla de registros, al presionarlo envia a una vista donde se pueden ver los registros de años academicos de forma normal </li>

	<li class="list-group-item">morado: boton para registrar año academico, al presionarlo se despliega un modal con un formulario</li>

	<li class="list-group-item">naranja: es la consulta del calendario academico, donde se muestra el lapso de tiempo que abarcara un año academico previamente registrado</li>


  </ul>
  
</div>
</div>


<!--------------------------------------------------------------------------------------------->
<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="img/11.1.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">gestionar año academico: tabla de registros </h5>
    <p class="card-text">En esta sección del sistema el usuario podra modificar, eliminar, crear y consultar años academicos registrados en el sistema</p>
  </div>
  <ul class="list-group list-group-flush">

    <li class="list-group-item">rojo: es la consulta de todos los años academicos registrados en el sistema </li>

    <li class="list-group-item">amarillo: boton de modificar el cual despliega un modal con los datos del año academico seleccionado </li>

	<li class="list-group-item">verde: boton para eliminar el año academico seleccionado</li>

  </ul>
  
</div>
</div>



</div>
<!--------------------------------------------------------------------------------------------->




<!------------------------------------------EVENTOS-------------------------------------------->
<div id="eventos">
<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="img/12.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">gestionar eventos: </h5>
    <p class="card-text">En esta sección del sistema el usuario podra crear y consultar años academicos registrados en el sistema</p>
  </div>
  <ul class="list-group list-group-flush">

    <li class="list-group-item">negro: boton de calendario eventos el cual permite visualizar el calendario  </li>

    <li class="list-group-item">naranja: boton de tabla de registros, al presionarlo envia a una vista donde se pueden ver los registros de eventos de forma normal </li>

	<li class="list-group-item">morado: boton para registrar eventos, al presionarlo se despliega un modal con un formulario</li>

	<li class="list-group-item">rojo: es la consulta del calendario de eventos, donde se muestra el lapso de tiempo que abarcara cada evento previamente registrado</li>


  </ul>
  
</div>
</div>



</div>
<!--------------------------------------------------------------------------------------------->




<!-----------------------------------------HORARIOS-------------------------------------------->
<div id="horarios">
<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="img/13.0.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">gestionar horarios: </h5>
    <p class="card-text">En esta sección del sistema el usuario podra crear y consultar clases registrados en el sistema</p>
  </div>
  <ul class="list-group list-group-flush">

    <li class="list-group-item">negro: boton de horarios el cual permite visualizar el calendario  </li>

    <li class="list-group-item">rojo: boton de tabla de registros, al presionarlo envia a una vista donde se pueden ver los registros de clases de forma normal </li>

	<li class="list-group-item">morado: boton para registrar clases, al presionarlo se despliega un modal con un formulario</li>

	<li class="list-group-item">amarillo: es la consulta del calendario de horarios, donde se muestran las clases registradas previamente, de forma que se vea que dia se vera esa clase y que horas abarcara</li>


  </ul>
  
</div>
</div>


<!--------------------------------------------------------------------------------------------->
<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="img/13.1.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">gestionar horarios: tabla de registros </h5>
    <p class="card-text">En esta sección del sistema el usuario podra modificar, eliminar, crear y consultar clases registrados en el sistema</p>
  </div>
  <ul class="list-group list-group-flush">

    <li class="list-group-item">verde: es la consulta de todas las clases registradas en el sistema </li>

    <li class="list-group-item">negro: boton de modificar el cual despliega un modal con los datos de la clase seleccionada </li>

	<li class="list-group-item">naranja: boton para eliminar la clase seleccionado</li>

  </ul>
  
</div>
</div>







</div>
<!--------------------------------------------------------------------------------------------->




<!---------------------------------------SEGURIDAD-------------------------------------------->
<div id="seguridad">
<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="img/14.0.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">gestionar seguridad </h5>
    <p class="card-text">En esta sección del sistema el usuario podra modificar, crear y consultar roles registrados en el sistema</p>
  </div>
  <ul class="list-group list-group-flush">


  	<li class="list-group-item">morado: boton para registrar roles, al presionarlo se despliega un modal con un formulario </li>

    <li class="list-group-item">negro: es la consulta de todas los roles registrados en el sistema </li>

    <li class="list-group-item">rojo: boton de modificar el cual despliega un modal con los datos del rol seleccionada </li>

	<li class="list-group-item">verde: boton modificar permisos para editar los permisos del rol seleccionado</li>

  </ul>
  
</div>
</div>

<!--------------------------------------------------------------------------------------------->
<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="img/14.1.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Gestionar Permisos de Super Usuario </h5>
    <p class="card-text">En esta sección del sistema el usuario podra editar los tipos de permiso que tiene cad rol</p>
  </div>
  <ul class="list-group list-group-flush">


  	<li class="list-group-item">negro: botones para marcar o desmarcar todas las opciones.  </li>

    <li class="list-group-item">naranja: Lista con todos los permisos que se le peuden asignar o quitar a cada rol. </li>

    <li class="list-group-item">rojo: boton de registrar que al presionarse actualiza los cambios hechos al rol y cierra el modal. </li>



  </ul>
  
</div>
</div>



</div>
<!--------------------------------------------------------------------------------------------->




<!------------------------------------REPORTES INGRESO---------------------------------------->
<div id="reportes_ingreso">
<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="img/15.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">gestionar reportes de ingreso </h5>
    <p class="card-text">En esta sección del sistema el usuario puede consultar los datos del reporte asi como tambien generar reportes en pdf</p>
  </div>
  <ul class="list-group list-group-flush">


  	<li class="list-group-item">negro: boton de registro, al presionarlo abre otra ventana donde se genera un reporte en PDF </li>

    <li class="list-group-item">morado: consulta que muestra un grafico donde se pueden ver los datos de cuantos estudiantes ingresan en un año </li>



  </ul>
  
</div>
</div>



</div>
<!--------------------------------------------------------------------------------------------->




<!------------------------------------REPORTES EGRESO---------------------------------------->
<div id="reportes_egreso">
<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="img/16.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">gestionar reportes de egresso </h5>
    <p class="card-text">En esta sección del sistema el usuario puede consultar los datos del reporte asi como tambien generar reportes en pdf</p>
  </div>
  <ul class="list-group list-group-flush">


  	<li class="list-group-item">morado: boton de registro, al presionarlo abre otra ventana donde se genera un reporte en PDF </li>

    <li class="list-group-item">negro: consulta que muestra un grafico donde se pueden ver los datos de cuantos estudiantes egresados en un año </li>



  </ul>
  
</div>
</div>



</div>
<!-------------------------------------------------------------------------------------------->




<!------------------------------------REPORTES PAGOS------------------------------------------>
<div id="reportes_pagos">
<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="img/17.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Gestionar Reportes de pagos</h5>
    <p class="card-text">En esta sección del sistema el usuario puede consultar los datos del reporte asi como tambien generar reportes en pdf</p>
  </div>
  <ul class="list-group list-group-flush">


  	<li class="list-group-item">negro: boton que permite elegir si el reporte sera mensual a anual </li>

    <li class="list-group-item">rojo: consulta que muestra un grafico donde se pueden ver los datos de las deudas </li>

    <li class="list-group-item">naranja: espacio donde se muestra la cantidad de deudas </li>

    <li class="list-group-item">verde: espacio donde se muestra el total de deudas </li>

    <li class="list-group-item">azul: consulta que muestra un grafico donde se pueden ver los datos de los pagos </li>

     <li class="list-group-item">violeta: espacio donde se muestra la cantidad de pagos </li>

    <li class="list-group-item">morado: espacio donde se muestra el total de pagos </li>



  </ul>
  
</div>
</div>



</div>
<!--------------------------------------------------------------------------------------------->




<!-----------------------------------------BITACORA-------------------------------------------->
<div id="bitacora">
<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="img/18.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">gestionar bitacora </h5>
    <p class="card-text">En esta sección del sistema el usuario podra consultar los registros de cada accion que se realiza en el sistema</p>
  </div>
  <ul class="list-group list-group-flush">


  	<li class="list-group-item">negro: es la consulta de todos los registros de accion en el sistema </li>


  </ul>
  
</div>
</div>



</div>
<!--------------------------------------------------------------------------------------------->



<div id="formulario_usuario">
<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="img/4 f.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">formulario: agregar usuario </h5>
    <p class="card-text">En esta sección del sistema el usuario puede registrar un usuario</p>
  </div>
  <ul class="list-group list-group-flush">


  	<li class="list-group-item">negro: formulario de registro de estudiantes </li>

    <li class="list-group-item">rojo: boton de cancelar accion, al presionarlo se anulara el registro y se cerrara el modal. </li>

    <li class="list-group-item">azul: boton de registrar, al presionarlo el registro se efectuara de manera exitosa y se cerrara el modal.  </li>



  </ul>
  
</div>
</div>



</div>




<div id="importar_estudiantes">
<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="img/7.1.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">importar estudiantes </h5>
    <p class="card-text">En esta sección del sistema el usuario puede elegir importar datos de estudiantes</p>
  </div>
  <ul class="list-group list-group-flush">


  	<li class="list-group-item">negro: boton para seleccionar archivo, al presionarlo nos permitira buscar algun archivo excel con gran data de estudiantes para subirlo al sistema  </li>

    <li class="list-group-item">rojo: boton de cancelar accion, al presionarlo se anulara la importancion y se cerrara el modal. </li>

    <li class="list-group-item">azul: boton de importar, al presionarlo la importacion se efectuara de manera exitosa y se cerrara el modal.  </li>



  </ul>
  
</div>
</div>



</div>



<div id="inscribir_estudiante">
<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="img/7.2.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">inscribir estudiantes: pagos </h5>
    <p class="card-text">En esta sección del sistema el usuario puede registrar un estudiante</p>
  </div>
  <ul class="list-group list-group-flush">


  	<li class="list-group-item">rojo: diferentes secciones en las que esta dividido el formulario.  </li>

    <li class="list-group-item">negro: boton de seleccionar donde se puede elegir el representante de dicho estudiante. </li>

    <li class="list-group-item">naranja: formulario que se debe de llenar con los datos del representante escogido.  </li>

    <li class="list-group-item">azul: boton de cancelar, si se presiona se cancela la inscripcion y se cierra el modal.  </li>

    <li class="list-group-item">verde: boton siguiente, al presionarse se pasa a la siguiente seccion del formulario.  </li>





  </ul>
  
</div>
</div>



</div>


<div id="inscribir_estudiante_1">
<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="img/7.3.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">inscribir estudiantes: datos </h5>
    <p class="card-text">En esta sección del sistema el usuario puede registrar un estudiante</p>
  </div>
  <ul class="list-group list-group-flush">


  	<li class="list-group-item">negro: opciones para escoger si el estudiante que inscribira sera uno regular o si por el contrario sera un estudiante nuevo ingreso.   </li>

    <li class="list-group-item">rojo: boton de seleccionar, muestra los estudiantes regulares. este boton solo se podra usar si se inscribira a un estudiante regular. </li>

    <li class="list-group-item">naranja: formulario que se debe de llenar con los datos del estudiante escogido. si se escogio a un estudianmte regular entonces se rellenara solo.  </li>





  </ul>
  
</div>
</div>



</div>


<div id="inscribir_estudiante_2">
<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="img/7.4.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">inscribir estudiantes: secciones </h5>
    <p class="card-text">En esta sección del sistema el usuario puede registrar un estudiante</p>
  </div>
  <ul class="list-group list-group-flush">


  	<li class="list-group-item">negro: boton selecccionar, al presinarlo mostrara una lista de secciones las cuales se les pueden asignar al estudiante que se inscribira.   </li>

    <li class="list-group-item">azul: boton de inscribir, al presinarlo la inscripcion se habra raalizado de forma exitosa y se cerrara el formulario. </li>



  </ul>
  
</div>
</div>



</div>



<div id="confirmar_pago">
<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="img/8.1.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">confirmar pagos </h5>
    <p class="card-text">En esta sección del sistema el usuario puede confirmar los pagos que se hayan realizado previamente</p>
  </div>
  <ul class="list-group list-group-flush">


  	<li class="list-group-item">negro: boton de seleccionar, al presionarlo mostrara una lista de pagos que faltan por confirmar.  </li>

    <li class="list-group-item">verde: formulario que se rellana automaticamente con los datos del pago anteriormente seleccionado. </li>



  </ul>
  
</div>
</div>



</div>


<div id="registrar_pago">
<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="img/8.2.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">registro de pagos </h5>
    <p class="card-text">En esta sección del sistema el usuario podra pagar sus deudas pendientes.</p>
  </div>
  <ul class="list-group list-group-flush">


  	<li class="list-group-item">negro: boton de seleccionar, al presionarlo mostrara una lista de deudas pendientes por pagar.  </li>

    <li class="list-group-item">gris: deuda unica pendiente, es la deuda que se va a pagar en el momento. </li>

    <li class="list-group-item">rojo: meses, cantidad de meses que aun se estan debiendo</li>

    <li class="list-group-item">naranja: monto total, la cantidad total de dinero que aun se esta debiendo. </li>

    <li class="list-group-item">verde: precio base, aqui muestra el precio actual de la mensualidad o inscripcion, segun sea el caso. </li>

    <li class="list-group-item">marron: numero de deuda, el numero de registro de la deuda. </li>

    <li class="list-group-item">violeta: concepto, aqui se coloca el motivo por el cual se esta haciendo el pago. </li>

    <li class="list-group-item">amarillo: deuda generada, aqui se muestra la fecha en la que se genero la deuda que se va a pagar. </li>

    <li class="list-group-item">azul: monto, cantidad que se va a pagar. </li>

    <li class="list-group-item">morado: identificador, codigo que se le coloca al pago para identificarlo. </li>



  </ul>
  
</div>
</div>



</div>



<div id="registro_seccion">
<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="img/10.1.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Registrar Seccion </h5>
    <p class="card-text">En esta sección del sistema el usuario puede realizar la conformacion de las secciones</p>
  </div>
  <ul class="list-group list-group-flush">


  	<li class="list-group-item">negro: formulario que debe de llenarse para conformar la seccion.  </li>

    <li class="list-group-item">naranja: boton de registrar el cual al presionarse registra exitosamente la seccion y cierra el formulario. </li>



  </ul>
  
</div>
</div>



</div>


<div id="abecedario_secciones">
<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="img/10.2.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Gestionar Abecedario de Secciones </h5>
    <p class="card-text">En esta sección del sistema el usuario habilitar o inhabilitar los grados que se usaran en el registro de secciones</p>
  </div>
  <ul class="list-group list-group-flush">


  	<li class="list-group-item">negro: letras que pertenecen a cada uno de los grados, las cuales se peuden habilitar o deshabilitar para que aparezcan o no a la hora de realizar el registro.  </li>

    <li class="list-group-item">rojo: boton de actualizar que al presionarse guarda los cambios hechos y cierra el modal. </li>



  </ul>
  
</div>
</div>



</div>



<div id="permisos">
<div class="col-auto p-5 text-center"style="width: 100%;">
<div class="card" style="width: 100%;">
  <img src="img/14.1.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Gestionar Permisos de Super Usuario </h5>
    <p class="card-text">En esta sección del sistema el usuario podra editar los tipos de permiso que tiene cad rol</p>
  </div>
  <ul class="list-group list-group-flush">


  	<li class="list-group-item">negro: botones para marcar o desmarcar todas las opciones.  </li>

    <li class="list-group-item">naranja: Lista con todos los permisos que se le peuden asignar o quitar a cada rol. </li>

    <li class="list-group-item">rojo: boton de registrar que al presionarse actualiza los cambios hechos al rol y cierra el modal. </li>



  </ul>
  
</div>
</div>



</div>


</div>


	<?php require_once('comunes/footer.php') ?> 
	<script src="assets/js/script.js"></script>
	<script src="assets/js/manual.js"></script>
	<script src="assets/js/usuarios.js"></script>
</body>
</html>