<?php
  
  ini_set('display_errors', 1);
   ini_set('log_errors', 1);
   ini_set('error_log', dirname(__FILE__) . '/logs/log.txt');
   error_reporting(E_ALL);

  
 

		session_start();
		include('database.php');
		$usuario=$password="";

		if(isset($_SESSION['nivel'])){
			switch($_SESSION['nivel']){
				case 1:
					header('location: Crud_Usuarios/menu.php');
					break;

				case 2:
					header("location:index.php");
					break;

				default:
			}
		}
   
    if(($_SERVER["REQUEST_METHOD"] == "POST")){
      if(!isset($_POST['g-recaptcha-response']) || empty($_POST['g-recaptcha-response'])) {
        //recaptcha vacio
        echo '<script>alert("Recaptcha vacio!!");
        window.location.href = "login3.php";
        </script>';
	
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
                            header("location:index.php");
						break;
			
						default:
					}
				
				}else{
					// no existe el usuario
					echo '<script>alert("Datos erroneos");
                    window.location.href = "login3.php";
                    </script>';
				}
				}	
      }
      }
		?>