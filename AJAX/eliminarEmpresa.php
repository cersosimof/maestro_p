<?php
require "../classConnectionMySQL.php";
$NewConn = new ConnectionMySQL();
$NewConn->CreateConnection();

$idListadoABorrar = $_POST["aEliminar"];
$listado = $_POST["listado"];

$SQLEliminarEmpresaListado = "DELETE FROM `listadoexpediente` WHERE `nroExpediente` = '$listado' AND `idEmpresa` = '$idListadoABorrar'";
$borrarEmpresa = $NewConn->ExecuteQuery($SQLEliminarEmpresaListado);

$resultado = $NewConn->GetCountAffectedRows($borrarEmpresa);

if($resultado == 1){
    echo 'La empresa se borro del listado ', $listado, ' correctamente';
} else {
    echo 'Se produjo un error, la empresa contunua en el listado';
}

?>
