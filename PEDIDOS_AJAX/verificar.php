<?php
require "conexion.php";

$numero = $_POST["numeroExpediente"];
$tag = $_POST["ramo"];


$SQLbuscarExistente = "SELECT * FROM listadoexpediente WHERE nroExpediente = '$numero'";
$buscarExistente = mysqli_query($link, $SQLbuscarExistente);

$modificadas = mysqli_num_rows($buscarExistente);


if( $modificadas === 0){


  //si no encuentra resultados los guarda en la base.
  $sqlBuscarProveedores = "SELECT idEmpresa, nombre, correo, telefono, contacto FROM proveeores WHERE ramo LIKE '%$tag%'";
  $cargarProveedor = mysqli_query($link, $sqlBuscarProveedores);
  $cargarProveedorEnListado = mysqli_query($link, $sqlBuscarProveedores);

    while($carga = mysqli_fetch_assoc($cargarProveedorEnListado)){
      $empresa = $carga["idEmpresa"];
      $SQLCarga = "INSERT INTO `listadoexpediente` (`idListado`, `nroExpediente`, `idEmpresa`) VALUES (NULL, '$numero', '$empresa')";
      $SQLCargaP = mysqli_query($link, $SQLCarga);
    }

    echo 0; //Si no existe el expediente, lo crea

} else {
  echo 1; //si existe el expediente
}

 ?>
