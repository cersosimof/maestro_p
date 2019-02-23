<?php
require "../classConnectionMySQL.php";
$instance = ConnectDb::getInstance();
$conn = $instance->getConnection();

$numero = $_POST["numero"];
$titulo = $_POST["titulo"];
$ramos = $_POST["ramos"];

$queryBuscar = "SELECT idEmpresa FROM `proveeores` WHERE ramo LIKE '%$ramos%'";
$result = $instance->ExecuteQuery($queryBuscar);

    while($idEmpresa = $result->fetch_assoc()){
        $empresa = $idEmpresa['idEmpresa'];
        $sqlCarga = "INSERT INTO listadoexpediente (idListado, nroExpediente, titulo, idEmpresa) VALUES (NULL, '$numero', '$titulo', '$empresa')";
        $result2 = $instance->ExecuteQuery($sqlCarga);
    }
//ver como hacer el verificar   
echo '1'

 ?>




