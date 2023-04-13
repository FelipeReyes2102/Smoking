<!DOCTYPE html>
<html lang="es">
  <head>
     <title>Cambio en los datos de las noticias</title>
	 <meta charset="utf-8">
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
	 </head>
	 <body>
		<?php
			//include('index.php');
			include('database.php');
			$db = new Database();
			$folio="";
			function test_entrada($data){
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}
			if($_SERVER["REQUEST_METHOD"]=="POST"){
				$folio = test_entrada($_POST["folio"]);
			}
		?>
		<form method="POST" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]);?>">
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
						<div class="mb-3">
							<label for="exampleFormControlInput1" class="form-label">Folio de renta a modificar:</label>
							<input type="text" class="form-control" id="folio"  name="folio" value="<?php echo $folio;?>">
						</div>
						<div class="mb-3">
							<input type="submit" class="btn btn-primary" name ="buscar" id="buscar" value="Buscar folio"/>
						</div>
			<?php
				if(isset($_REQUEST['buscar'])){
					$folio=isset($_REQUEST['folio']) ? $_REQUEST['folio'] : null;

					$query = $db->connect()->prepare('select * FROM rentas where folio = :folio');
								$query->setFetchMode(PDO::FETCH_ASSOC);
								$query->execute(['folio' => $folio]);
								$row = $query->fetch();
								if($query -> rowCount() > 0){

							//$isCheckedL = $row['estado_renta'] == 'Apartado' ? 'checked' : '';
							//$isCheckedN = $row['estado_renta'] == 'Rentado' ? 'checked' : '';
							//$isCheckedI = $row['estado_renta'] == 'Devuelto' ? 'checked' : '';
							echo
								'<div class="mb-3">
									<label for="exampleFormControlInput1" 
										class="form-label">Folio de renta a modificar:</label>
									<input type="text" class="form-control" value="'.$row['folio'].'" disabled/>
								</div>'.
								'<div class="mb-3">
									<label for="exampleFormControlInput1" 
										class="form-label">Nombre del cliente:</label>
									<input type="text" class="form-control" lang="es" href="qa-html-language-declarations.es"
										name="nombre_cliente" value ="'.$row['nombre_cliente'].'"/>
								</div>'.
								'<div class="mb-3">
									<label for="exampleFormControlInput1" 
										class="form-label">Descripción:</label>
									<textarea class="form-control" name="descripcion" rows="5" cols="40">'.$row['descripcion'].'</textarea>
								</div>'.
								'<div class="mb-3">
									<label for="exampleFormControlInput1" class="form-label">Fecha de entrega:</label>
									<input type="date" class="form-control" name="fecha_entrega" value ="'.$row['fecha_entrega'].'">
								</div>'.
								'<div class="mb-3">
									<label for="exampleFormControlInput1" class="form-label">Estado de renta:</label>
									<select class="form-select" aria-label="Default select example" name="estado_renta" id="estado_renta">
										<option value="'.$row['estado_renta'].'">'.$row['estado_renta'].'</option>
										 <option value="Apartado">Apartado</option>
										 <option value="Rentado">Rentado</option>
										 <option value="Devuelto">Devuelto</option>
									</select>
								</div>'.
								'<div class="mb-3">
									<label for="exampleFormControlInput1" 
										class="form-label">Monto de la renta:</label>
									<input type="text" class="form-control" lang="es" href="qa-html-language-declarations.es"
										name="monto_renta" value ="'.$row['monto_renta'].'"/>
								</div>'.

								'<div class="mb-3">
									<label for="exampleFormControlInput1" 
										class="form-label">Saldo pendiente:</label>
									<input type="text" class="form-control" lang="es" href="qa-html-language-declarations.es"
										name="saldo_pendiente" value ="'.$row['saldo_pendiente'].'"/>
								</div>'.

								'<div class="mb-3">
									<label for="exampleFormControlInput1" 
										class="form-label">Pago total:</label>
									<input type="text" class="form-control" lang="es" href="qa-html-language-declarations.es"
										name="pago_total" value ="'.$row['pago_total'].'"/>
								</div>'.

								'<div class="mb-3">
									<button type="submit" class="btn btn-primary" name="cambiar">Cambiar datos</button>
								</div>';
						}else if ($query -> rowCount() <= 0){
							echo "no existe ese folio.";
						}		 
				}//if(isset($_REQUEST[''buscar]))
				
				if(isset($_REQUEST['cambiar'])){ 

					//$folio=$_POST['folio'];
					$nombre_cliente=$_POST['nombre_cliente'];
					$descripcion=$_POST['descripcion'];
					$fecha_entrega=$_POST['fecha_entrega'];
					$estado_renta =$_POST['estado_renta'];
					$monto_renta =$_POST['monto_renta'];
					$saldo_pendiente =$_POST['saldo_pendiente'];
					$pago_total =$_POST['pago_total'];
					
					$sql = "UPDATE rentas SET folio=?, nombre_cliente=?, descripcion=?, fecha_entrega=?, estado_renta=?, monto_renta=?, saldo_pendiente=?, pago_total=? WHERE folio=?";
					$stmt= $db->connect()->prepare($sql);
					$stmt->execute([$folio, $nombre_cliente, $descripcion, $fecha_entrega, $estado_renta, $monto_renta, $saldo_pendiente, $pago_total, $folio]);
						
					
					/*$consulta= 'update rentas set folio= : folio, nombre_cliente = :nombre_cliente, descripcion = :descripcion, fecha_entrega = :fecha_entrega, estado_renta = :estado_renta, monto_renta = :monto_renta, saldo_pendiente = :saldo_pendiente, pago_total = :pago_total where folio = :folio';
					$consulta = $db->connect()->prepare($consulta);
					$consulta->bindParam(':folio',$folio,PDO::PARAM_STR, 25);
					$consulta->bindParam(':nombre_cliente',$nombre_cliente,PDO::PARAM_STR, 25);
					$consulta->bindParam(':descripcion',$descripcion,PDO::PARAM_STR,25);
					$consulta->bindParam(':fecha_entrega',$fecha_entrega,PDO::PARAM_STR,25);
					$consulta->bindParam(':estado_renta',$estado_renta,PDO::PARAM_STR);
					$consulta->bindParam(':monto_renta',$monto_renta,PDO::PARAM_STR);
					$consulta->bindParam(':saldo_pendiente',$saldo_pendiente,PDO::PARAM_STR);
					$consulta->bindParam(':pago_total',$pago_total,PDO::PARAM_STR);
					$consulta->execute();
					*/

					$row = $stmt->fetch();
					if($stmt->rowCount() > 0){
						echo"<br/><br/>Los datos fueron modificados con exito";
						print ("<br/><br/><hr/><br/>");
						print ("<table class='table table-striped'>\n");
							print ("<tr>\n");
								print ("<th>Folio</th>\n");
								print ("<td>" . $folio . "</td>\n");
							print ("</tr>\n");
							print ("<tr>\n");
								print ("<th>Nombre</th>\n");
								print ("<td>" . $_REQUEST['nombre_cliente'] . "</td>\n");
							print ("</tr>\n");
							print ("<tr>\n");
								print ("<th>Descripcion</th>\n");
								print ("<td>" . $descripcion . "</td>\n");
							print ("</tr>\n");
							print ("<tr>\n");
								print ("<th>Fecha de entrega</th>\n");
								print ("<td>" . $fecha_entrega . "</td>\n");
								//$variable = utf8_decode($variable);
							print ("</tr>\n");
							print ("<tr>\n");
								print ("<th>Estado de renta</th>\n");
								print ("<td>" .$estado_renta. "</td>\n");
							print ("</tr>\n");
							print ("<tr>\n");
								print ("<th>Monto renta</th>\n");
								print ("<td>" .$monto_renta. "</td>\n");
							print ("</tr>\n");
							print ("<tr>\n");
								print ("<th>Saldo pendiente</th>\n");
								print ("<td>" .$saldo_pendiente. "</td>\n");
							print ("</tr>\n");
							print ("<tr>\n");
								print ("<th>Pago total</th>\n");
								print ("<td>" .$pago_total. "</td>\n");
						print ("</table>\n");
						print ("<br /><hr />");
					}else if ($stmt->rowCount()<=  0){
						echo "No se actualizó el registro!!!";
					}
				}//boton cambiar
				//mysqli_close($conexion);
			?>
		</form><!--El form cierra hasta aquí por que los datos del reg.
				son parte del formulario-->
				</div> <!--class="col-8"-->
					<div class="col">
					</div>
				</div><!--class="row"-->
			</div><!--class="container"-->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
	</body>
</html>