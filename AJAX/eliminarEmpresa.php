<?php
require "../classConnectionMySQL.php";
$instance = ConnectDb::getInstance();
$conn = $instance->getConnection();

$idListadoABorrar = $_POST["aEliminar"];
$listado = $_POST["listado"];

$SQLEliminarEmpresaListado = "DELETE FROM `listadoexpediente` WHERE `nroExpediente` = '$listado' AND `idEmpresa` = '$idListadoABorrar'";
$borrarEmpresa = $instance->ExecuteQuery($SQLEliminarEmpresaListado);

$resultado = $instance->GetCountAffectedRows($borrarEmpresa);

if($resultado == 1){
    echo 'La empresa se borro del listado ', $listado, ' correctamente';
} else {
    echo 'Se produjo un error, la empresa contunua en el listado';
}

?>
