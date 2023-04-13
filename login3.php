<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <title>Login trajes</title>
</head>

<body>
<div class="cont">
		<link rel="stylesheet" type="text/css" href="css/loader.css">
		<div class="lds-spinner loader" id="loader"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
		<script src="js/loader.js"></script>
	</div>

  <?php 
   ini_set('display_errors', 1);
   ini_set('log_errors', 1);
   ini_set('error_log', dirname(__FILE__) . '/logs/log.txt');
   error_reporting(E_ALL);

  
  
  ?>



    <div class="login-box">
        <img src="https://image.spreadshirtmedia.net/image-server/v1/products/T1459A839PA4459PT28D15526028W9652H10000/views/1,width=550,height=550,appearanceId=839,backgroundColor=F2F2F2/pingueino-en-el-sombrero-de-lujo-y-traje-pegatina.jpg" class="avatar" alt="Avatar Image">
       
        <form method="POST" action="validarsesion.php">
          <!-- USERNAME INPUT -->
          <label for="username">Usuario</label>
          <input type="text" id="username" name="username" placeholder="Enter Username">
          <!-- PASSWORD INPUT -->
          <label for="password">Contraseña</label>
          <input type="password" id="password" name="password" placeholder="Enter Password">
          <div class="d-grid gap-2 col-9 mx-auto">
          <div class="g-recaptcha" data-sitekey="6LeU9AklAAAAAD0mw_KRrS2ang0vRW14jxPiV4Nb"></div>
            <button class="btn btn-primary" name="btnlogin"  type="submit">Iniciar Sesion</button>
            <br>
           <button class="btn btn-danger" onclick="window.location.href='usuarios.php'" type="button">Registrate</button> 
          </div>
        
          <script src="https://www.google.com/recaptcha/api.js?hl=es" async defer></script> 
          <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>   
</body>
</html> 