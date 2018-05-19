<?php 
include "header.php";
include "conexion.php";

if(isset($_GET["buscarEmpresa"])){
	$tag = $_GET["buscarEmpresa"];

	$SQLTraerProv = "SELECT idEmpresa, nombre, correo, telefono, contacto, ramo, cuit FROM proveeores WHERE nombre LIKE '%$tag%'";
	$QUERYTraerProv = mysqli_query($link, $SQLTraerProv);



	// }	
} 

mysqli_close($link);
 ?>
 	<?php 
		while($proveedores = mysqli_fetch_assoc($QUERYTraerProv)) {
	 ?>

 <h2><?php echo $proveedores["nombre"] ?></h2>
 <ul>	
 	<li>CORREO ELECTRONICO: <?php echo $proveedores["correo"] ?> </li>
 	<li>CONTACTO: <?php echo $proveedores["contacto"] ?> </li>
 	<li>TELEFONO: <?php echo $proveedores["telefono"] ?> </li>
 	<li>RAMO: <?php echo $proveedores["ramo"] ?> </li>
 	<li>CUIT: <?php echo $proveedores["cuit"] ?> </li>

 	<?php 
 }
 	 ?>
 </ul>

 <button>MODIFICAR</button>
 <button>ELIMINAR</button>