<?php
require "../classConnectionMySQL.php";
$NewConn = new ConnectionMySQL();
$NewConn->CreateConnection();

$numero = $_POST["numeroExpediente"];
// $titulo = $_POST["titulo"];
// $tag = $_POST["ramo"];


$query = "SELECT * FROM listadoexpediente WHERE nroExpediente = '$numero'";
$buscarExistente = $NewConn->ExecuteQuery($query);

$modificadas = $NewConn->GetCountAffectedRows($buscarExistente);


if( $modificadas === 0){

  //si no encuentra resultados los guarda en la base.
  // $sqlBuscarProveedores = "SELECT idEmpresa, nombre, correo, telefono, contacto FROM proveeores WHERE ramo LIKE '%$tag%'";
  // $cargarProveedor = mysqli_query($link, $sqlBuscarProveedores);
  // $cargarProveedorEnListado = mysqli_query($link, $sqlBuscarProveedores);

  //   while($carga = mysqli_fetch_assoc($cargarProveedorEnListado)){
  //     $empresa = $carga["idEmpresa"];
  //     $SQLCarga = "INSERT INTO `listadoexpediente` (`idListado`, `nroExpediente`, `titulo`, `idEmpresa`) VALUES (NULL, '$numero', '$titulo', '$empresa')";
  //     $SQLCargaP = mysqli_query($link, $SQLCarga);
  //   }

    echo 0; //Si no existe el expediente, lo crea

} else {
  echo 1; //si existe el expediente
}

 ?>
