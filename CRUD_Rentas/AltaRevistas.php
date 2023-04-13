<!DOCTYPE html>

<html lang="es">
	<head>
		<title>Capturar datos en Revista</title>
		<meta charset="UTF-8">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
	</head>
	<body>
		<?php 
			
			//include('index.php');
			include('database.php');
			$folio=$nombre_cliente=$descripcion=$fecha_apartado=$fecha_entrega=$fecha_devolucion=$monto_renta=$anticipo=$pago=$saldo_pendiente=$pago_total=$estado_renta="";
			
			$db = new Database();
			$query = $db->connect()->prepare('select max(folio) as maximo FROM rentas');
			$query->execute();
			$row = $query->fetch();
			$numero=$row["maximo"];
			$numero++;

			function test_entrada($data){
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}
			if($_SERVER["REQUEST_METHOD"]=="POST"){
				
			  $nombre_cliente = test_entrada($_POST["nombre_cliente"]);
				$descripcion = test_entrada($_POST["descripcion"]);
				$fecha_apartado = test_entrada($_POST["fecha_apartado"]);
				$fecha_entrega = test_entrada($_POST["fecha_entrega"]);
				$monto_renta = test_entrada($_POST["monto_renta"]);
				$anticipo = test_entrada($_POST["anticipo"]);
				$pago = test_entrada($_POST["pago"]);
				$estado_renta = test_entrada($_POST["estado_renta"]);
				$campos = array();

				if($estado_renta==""){
				array_push($campos, "Debes elegir un estado de renta");
				}
				
				if($nombre_cliente == ""){
					array_push($campos, "El campo nombre esta vacio");
				}

				if($descripcion == ""){
					array_push($campos, "El campo de descripcion esta vacio");
				}

				
				if(count($campos) > 0){
					echo "<div class='error'>";
					for($i = 0; $i < count($campos); $i++){
						echo "<li>".$campos[$i]."</i>";
					}
				}else{
					echo "<div class='correcto'>
							Datos correctos";
				}
				echo "</div>";
			}
		?>
		
		<div class="container">
  		<div class="row">
    		<div class="col-4">
					<div class="list-group">
						<a href="menu.php" class="list-group-item list-group-item-action active" aria-current="true">
							Administración de rentas
						</a>
						<a href="AltaRevistas.php" class="list-group-item list-group-item-action">Agregar registro</a>
						<a href="consultaNoticias.php" class="list-group-item list-group-item-action">Consultar registro</a>
						<a href="cambiosNoticias.php" class="list-group-item list-group-item-action">Modificar registro</a>
						<a href="bajaRevistas.php" class="list-group-item list-group-item-action">Eliminar registro</a>
						<a href="#" class="list-group-item list-group-item-action">Cerrar sesión</a>
					</div>
    		</div>
    		<div class="col-8">
					<form method="POST" 
						autocomplete="on"
						action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<div class="mb-3">
							<label for="exampleFormControlInput1" class="form-label">Folio:</label>
								<input type="text" class="form-control" id="folio"  value="<?php echo $numero;?>" name ="folio" disabled>
						</div>
						<div class="mb-3">
							<label for="nombre_cliente" class="form-label">Nombre del cliente :</label>
								<input type="text" 
								class="form-control" 
								id="nombre_cliente"  
								value="<?php echo $nombre_cliente;?>" 
								name ="nombre_cliente" 
								placeholder=""/>
						</div>

						<div class="mb-3">
							<label for="descripcion" class="form-label">Descripción de la prenda:</label>
								<input type="text" 
								class="form-control" 
								id="descripcion"  
								value="<?php echo $descripcion;?>" 
								name ="descripcion" 
								placeholder="">
						</div>

						<div class="mb-3">
							<label for="monto_renta" class="form-label">Monto:</label>
								<input type="text" 
								class="form-control" 
								id="monto_renta"  
								value="<?php echo $monto_renta;?>" 
								name ="monto_renta" 
								placeholder="">
						</div>

						<div class="mb-3">
							<label for="anticipo" class="form-label">Anticipo:</label>
								<input type="text" 
								class="form-control" 
								id="anticipo"  
								value="<?php echo $anticipo;?>" 
								name ="anticipo" 
								placeholder="">
						</div>

						<div class="mb-3">
							<label for="pago" class="form-label">Pago:</label>
								<input type="text" 
								class="form-control" 
								id="pago"  
								value="<?php echo $pago;?>" 
								name ="pago" 
								placeholder="">
						</div>

						
						<div class="mb-3">
							<label for="fecha_apartado" class="form-label">Fecha de apartado:</label>
								<input type="date" 
								class="form-control" 
								id="fecha_apartado"  
								name ="fecha_apartado" 
								value="<?php echo date("Y-m-d");?>">
						</div>


						<div class="mb-3">
							<label for="fecha_entrega" class="form-label">Fecha de entrega:</label>
								<input type="date" 
								class="form-control" 
								id="fecha_entrega"  
								name ="fecha_entrega" 
								value="<?php echo date("Y-m-d");?>">
						</div>



						<div class="mb-3">
							<label for="estado_renta" class="form-label">Estado de la renta:</label>
							<select class="form-select" aria-label="Default select example" name="estado_renta" id="estado_renta">
								<option selected>Selecciona una categoría</option>
								<option value="Apartado"
									<?php 
									if($estado_renta=="Apartado") 
										echo "selected" 
									?>>Apartado</option>
								<option value="Rentado"
									<?php 
									if($estado_renta=="Rentado") 
										echo "selected" 
									?>>Rentado</option>
								<option value="Devuelto"
									<?php 
									if($estado_renta=="Devuelto") 
										echo "selected" 
									?>>Devuelto</option>

								
							</select>
						</div><!--class="mb-3"-->
						<div class="mb-3">
							<button type="submit" class="btn btn-primary" name ="enviar">Enviar datos.</button>
						</div>
					</form>	
    		</div><!--div class="col-8"-->
    		<div class="col">
    		</div><!--class="col"-->
  		</div><!--class="row"-->
	</div><!--class="container"-->
		<?php
			if (isset($_REQUEST['enviar'])){
				$query = $db->connect()->prepare('SELECT folio FROM rentas WHERE folio = :folio');
				$query->execute(['folio' => $folio]);
				$row = $query->fetch(PDO::FETCH_NUM);
				if($query -> rowCount() <= 0){
					//echo 'entro al if del insert!!!';
					//$folio=$_POST['folio'];
					$nombre_cliente=$_POST['nombre_cliente'];
					$descripcion=$_POST['descripcion'];
					$monto_renta=$_POST['monto_renta'];
					$anticipo =$_POST['anticipo'];
					$pago =$_POST['pago'];
					$fecha_apartado =$_POST['fecha_apartado'];
					$fecha_entrega =$_POST['fecha_entrega'];
					$estado_renta =$_POST['estado_renta'];
					$saldo_pendiente = $monto_renta-$anticipo-$pago;
					$pago_total = $anticipo+$pago;
					$fecha_devolucion =$_POST['fecha_devolucion']= date("Y-m-d", strtotime($fecha_entrega."+ 5 days"));
					$insert="insert into rentas(nombre_cliente,descripcion,monto_renta,anticipo,pago,fecha_apartado,fecha_entrega,estado_renta,saldo_pendiente,pago_total,fecha_devolucion) values (:nombre_cliente,:descripcion,:monto_renta,:anticipo,:pago,:fecha_apartado,:fecha_entrega,:estado_renta,:saldo_pendiente,:pago_total,:fecha_devolucion)";
					$insert = $db->connect()->prepare($insert);
					$insert->bindParam(':nombre_cliente',$nombre_cliente,PDO::PARAM_STR, 25);
					$insert->bindParam(':descripcion',$descripcion,PDO::PARAM_STR, 25);
					$insert->bindParam(':monto_renta',$monto_renta,PDO::PARAM_STR,25);
					$insert->bindParam(':anticipo',$anticipo,PDO::PARAM_STR,25);
					$insert->bindParam(':pago',$pago,PDO::PARAM_STR);
					$insert->bindParam(':fecha_apartado',$fecha_apartado,PDO::PARAM_STR);
					$insert->bindParam(':fecha_entrega',$fecha_entrega,PDO::PARAM_STR);
					$insert->bindParam(':estado_renta',$estado_renta,PDO::PARAM_STR);
					$insert->bindParam(':saldo_pendiente',$saldo_pendiente,PDO::PARAM_STR);
					$insert->bindParam(':pago_total',$pago_total,PDO::PARAM_STR);
					$insert->bindParam(':fecha_devolucion',$fecha_devolucion,PDO::PARAM_STR);
					$insert->execute();
					if (!$query){
						echo "Error:",$sql->errorInfo();
					}
					echo "<br> El folio y los datos han sido registrados.";
					echo "<br><h2>Datos de entrada:</h2>";
					
					echo "<br>";
					echo "Nombre: ".$_POST['nombre_cliente'];
					echo "<br>";
					echo "Descripcion: ".$_REQUEST['descripcion'];
					echo "<br>";
					echo "Fecha de entrega: ".$_REQUEST['fecha_entrega'];
					echo "<br>";
					echo "Fecha de apartado: ".$_REQUEST['fecha_apartado'];
					echo "<br>";
					echo "Fecha de devolución: ".$_POST['fecha_devolucion'];
					echo "<br>";
					echo "Anticipo: ".$_REQUEST['anticipo'];
					echo "<br>";
					echo "Monto: ".$_REQUEST['monto_renta'];
					}else if ($query -> rowCount() > 0){
						echo "<br> YA EXISTE UN CLIENTE CON ESE FOLIO.";
					}
					$query->closeCursor(); // opcional en MySQL, dependiendo del controlador de base de datos puede ser obligatorio
					$query = null; // obligado para cerrar la conexión
					$db = null;
			}
		?>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
	</body>
</html>