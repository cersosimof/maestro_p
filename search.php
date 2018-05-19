<?php 
require "conexion.php";
$tag = $_POST['empresa'];
$sqlBuscarProveedores = "SELECT nombre, cuit FROM proveeores WHERE nombre LIKE '$tag%' LIMIT 0,3";
$cargarProveedor = mysqli_query($link, $sqlBuscarProveedores);
while($empresa = mysqli_fetch_assoc($cargarProveedor)){


echo "<div class='col-md-4 efectoSelect'>", $empresa["nombre"], " CUIT:", $empresa["cuit"], "</div>";
}

 ?>