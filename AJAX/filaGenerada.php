<?php

require "../classConnectionMySQL.php";
$NewConn = new ConnectionMySQL();
$NewConn->CreateConnection();

$select = $_POST['select'];


$sqlBuscarProveedores = "SELECT idEmpresa, nombre, correo, telefono, contacto FROM proveeores WHERE idEmpresa LIKE '$select'";
$cargarProveedor = $NewConn->ExecuteQuery($sqlBuscarProveedores);

		while($resultado = $cargarProveedor->fetch_assoc()){ ?>
		    <tr align="center"><td><?php echo $resultado["nombre"]; ?></td>
		    <td align="center"><?php echo $resultado["correo"]; ?></td>
		    <td align="center"><?php echo $resultado["telefono"]; ?></td>
			<td align="center"><?php echo $resultado["contacto"]; ?></td>
			<td align="center" >DELETE</td>
</tr>
		<?php } ?>


