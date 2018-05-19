<?php
require "conexion.php";

$numero = $_POST["numeroExpediente"];
$tag = $_POST["ramo"];

$SQLbuscarExistente = "SELECT * FROM `listadoexpediente` WHERE nroExpediente = '$numero'";
$buscarExistente = mysqli_query($link, $SQLbuscarExistente);

if(mysqli_num_rows($buscarExistente) == 0){
  // si no encuentra resultados los guarda en la base.
  $sqlBuscarProveedores = "SELECT idEmpresa, nombre, correo, telefono, contacto FROM proveeores WHERE ramo LIKE '%$tag%'";
  $cargarProveedor = mysqli_query($link, $sqlBuscarProveedores);
  $cargarProveedorEnListado = mysqli_query($link, $sqlBuscarProveedores);

    while($carga = mysqli_fetch_assoc($cargarProveedorEnListado)){
      $empresa = $carga["idEmpresa"];
      $SQLCarga = "INSERT INTO `listadoexpediente` (`idListado`, `nroExpediente`, `idEmpresa`) VALUES (NULL, '$numero', '$empresa')";
      $SQLCargaP = mysqli_query($link, $SQLCarga);
    }

} else {
  // si encuentra resultados.
  return 1;
}
 ?>
