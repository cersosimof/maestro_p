<?php
require "../classConnectionMySQL.php";
$NewConn = new ConnectionMySQL();
$NewConn->CreateConnection();

$idListadoABorrar = $_POST["aEliminar"];
$listado = $_POST["listado"];

$SQLEliminarEmpresaListado = "DELETE FROM `listadoexpediente` WHERE `nroExpediente` = '$listado' AND `idEmpresa` = '$idListadoABorrar'";
$borrarEmpresa = $NewConn->ExecuteQuery($SQLEliminarEmpresaListado);

echo $borrarEmpresa ;
?>
