

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
							 <div id="tipo"  class="btn btn-success" >Cambiar a gráfico circular</div>

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
	
    
  </ul>
  <?PHP if (in_array("pagos_reportes", $nivel1)) {?> 
  <div class="tab-content">
    <div id="home" class="tab-pane fade show active">
      <h3>reporte de pagos mensual</h3>
	  
	  
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