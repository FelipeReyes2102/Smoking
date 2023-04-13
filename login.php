<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>

<?php
  
  if(isset($_REQUEST['cp'])){ ?>
    <script type='text/javascript'>
      alert("Mira el recaptcha wey")
    </script>
  <?php }
  


		session_start();
		include('database.php');
		$usuario=$password="";

		if(isset($_SESSION['nivel'])){
			switch($_SESSION['nivel']){
				case 1:
					header('location: Crud_Usuarios/menu.php');
					break;

				case 2:
					header('location: CRUD_Rentas/menu.php');
					break;

				default:
			}
		}
   
    if(($_SERVER["REQUEST_METHOD"] == "POST")){
      if(!isset($_POST['g-recaptcha-response']) || empty($_POST['g-recaptcha-response'])) {
        //recaptcha vacio
        header("location:login3.php?cp=1");
      } else {
        $secret = '6LeU9AklAAAAAFJ-E2tYzzeXPwkhVIo1AEgo5Lco';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response);

   
    
    if ($response != null && $response->success) {
       // Añade aquí el código que desees en el caso de que la validación sea correcta
     } else {
       // Añade aquí el código que desees en el caso de que la validación no sea correcta o muestra
     }

		if(isset($_POST['username']) && isset($_POST['password'])){
				$username = $_POST['username'];
				$password = $_POST['password'];

				$db = new Database();
				$sql = "SELECT * FROM usuarios WHERE email =:username";
				
				$stmt = $db->connect()->prepare($sql);
				
				$stmt->execute(['username' => $username]);
				$result = $stmt->fetch();
				
				if (!empty($result) && password_verify($password, $result["clave"])){
					// validar rol
					$rol = $result[6];
					$_SESSION['nivel'] = $rol;

					switch($_SESSION['nivel']){
						case 1:
							header('location: Crud_Usuarios/menu.php');
						break;
			
						case 2:
						header('location: CRUD_Rentas/menu.php');
						break;
			
						default:
					}
				
				}else{
					// no existe el usuario
					echo '<script language="javascript">alert("Datos incorrectos!!!");</script>';
				}
				}	
      }
      }
		?>
		
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">SISTEMA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="index.php">Salir de la aplicación</a>
        </div>
        </div>
    </div>
</nav>
<form action="" method="post">
  <div class="imgcontainer">
    <img src="img/logologin.png" alt="Avatar" class="avatar" width="100" height="350">
  </div>

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
    
    <div class="g-recaptcha" data-sitekey="6LeU9AklAAAAAD0mw_KRrS2ang0vRW14jxPiV4Nb
"></div>
        
      <div class="contenedor-boton">
						<input type="submit" value="Entrar Ahora!" id="btn-login">
					</div>
    <a href="usuarios.php" class="text-info">Regístrate aquí!!!</a>
  </div>

  <div class="container" style="background-color:#f1f1f1">
  </div>
</form>

<script src="https://www.google.com/recaptcha/api.js?hl=es" async defer></script>
</body>
</html>