<?php

session_start();
if (!isset($_SESSION['usuario'])){
echo '  <script type="text/javascript">
                alert("Para acceder a este contenido tiene que estar logueado");
               window.location="index.php"
           </script>';
}

	include "header.php";
	include "conexion.php";

if (isset($_GET["cargado"])) {
	$nombre = $_POST["nombre"];
	$correo = $_POST["correo"];
	$contacto = $_POST["contacto"];
	$telefono = $_POST["telefono"];
	$ramo = $_POST["ramo"];
	$cuit = $_POST["cuit"];

$sqlCargarProveedores = "INSERT INTO proveeores (nombre, correo, telefono, contacto, ramo, cuit) VALUES ('$nombre', '$correo', '$telefono', '$contacto', '$ramo', '$cuit')";
$cargarProveedor = mysqli_query($link, $sqlCargarProveedores);

$validacion = mysqli_affected_rows($link);
	if ($validacion > 0) {
		echo "<script>alert('el proveedor ", $nombre, " fue cargado correctamente, el mismo trabaja con los ramos ", $ramo,"')</script>";
	}
}
?>
<!--FORM DE INGRESO EMPRESA -->
<form  action="agregarEmpresa.php?cargado=1" method="POST">
	<div class="form-group">
		<label for="idNombre">Nombre:</label>
		<input type="text" name="nombre" class="form-control" id="idNombre">
	</div>
	<div class="form-group">
		<label for="idCorreo">Correo Electronico:</label>
		<input type="text" name="correo" placeholder="Donde recibira los PDC" class="form-control" id="idCorreo">
	</div>
	<div class="form-group">
		<label for="idContacto">Contacto:</label>
		<input type="text" name="contacto" placeholder="Vendedor, o persona de contacto" class="form-control" id="idContacto">
	</div>
	<div class="form-group">
		<label for="idTel">Telefono:</label>
		<input type="text" name="telefono" class="form-control" id="idTel">
	</div>
	<div class="form-group">
		<label for="irRamo">Ramo que vende:</label>
		<input type="text" name="ramo" class="form-control" placeholder="Libreria, informatica, formularios..."id="idRamo">
	</div>
	<div class="form-group">
		<label for="idCuit">Cuit:</label>
		<input type="text" name="cuit" placeholder="XXXXXXXXXXXX" class="form-control" id="idCuit">
	</div>
		<input type="submit" name="Cargar" value="Cargar Proveedor"class="btn btn-primary">
</form>

<?php
include "footer.php"
?>
