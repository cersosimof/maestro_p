<?php 
require "../classConnectionMySQL.php";
$NewConn = new ConnectionMySQL();
$NewConn->CreateConnection();

	$tag = $_POST["empresa"];
	$selector = $_POST["selector"];

	$selector == 1 ? $selector = 'cuit' : $selector = 'nombre';


	$query = "SELECT nombre FROM proveeores WHERE $selector LIKE '%$tag%'";
	$result = $NewConn->ExecuteQuery($query); 

	if(($cantidad = $NewConn->GetCountAffectedRows($result)) > 0){
		//SI HAY RESULTADOS
		echo "OK";
	} else { 
		//SI NO HAY RESULTADOS
		echo "<div class='alert alert-danger' role='alert'> NO HAY RESULTADOS</div>";
	}

	
?>