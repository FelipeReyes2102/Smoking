<?php 

		$nombre="";
		$apaterno="";
		$amaterno="";
		$email="";
		$pass_cifrado="";
		$nivel="";
		$clave="";
		include('database.php');
		$db = new Database();
		$query = $db->connect()->prepare('select max(id) as maximo from usuarios');

		$query->execute();
		$row = $query->fetch();
		$numero=$row["maximo"];
		$numero++;

	include_once 'database.php';
	$db = new Database();
	if(isset($_POST['guardar'])){
				$pass_cifrado = 
				password_hash($clave,PASSWORD_DEFAULT,array("cost">=10));
				
		$nombre=$_POST['nombre'];
		$apaterno=$_POST['apaterno'];
		$amaterno=$_POST['amaterno'];
		$nivel=$_POST['nivel'];
		$email=$_POST['email'];
		$clave=$_POST['clave'];

		if(!empty($nombre) && !empty($apaterno) && !empty($amaterno) && !empty($nivel) && !empty($email) && !empty($clave) ){
			if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				echo "<script> alert('Correo no valido');</script>";
			}else{
				$insert="insert into usuarios(nombre,apaterno,amaterno,email,nivel,clave) values (:nombre,:apaterno,:amaterno,:email,:nivel,:clave)";
				$insert = $db->connect()->prepare($insert);
				$insert->bindParam(':nombre',$nombre,PDO::PARAM_STR, 25);
				$insert->bindParam(':apaterno',$apaterno,PDO::PARAM_STR, 25);
				$insert->bindParam(':amaterno',$amaterno,PDO::PARAM_STR,25);
				$insert->bindParam(':email',$email,PDO::PARAM_STR,25);
				$insert->bindParam(':nivel',$nivel,PDO::PARAM_STR);
				$insert->bindParam(':clave',$pass_cifrado,PDO::PARAM_STR);
				$insert->execute();
				if (!$query){
					echo "Error:",$sql->errorInfo();
				}
				header('Location: menu.php');
			}
		}else{
			echo "<script> alert('Los campos estan vacios');</script>";
		}

	}


?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Nuevo Cliente</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>CRUD EN PHP CON MYSQL</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="nombre" placeholder="Nombre" class="input__text">
				<input type="text" name="apaterno" placeholder="Apellido paterno" class="input__text">
				
			</div>
			<div class="form-group">
			
			
			<select name="nivel" id="nivel" >
				<option selected>Selecciona el nivel</option>
				<option value="1"
					<?php if($nivel=="1") echo "selected" ?>>1
				</option>
				<option value="2"
					<?php if($nivel=="2") echo "selected" ?>>2
				</option>
				<option value="3" 
					<?php if($nivel=="3") echo "selected" ?>>3
				</option>
			</select>
				<input type="text" name="amaterno" placeholder="Apellido materno" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="email" placeholder="Correo electrónico" class="input__text">
			</div>
			<div class="form-group">
				<input type="password" name="clave" placeholder="Contraseña" class="input__text">
			</div>
			<div class="btn__group">
				<a href="menu.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
