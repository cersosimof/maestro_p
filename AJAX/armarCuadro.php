<?php

require "../classConnectionMySQL.php";
$NewConn = new ConnectionMySQL();
$NewConn->CreateConnection();

$nroExpediente = $_POST["nroExp"];

//SQL de creacion de la taba. trae todo lo que tiene ese expediente.
$SQLArmadoTabla = "SELECT listadoexpediente.idListado, listadoexpediente.nroExpediente, proveeores.idEmpresa, proveeores.nombre, proveeores.correo, proveeores.telefono, proveeores.contacto, proveeores.cuit
FROM listadoexpediente
LEFT JOIN proveeores ON listadoexpediente.idEmpresa = proveeores.idEmpresa
WHERE listadoexpediente.nroExpediente = '$nroExpediente'";
$armadoTabla = $NewConn->ExecuteQuery($SQLArmadoTabla);


while($tabla = mysqli_fetch_assoc($armadoTabla)){ ?>

<tr>
<td align="center"><?php echo $tabla["nombre"]; ?></td>
<td align="center"><?php echo $tabla["correo"]; ?></td>
<td align="center"><?php echo $tabla["telefono"]; ?></td>
<td align="center"><?php echo $tabla["contacto"]; ?></td>
<td align="center" class='botonEliminar' id="<?php echo $tabla["idEmpresa"]; ?>">DELETE</td>
</tr>
<?php } ?>

