<?php

include "../classConnectionMySQL.php";
$instance = ConnectDb::getInstance();
$conn = $instance->getConnection();

	$nombre = $_POST["nombre"];
	$cuit = $_POST["cuit"];
	$correo = $_POST["correo"];
	$telefono = $_POST["telefono"];
	$contacto = $_POST["contacto"];
	$ramo = $_POST["ramo"];
    $pass = md5($_POST["pass"]);

    echo $nombre;
    echo $cuit;
    echo $correo;
    echo $telefono;
    echo $contacto;
    echo $ramo;
    echo $pass;

    $query = "INSERT INTO proveeores (nombre, correo, telefono, contacto, ramo, cuit, pass, participo, cotizo) VALUES ('$nombre', '$correo', '$telefono', '$contacto', '$ramo', '$cuit', '$pass', 0, 0)";
    $result = $instance->ExecuteQuery($query); 

            if($result) {
                //enviar el alert, y luego envia al inicio
                echo "<script>alert('El proveedor ", $nombre, " fue cargado correctamente, el mismo trabaja con los ramos ", $ramo,", se redirigira al inicio.'); window.location.href = 'principal.php'</script>"; 
            } else {
                echo "<script>alert('Error!!! Intente nuevamente')</script>";
            }
