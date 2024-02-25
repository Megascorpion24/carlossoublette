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
    <?php require_once('comunes/menu.php'); ?>
</head>

<body >
<form id="f" target="_blank" method="post" >
	<input type="text" name="accion" value="asdasd" class="ocultar">

<div class="head-title pt-3  mx-auto" style="width: 100%;  ">
				<div class="left">
					<h1 id="prueba">Reportes de pagos: <?php if(!empty($consutaa)){echo $consutaa;} ?></h1>
				</div>
			</div>
			<div class="table-title  mb-3">
					     <div class="row ">
						     <div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
							    <h2 class="ml-lg-2">consultar reportes</h2>
							 </div>
							 <div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center" >
<<<<<<< HEAD
							 <div id="tipo"  class="btn btn-success" >Cambiar a gráfico circular</div>
=======
							 <?PHP if (in_array("generar_reporte_egresos", $nivel1)) {?>
							    <button href="#addEmployeeModal" class="btn btn-success" data-toggle="modal" type="submit">
									<i class="material-icons">&#xE147;</i>
									<span>Registrar</span>
							    </button>

								<?php } ?>
>>>>>>> 33cf14292824ec608e833437634995fe4045c6c7

							 </div>
					     </div>
					   </div>

					   </form>	  



					   <div class="container">
 
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#home">mensual</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu1">anual</a>
    </li>
<<<<<<< HEAD
	
    
  </ul>
  <?PHP if (in_array("pagos_reportes", $nivel1)) {?> 
  <div class="tab-content">
    <div id="home" class="tab-pane fade show active">
      <h3>reporte de pagos mensual</h3>
	  
	  
=======
    
  </ul>
  <?PHP if (in_array("consultar_reporte_egresos", $nivel1)) {?> 
  <div class="tab-content">
    <div id="home" class="tab-pane fade show active">
      <h3>reporte de pagos mensual</h3>
>>>>>>> 33cf14292824ec608e833437634995fe4045c6c7
      <div class="form-row">
						<div class="form-group col-md-6">
						<canvas id="myChart" width="100" height="100"></canvas>
                        <div class="form-row ">
                        <div class="form-group col-md-4">
                        <label>catidad de deudas:</label> <samp id="cantidad"></samp></samp>
                        </div>
                        <div class="form-group col-md-4">
                        <label>total de deudas:</label> <samp id="total"></samp></samp>
						</div>
                        </div>
                        </div>
						<div class="form-group col-md-6">
						<canvas id="myChart2" width="100" height="100"></canvas>
						<div class="form-row ">
                        <div class="form-group col-md-4">
                        <label>catidad de pagos:</label> <samp id="cantidad1"></samp></samp>
                        </div>
                        <div class="form-group col-md-4">
                        <label>total de pagos:</label> <samp id="total1"></samp></samp>
						</div>
                        </div>
						</div>
						</div>
    </div>


    <div id="menu1" class="tab-pane fade">
      <h3>reporte de pagos anual</h3>
      
					   
						



	  <div class="form-row">
						<div class="form-group col-md-6">
						<canvas id="myChart3" width="100" height="100"></canvas>
                        <div class="form-row ">
                        <div class="form-group col-md-4">
                        <label>catidad de deudas:</label> <samp id="cantidad3"></samp></samp>
                        </div>
                        <div class="form-group col-md-4">
                        <label>total de deudas:</label> <samp id="total3"></samp></samp>
						</div>
                        </div>
                        </div>
						<div class="form-group col-md-6">
						<canvas id="myChart4" width="100" height="100"></canvas>
						<div class="form-row ">
                        <div class="form-group col-md-4">
                        <label>catidad de pagos:</label> <samp id="cantidad4"></samp></samp>
                        </div>
                        <div class="form-group col-md-4">
                        <label>total de pagos:</label> <samp id="total4"></samp></samp>
						</div>
                        </div>
						</div>
						</div>



    </div>
	
  </div>
</div>






						
                        <table class="table table-striped table-hover ocultar">
					      <thead>
						 
						  </thead>
						  
						  <tbody id="morocidad">
						      
						  <?php
    				if(!empty($consuta6)){
        				echo $consuta6[0];
   					}
	       		 ?>
							 
							 
						  </tbody>
						  
					      
					   </table>


					   <table class="table table-striped table-hover ocultar">
					      <thead>
						 
						  </thead>
						  
						  <tbody id="morocidad1">
						      
						  <?php
    				if(!empty($consuta7)){
        				echo $consuta7[0];
   					}
	       		 ?>
							 
							 
						  </tbody>
						  
					      
					   </table>




					   <table class="table table-striped table-hover ocultar">
					      <thead>
						 
						  </thead>
						  
						  <tbody id="morocidad2">
						      
						  <?php
    				if(!empty($consuta8)){
        				echo $consuta8[0];
   					}
	       		 ?>
							 
							 
						  </tbody>
						  
					      
					   </table>


					   <table class="table table-striped table-hover ocultar">
					      <thead>
						 
						  </thead>
						  
						  <tbody id="morocidad3">
						      
						  <?php
    				if(!empty($consuta9)){
        				echo $consuta9[0];
   					}
	       		 ?>
							 
							 
						  </tbody>
						  
					      
					   </table>
			


			
        
		
		<?php } ?>
    </body>
    
	<script src="assets/js/chart.min.js"></script>
    <script>
  



    </script>
	<?php require_once('comunes/footer.php') ?> 
    <script  src="assets/js/script.js"></script>
	<script src="assets/js/reporte_pago.js"></script>


</html>