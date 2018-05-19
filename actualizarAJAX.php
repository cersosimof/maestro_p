<?php

require "conexion.php";

$nombreNuevo = $_POST["nombreNuevo"];
$mailNuevo = $_POST["mailNuevo"];
$contactoNuevo = $_POST["contactoNuevo"];
$telNuevo = $_POST["telNuevo"];
$ramoNuevo = $_POST["ramoNuevo"];
$cuitNuevo = $_POST["cuitNuevo"];
$idEmpresaAActualizar = $_POST["idEmpresaAActualizar"];

    $SQLTraerDatos = "SELECT idEmpresa, nombre, correo as mail, contacto,  telefono as tel, ramo, cuit FROM proveeores WHERE idEmpresa = '$idEmpresaAActualizar'";
    $ejecutarSQL = mysqli_query( $link , $SQLTraerDatos);
    $datosDB = mysqli_fetch_assoc($ejecutarSQL);

actualizarValores($datosDB["nombre"], $nombreNuevo, $idEmpresaAActualizar, "nombre");
actualizarValores($datosDB["mail"], $mailNuevo, $idEmpresaAActualizar, "correo");
actualizarValores($datosDB["contacto"], $contactoNuevo, $idEmpresaAActualizar, "contacto");
actualizarValores($datosDB["tel"], $telNuevo, $idEmpresaAActualizar, "telefono");
actualizarValores($datosDB["ramo"], $ramoNuevo, $idEmpresaAActualizar, "ramo");
actualizarValores($datosDB["cuit"], $cuitNuevo, $idEmpresaAActualizar, "cuit");

function actualizarValores($valorAntiguo, $valorNuevo, $idEmpresaAActualizar, $columnaDB){
  global $link;
//    $modificados = array();
  if ($valorAntiguo !== $valorNuevo) {
    $SQLmodificar =  "UPDATE proveeores SET $columnaDB = '$valorNuevo' WHERE idEmpresa = $idEmpresaAActualizar" ;
    $guardarNuevo = mysqli_query( $link , $SQLmodificar);
    echo '1';
  } 
//    array_push($modificados, $columnaDB);
//    $countModificados = count($modificados);
  }
 ?>
