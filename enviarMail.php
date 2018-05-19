<?php
require "conexion.php";

$nroExp = $_POST["nroExpedienteMail"];

$SQLmail = "SELECT listadoexpediente.nroExpediente, proveeores.correo
FROM listadoexpediente
LEFT JOIN proveeores ON listadoexpediente.idEmpresa = proveeores.idEmpresa
WHERE nroExpediente = '$nroExp'";
$generarMail = mysqli_query($link, $SQLmail);


	while($listado = mysqli_fetch_assoc($generarMail)){
		echo $listado["correo"]; echo ";";
	}




