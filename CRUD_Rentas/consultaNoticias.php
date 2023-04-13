<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Consulta de rentas.</title>
		<meta charset="utf-8">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
	</head>
	<body>
		<?php
			//include('index.php');
			include('database.php');
			$folio="";
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
					<a href="" class="list-group-item list-group-item-action">Cerrar sesión</a>
				</div>
    		</div>
				<div class="col-8">
					
				<form method="post" 
						action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
						
						<div class="mb-3">
							<label for="exampleFormControlInput1" class="form-label">Folio:</label>
							<input type="text" class="form-control" id="folio" name ="folio" value="<?php echo $folio;?>"/>
						</div>
						<div class="mb-3">
							<input type="submit" class="btn btn-primary" name="buscar" value="Consultar una renta">
						</div>

						<div class="mb-3">
							<input type="submit" class="btn btn-primary" name="todo" value="Mostrar todas las rentas">
						</div>
					</form>
					<?php
					$db = new Database();
			if (isset($_REQUEST['buscar'])){
				//echo "Si entro a buscar una clave!!!";
				$folio=isset($_REQUEST['folio']) ? $_REQUEST['folio'] :  null;

				$query = $db->connect()->prepare('select * FROM rentas where folio = :folio');
								$query->setFetchMode(PDO::FETCH_ASSOC);
								$query->execute(['folio' => $folio]);
								$row = $query->fetch();
								if($query -> rowCount() <= 0){
									echo "<br /><br /><h2>No existe ese número de folio.</h2>";
								}elseif ($query -> rowCount() > 0){
									print ("<br/><br/><br/>");
									print ("Datos del registro.");
									print ("<br/><br/><hr/><br/>");
									print ("<table class='table table-striped'>\n");
										print ("<tr>\n");
											print ("<th>Folio</th>\n");
											print ("<td>".$row['folio']. "</td>\n");
										print ("</tr>\n");
										print ("<tr>\n");
											print ("<th>Nombre</th>\n");
											print ("<td>" . $row['nombre_cliente'] . "</td>\n");
										print ("</tr>\n");
										print ("<tr>\n");
											print ("<th>Texto</th>\n");
											print ("<td>" . $row['descripcion'] . "</td>\n");
										print ("</tr>\n");
										print ("<tr>\n");
											print ("<th>Categoría</th>\n");
											print ("<td>" . $row['estado_renta'] . "</td>\n");
										//$variable = utf8_decode($variable);
										print ("</tr>\n");
										print ("<tr>\n");
											print ("<th>Fecha</th>\n");
											print ("<td>" .$row['fecha_entrega']. "</td>\n");
										print ("</tr>\n");
										print ("<tr>\n");
											print ("<th>Clave</th>\n");
											print ("<td>" . $row['fecha_devolucion'] . "</td>\n");
										print ("</tr>\n");
									print ("</table>\n");
									print ("<br /><hr />");
				} 
			}
			if (isset($_REQUEST['todo'])){

				$query = $db->connect()->prepare('select * FROM rentas order by folio desc');
				$query->setFetchMode(PDO::FETCH_ASSOC);
				$query->execute();
				//$row = $query->fetch();
				if($query -> rowCount() > 0){
					print ("<br/><br/><br/>");
					print ("Listado de rentas registradas.");
					print ("<br/><br/><hr/><br/>");
					print ("<table class='table table-striped'>\n");
					print ("<tr>\n");
					print ("<thead>\n");
						print ("<th>Folio</th>\n");
						print ("<th>Nombre</th>\n");
						print ("<th>Descripcion</th>\n");
						print ("<th>Estado de renta</th>\n");
						print ("<th>Fecha de entrega</th>\n");
						print ("<th>Fecha de devolucion</th>\n");
						print ("</th>\n");
					print ("</thead>\n");
					while ($row = $query->fetch()){
						print ("<tr>\n");
						print ("<td>" . $row['folio'] . "</td>\n");
						print ("<td>" . $row['nombre_cliente'] . "</td>\n");
						print ("<td>" . $row['descripcion'] . "</td>\n");
						print ("<td>" . $row['estado_renta'] . "</td>\n");
						print ("<td>" . $row['fecha_entrega'] . "</td>\n");
						print ("<td>" . $row['fecha_devolucion'] . "</td>\n");
						print ("</tr>\n");
					}
					print ("</table>\n");
				}
				else
					print ("No hay registros disponibles");
			}
			//mysqli_close($conexion);
		?>
				</div><!--class="col-8"-->
			</div><!--class="row"-->
		</div><!--class="container"-->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
	</body>
</html>
