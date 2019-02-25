<?php 

require "../classConnectionMySQL.php";
$instance = ConnectDb::getInstance();
$conn = $instance->getConnection();

$que = $_POST['clave'];
$donde = $_POST['donde'];

if($donde == 'cuit') {
    $sqlQuery = "SELECT cuit FROM `proveeores` WHERE cuit LIKE '%$que%' LIMIT 0,5";
    $resultadoCuit = $instance->ExecuteQuery($sqlQuery);

    while($resultados = $resultadoCuit->fetch_assoc()){ 
    echo "<li onclick='getText(this)' class='resaltar clickAgregar'>" , $resultados["cuit"] , "</li>";
    }
} else {
    $sqlQuery = "SELECT nombre FROM `proveeores` WHERE nombre LIKE '%$que%' LIMIT 0,5";
    $resultadoNombre = $instance->ExecuteQuery($sqlQuery);

    while($resultados = $resultadoNombre->fetch_assoc()){ 
    echo "<li onclick='getText(this)' class='resaltar clickAgregar'>" , $resultados["nombre"] , "</li>";
    }
}


 ?>