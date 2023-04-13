<?php
		$nombre="";
		$apaterno="";
		$amaterno="";
		$email="";
		$pass_cifrado="";
		$nivel="";
		$clave="";

		
	include_once 'database.php';
	$db = new Database();
	
	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];

		$buscar_id=$db->connect()->prepare('SELECT * FROM usuarios WHERE id=:id LIMIT 1');
		$buscar_id->execute(array(
			':id'=>$id
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: menu.php');
	}


	if(isset($_POST['guardar'])){
		$pass_cifrado = 
		password_hash($clave,PASSWORD_DEFAULT,array("cost">=10));

		$nombre=$_POST['nombre'];
		$apaterno=$_POST['apaterno'];
		$amaterno=$_POST['amaterno'];
		$nivel=$_POST['nivel'];
		$email=$_POST['email'];
		$clave=$_POST['clave'];
		$id=(int) $_GET['id'];

		if(!empty($nombre) && !empty($apaterno) && !empty($amaterno) && !empty($nivel) && !empty($email) && !empty($clave)){
			if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				echo "<script> alert('Correo no valido');</script>";
			}else{
				$consulta_update=$db->connect()->prepare(' UPDATE usuarios SET  
					nombre=:nombre,
					apaterno=:apaterno,
					amaterno=:amaterno,
					nivel=:nivel,
					email=:email,
					clave=:clave
					WHERE id=:id;'
				);
				$consulta_update->execute(array(
					':nombre' =>$nombre,
					':apaterno' =>$apaterno,
					':amaterno' =>$amaterno,
					':nivel' =>$nivel,
					':email' =>$email,
					':clave' =>$pass_cifrado,
					':id' =>$id
				));
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
	<title>Editar Cliente</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>CRUD EN PHP CON MYSQL</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="nombre" value="<?php if($resultado) echo $resultado['nombre']; ?>" class="input__text">
				<input type="text" name="apaterno" value="<?php if($resultado) echo $resultado['apaterno']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="amaterno" value="<?php if($resultado) echo $resultado['amaterno']; ?>" class="input__text">
				<input type="text" name="nivel" value="<?php if($resultado) echo $resultado['nivel']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="email" value="<?php if($resultado) echo $resultado['email']; ?>" class="input__text">
				<input type="password" name="clave" value="<?php if($resultado) echo $resultado['clave']; ?>" class="input__text">
			</div>
			<div class="btn__group">
				<a href="menu.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
