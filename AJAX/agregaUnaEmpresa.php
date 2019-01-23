<?php 

require "../classConnectionMySQL.php";
$NewConn = new ConnectionMySQL();
$NewConn->CreateConnection();

$tag = $_POST['nombreEmpresa'];
$nroExp = $_POST['nroExp'];



$sqlBuscaEmpresa = "SELECT nombre, cuit FROM proveeores WHERE nombre LIKE '%$tag%' LIMIT 0,3";
$cargarProveedor = $NewConn->ExecuteQuery($sqlBuscaEmpresa);

    while($empresa = $cargarProveedor->fetch_assoc()){
        echo "<li class='resaltar' onclick='clickAgregar()'>", $empresa["nombre"], " - CUIT: " , $empresa["cuit"],  "</li>";
    }



// echo "<div class='col-md-4 efectoSelect'>", $empresa["nombre"], " CUIT:", $empresa["cuit"], "</div>";


 ?>