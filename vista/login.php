<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <!-- Style -->
    <link rel="stylesheet" href="assets/css/login.css" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <script src="https://cdn.jsdelivr.net/npm/jsencrypt@3.0.0-beta.1/bin/jsencrypt.min.js"></script>
    <linkn href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet"/>
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"/>
    <?php  require_once('comunes/header.php');?>
  </head>



  <body>

   


  <div id="texto" style="display:none;">
        <?php
    if(!empty($mensaje) ){
        echo $mensaje;
    }
?>
    </div>

    <!-- Modal de Error -->
    <div id="errorModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Contenido del modal -->
            <div class="modal-content">
                <div class="modal-header">
                    
                    <h4 class="modal-title">Mensaje de Error</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p id="mens">¡Ups! Algo salió mal. Por favor, inténtalo de nuevo.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>



    <div class="container">
      <div class="card">
        <div class="container-label">Bienvenido <span></span></div>

        <div class="container-icon">
         
        </div>

        <div class="container-form">
            <form  method="post" id="f">
            <label for="usuario">Nombre / Usuario</label>
            <span id="suser"></span>
            <input type="text"id="user" name="user" placeholder="Introducir Nombre / Contraseña" autofocus/>

            <div class="container-input">
              <label for="password">Contraseña</label>

              <span id="spassword"></span>
              <input type="password"id="password" name="password" id="password" placeholder="Digite su Contrasena"/>
              <i id="reveal-password" class="bi bi-eye-slash"></i>
            </div>

          <div class="change-password">
              Recuperar contraseña <a href="?pagina=recuperar" class="">Clique aqui</a>
            </div>
            
            <div class="boton" id="enviar" >Ingresar</div>
            
            </form>
        </div>
      </div>
    </div>

    <?php require_once('comunes/footer.php') ?> 
    <script src="assets/js/login.js"></script>> 
  </body>
</html>

