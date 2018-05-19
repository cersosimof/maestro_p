<?php 
require "conexion.php";
$empresaNombre = $_POST['empresa2'];
$nroExp = $_POST['nroExp']

$sqlAgregarEmpresa = "INSERT INTO `listadoexpediente` (`idListado`, `nroExpediente`, `idEmpresa`) VALUES (NULL, '$nroExp', '$empresaNombre');";
$cargarProveedor = mysqli_query($link, $sqlAgregarProveedor);

}

 ?>

 <div>
 	<?php echo alert("proveedor Agregado"); ?>
 </div>