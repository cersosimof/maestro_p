<?php

require "../classConnectionMySQL.php";
$instance = ConnectDb::getInstance();
$conn = $instance->getConnection();

$nroExpediente = $_POST["nroExp"];

//SQL de creacion de la taba. trae todo lo que tiene ese expediente.
$SQLArmadoTabla = "SELECT listadoexpediente.idListado, listadoexpediente.nroExpediente, proveeores.idEmpresa, proveeores.nombre, proveeores.correo, proveeores.telefono, proveeores.contacto, proveeores.cuit
FROM listadoexpediente
LEFT JOIN proveeores ON listadoexpediente.idEmpresa = proveeores.idEmpresa
WHERE listadoexpediente.nroExpediente = '$nroExpediente'";
$armadoTabla = $instance->ExecuteQuery($SQLArmadoTabla);


while($tabla = mysqli_fetch_assoc($armadoTabla)){ ?>

<tr>
<td align="center"><?php echo $tabla["nombre"]; ?></td>
<td align="center"><?php echo $tabla["correo"]; ?></td>
<td align="center"><?php echo $tabla["telefono"]; ?></td>
<td align="center"><?php echo $tabla["contacto"]; ?></td>
<td align="center" class='botonEliminar' onclick='tuvieja(event)' id="<?php echo $tabla["idEmpresa"]; ?>">DELETE</td>
</tr>
<?php } ?>

