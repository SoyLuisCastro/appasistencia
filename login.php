<?php
if(session_id()==''){
    session_start();
}
//limpiamos el array de la variable de ssesion. 
$_SESSION = array();
// permite destruir la sesión activa
session_destroy();
?>

<html>
    <head>
        <title>Iniciar Session | Grupo Intercom</title>
      <link rel="icon" href="img/logotipo_intercom.ico">
         <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
       <!--<link rel="stylesheet" href="css/bootstrap.min.css">-->
        <link rel="stylesheet" href="css/login.css">
 <link rel="stylesheet" media="all" href="css/style.css" />
 <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
       
<link rel="stylesheet" href="css/bootstrap.min.css" >
         <?php include 'cargandop.php'; ?>

     </head>          
    
        
     <body style="background: rgb(34,193,195);
      background: linear-gradient(345deg, #00BCD4 23%, #FFC107 100%);
	color: #333;
	font: 100% Lato, Arial, Sans Serif;
	height: 100vh;
	margin: 0;
	padding: 0;
	overflow-x: hidden;" >
  <div id="background-wrap">
    <div class="bubble x1"></div>
    <div class="bubble x2"></div>
    <div class="bubble x3"></div>
    <div class="bubble x4"></div>
    <div class="bubble x5"></div>
    <div class="bubble x6"></div>
    <div class="bubble x7"></div>
    <div class="bubble x8"></div>
    <div class="bubble x9"></div>
    <div class="bubble x10"></div>
</div>

     
         <div class="navbar navbar-dark ">
   
  </div>

       
        <!--<div class="col-lg-5 col-lg-offset-6"></div>--> 
        <div class="container">
            <div class="login-form ">
                <div class="form-header ">
                    <img src="img/logo_intercom.png" class="img-fluid" width="300px" >
                </div>
                <form class="form-signin" method="post" id="envia_login">
                       <div id="mensaje"></div>
                    <i class='fas fa-users'></i> <strong> Usuario</strong>  <input class="form-control input-sm" type="text" id="UsuarioTxt" name="usuario_p" placeholder="ingrese la cedula" required>
                    <i class='fas fa-lock'></i>  <strong>Contraseña</strong><input class="form-control input-sm" type="password" id="claveTxt" name="clave_p" placeholder="ingrese la contraseña" required>
                    <!-- <a class="bi bi-person-circle" href="register.php">registrarse</a> -->
                    <hr>
                    <button id="envia_login"  type="submit" name="Ingresar" class="btn btn-lg btn-primary btn-block" > <i class="fa fa-sign-in-alt"></i>  Iniciar Session</button>
                </form>
               
                    
               
             
                
            </div>
        </div>
    </body>
</html>
<!--<script src="js/jquery-3.6.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>-->
 <script src="vendor/jquery/jquery.min.js"></script>
 <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function(){
  $('#envia_login').bind("submit", function (){
    Swal.fire({
      title: 'Verificando usuario....',
      icon: 'question',
      html: 'en uno<b></b> milisegundos.',
      timer: 3000,
      timerProgressBar: true,
      showConfirmButton: false,
      didOpen: () => {
        Swal.showLoading();
        const b = Swal.getHtmlContainer().querySelector('b');
        timerInterval = setInterval(() => {
          b.textContent = Swal.getTimerLeft();
        }, 100);
      },
      willClose: () => {
        clearInterval(timerInterval);

        // Realizar la solicitud AJAX después de cerrar el mensaje de carga
        $.ajax({
          type: 'POST',
          url: 'ajax/verificalogin.php',
          data: $(this).serialize(),
          success: function (data){
            if(data == 1){
              window.location = 'inicio.php';
            }else{
              $('#mensaje').html(data);
            }
          }
        });
      }
    });

    return false;
  });
});




</script>

<script src="js/sweetalert2@11.js"></script>