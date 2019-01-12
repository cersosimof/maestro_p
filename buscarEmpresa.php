<?php 

	require "conexion.php";
	$tag = $_POST["empresa"];
	$selector = $_POST["selector"];

	$selector == 1 ? $selector = 'cuit' : $selector = 'nombre';


	$sql = "SELECT nombre FROM proveeores WHERE $selector LIKE '%$tag%'";
	$cargarProveedor = mysqli_query($link, $sql);

	if(($cantidad = mysqli_num_rows($cargarProveedor)) > 0){
		//SI HAY RESULTADOS
		echo "OK";
	} else { 
		//SI NO HAY RESULTADOS
		echo "<div class='alert alert-danger' role='alert'> NO HAY RESULTADOS</div>";
	}

	
  ?>