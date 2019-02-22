<?php

require "../classConnectionMySQL.php";
$instance = ConnectDb::getInstance();
$conn = $instance->getConnection();

$nombreNuevo = $_POST["nombreNuevo"];     
$mailNuevo = $_POST["mailNuevo"];           
$contactoNuevo = $_POST["contactoNuevo"];
$telNuevo = $_POST["telNuevo"];
$ramoNuevo = $_POST["ramoNuevo"];
$cuitNuevo = $_POST["cuitNuevo"]; 

$idEmpresaAActualizar = $_POST["idEmpresaAActualizar"]; //ID DE LA EMPRESA A ACTUALIZAR

// // // // // // // // GUARDA LOS VALORES NUEVOS // // // // // // // // 

    $SQLTraerDatos = "SELECT idEmpresa, nombre, correo as mail, contacto,  telefono as tel, ramo, cuit FROM proveeores WHERE idEmpresa = '$idEmpresaAActualizar'";
    $result = $instance->ExecuteQuery($SQLTraerDatos);
    $datosDB = $result->fetch_assoc();

actualizarValores($datosDB["nombre"], $nombreNuevo, $idEmpresaAActualizar, "nombre");
actualizarValores($datosDB["mail"], $mailNuevo, $idEmpresaAActualizar, "correo");
actualizarValores($datosDB["contacto"], $contactoNuevo, $idEmpresaAActualizar, "contacto");
actualizarValores($datosDB["tel"], $telNuevo, $idEmpresaAActualizar, "telefono");
actualizarValores($datosDB["ramo"], $ramoNuevo, $idEmpresaAActualizar, "ramo");
actualizarValores($datosDB["cuit"], $cuitNuevo, $idEmpresaAActualizar, "cuit");

function actualizarValores($valorAntiguo, $valorNuevo, $idEmpresaAActualizar, $columnaDB){
  global $instance; //Palabra clave global, permite usar la variable de afuera de la funcion.

  if ($valorAntiguo !== $valorNuevo) {
    $SQLmodificar =  "UPDATE proveeores SET $columnaDB = '$valorNuevo' WHERE idEmpresa = $idEmpresaAActualizar" ;
    $result2 = $instance->ExecuteQuery($SQLmodificar);;
    echo '1';
  } 
}

?>
