<?php

require "../classConnectionMySQL.php";
$NewConn = new ConnectionMySQL();
$NewConn->CreateConnection();

$select = $_POST['select'];
$nroExp = $_POST['nroExp'];
$titulo = $_POST['titulo'];

$sqlInsertar = "INSERT INTO `listadoexpediente`(`idListado`, `nroExpediente`, `titulo`, `idEmpresa`) VALUES (NULL, '$nroExp', '$titulo', '$select')";
$ejecutar = $NewConn->ExecuteQuery($sqlInsertar);

$sqlBuscarProveedores = "SELECT idEmpresa, nombre, correo, telefono, contacto FROM proveeores WHERE idEmpresa LIKE '$select'";
$cargarProveedor = $NewConn->ExecuteQuery($sqlBuscarProveedores);

		while($resultado = $cargarProveedor->fetch_assoc()){ ?>
		    <tr align="center"><td><?php echo $resultado["nombre"]; ?></td>
		    <td align="center"><?php echo $resultado["correo"]; ?></td>
		    <td align="center"><?php echo $resultado["telefono"]; ?></td>
			<td align="center"><?php echo $resultado["contacto"]; ?></td>
			<td align="center" class="botonEliminar" id="<?php echo $resultado["idEmpresa"]; ?>"><i class="fas fa-trash-alt"></i></td>
</tr>
		<?php } ?>


