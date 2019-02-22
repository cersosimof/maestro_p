<?php

require "../classConnectionMySQL.php";
$instance = ConnectDb::getInstance();
$conn = $instance->getConnection();


$numero = $_POST["numeroExpediente"];

$query = "SELECT * FROM listadoexpediente WHERE nroExpediente = '$numero'";
$buscarExistente = $instance->ExecuteQuery($query);
$modificadas = $instance->GetCountAffectedRows($buscarExistente);


//ejecutar consulta que traiga el ultimo expediente cargado, para recomendar.


if( $modificadas === 0){
  echo 0; //Si no existe el expediente, lo crea
} else {
  echo 1; //si existe el expediente
}

 ?>




















<?php 


// $titulo = $_POST["titulo"];
// $tag = $_POST["ramo"];


//si no encuentra resultados los guarda en la base.
  // $sqlBuscarProveedores = "SELECT idEmpresa, nombre, correo, telefono, contacto FROM proveeores WHERE ramo LIKE '%$tag%'";
  // $cargarProveedor = mysqli_query($link, $sqlBuscarProveedores);
  // $cargarProveedorEnListado = mysqli_query($link, $sqlBuscarProveedores);

  //   while($carga = mysqli_fetch_assoc($cargarProveedorEnListado)){
  //     $empresa = $carga["idEmpresa"];
  //     $SQLCarga = "INSERT INTO `listadoexpediente` (`idListado`, `nroExpediente`, `titulo`, `idEmpresa`) VALUES (NULL, '$numero', '$titulo', '$empresa')";
  //     $SQLCargaP = mysqli_query($link, $SQLCarga);
  //   }
?>
