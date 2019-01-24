<?php 

require "../classConnectionMySQL.php";
$NewConn = new ConnectionMySQL();
$NewConn->CreateConnection();

$tag = $_POST['nombreEmpresa'];
$nroExp = $_POST['nroExp'];



$sqlBuscaEmpresa = "SELECT idEmpresa, nombre, cuit FROM proveeores WHERE nombre LIKE '%$tag%' LIMIT 0,3";
$cargarProveedor = $NewConn->ExecuteQuery($sqlBuscaEmpresa);

    while($empresa = $cargarProveedor->fetch_assoc()){
        echo "<li id=",$empresa["idEmpresa"]," class='resaltar clickAgregar'>", $empresa["nombre"], " - CUIT: " , $empresa["cuit"],  "</li>";
    }


 ?>