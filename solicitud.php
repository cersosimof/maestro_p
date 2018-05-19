<?php
require "conexion.php";

$tag = $_POST["nombreEmpresa"];
$nroExp = $_POST["nroExp"];
$sqlBuscarProveedores = "SELECT idEmpresa, nombre, correo, telefono, contacto FROM proveeores WHERE nombre LIKE '%$tag%'";
$cargarProveedor = mysqli_query($link, $sqlBuscarProveedores);



		while($resultado = mysqli_fetch_assoc($cargarProveedor)){ ?>
		    <tr align="center"><td><?php echo $resultado["nombre"]; ?></td>
		    <td align="center"><?php echo $resultado["correo"]; ?></td>
		    <td align="center"><?php echo $resultado["telefono"]; ?></td>
		    <td align="center"><?php echo $resultado["contacto"]; ?></td>
			<td align="center">
				<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
			</td></tr>


	<?php
	$idEmpresa = $resultado["idEmpresa"];
	$SQLIngreso = "INSERT INTO `listadoexpediente`(`idListado`, `nroExpediente`, `idEmpresa`) VALUES (NULL,'$nroExp', '$idEmpresa')";
	$cargarProveedor = mysqli_query($link, $SQLIngreso);
	mysqli_close($link);
		} ?>
