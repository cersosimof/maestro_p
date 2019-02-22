<?php 

require "../classConnectionMySQL.php";
$instance = ConnectDb::getInstance();
$conn = $instance->getConnection();

	$tag = $_POST["empresa"];
	$selector = $_POST["selector"];

	$selector == 1 ? $selector = 'cuit' : $selector = 'nombre';


	$query = "SELECT nombre FROM proveeores WHERE $selector LIKE '%$tag%'";
	$result = $instance->ExecuteQuery($query); 

	if(($cantidad = $instance->GetCountAffectedRows($result)) > 0){
		//SI HAY RESULTADOS
		echo "OK";
	} else { 
		//SI NO HAY RESULTADOS
		echo "<div class='alert alert-danger' role='alert'> NO HAY RESULTADOS</div>";
	}

	
?>