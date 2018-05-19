<?php
require "conexion.php";

$idListadoABorrar = $_POST["idListado"];

$SQLEliminarEmpresaListado = "DELETE FROM listadoexpediente WHERE idListado = '$idListadoABorrar'";
$borrarEmpresa = mysqli_query($link, $SQLEliminarEmpresaListado);
