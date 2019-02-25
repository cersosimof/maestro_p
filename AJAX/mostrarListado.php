<?php 

require "../classConnectionMySQL.php";
$instance = ConnectDb::getInstance();
$conn = $instance->getConnection();
$nroExpediente = $_POST['exp'];

$sql = "SELECT listadoexpediente.nroExpediente, listadoexpediente.titulo, listadoexpediente.idEmpresa, proveeores.idEmpresa, proveeores.nombre, proveeores.correo, proveeores.telefono, proveeores.cuit 
FROM listadoexpediente 
LEFT JOIN proveeores ON listadoexpediente.idEmpresa = proveeores.idEmpresa 
WHERE listadoexpediente.nroExpediente = '$nroExpediente'";

$listadoEmpresas = $instance->ExecuteQuery($sql); ?>

<div class="modal fade" id="momodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Numero de Expediente <?php echo $nroExpediente; ?></h5>
            </div>
        <div class="modal-body">
        <table 	class=" table text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Telefono</th>
                            <th>Cuit</th>
                        </tr>
                    </thead>
                <?php
                while($empresa = $listadoEmpresas->fetch_assoc()){   
                ?>
                <tr>
                    <td align="center"><?php echo $empresa["nombre"]; ?></td>
                    <td align="center"><?php echo $empresa["correo"]; ?></td>
                    <td align="center"><?php echo $empresa["telefono"]; ?></td>
                    <td align="center"><?php echo $empresa["cuit"]; ?></td>
                </tr>
                <?php
                }
                ?>
        <table>
        </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
