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


    $query = "INSERT INTO proveeores (nombre, correo, telefono, contacto, ramo, cuit, pass, participo, cotizo) VALUES ('$nombre', '$correo', '$telefono', '$contacto', '$ramo', '$cuit', '$pass', 0, 0)";
    $result = $instance->ExecuteQuery($query); 

            if($result) {            ?>    
                <div id="modalMensaje" class="modal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Mensaje</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>El Proveedor se cargo correctamente.</p>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                    </div>
                    </div>
                </div> <?php
            } else { ?>

 <div id="modalMensaje" class="modal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Mensaje</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>El Proveedor se cargo correctamente.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="irAInicio()" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                    </div>
                    </div> 


                    <?php
            }
?>
     
