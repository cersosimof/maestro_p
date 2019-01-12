<?php
require "../conexion.php";

$numero = $_POST["numero"];
$titulo = $_POST["titulo"];
$ramos = $_POST["ramos"];

$queryBuscar = "SELECT idEmpresa FROM `proveeores` WHERE ramo LIKE '%$ramos%'";
$empresasDelRamo = mysqli_query($link, $queryBuscar);
    while($idEmpresa = mysqli_fetch_assoc($empresasDelRamo)){
        $empresa = $idEmpresa['idEmpresa'];
        $SQLCarga = "INSERT INTO listadoexpediente (idListado, nroExpediente, titulo, idEmpresa) VALUES (NULL, '$numero', '$titulo', '$empresa')";
        $SQLCargaP = mysqli_query($link, $SQLCarga);
    }
//ver como hacer el verificar   
echo '1'

 ?>




