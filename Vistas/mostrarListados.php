<?php
include "../Componentes/comprobarSesion.php";
include "../Componentes/header.php";
require "../classConnectionMySQL.php";
$instance = ConnectDb::getInstance();
$conn = $instance->getConnection();

// QUERY PARA TRAER LOS EXPEDIENTES CREADOS.
$sql = "SELECT idListado, nroExpediente, titulo FROM listadoexpediente GROUP BY nroExpediente";
$resultado = $instance->ExecuteQuery($sql);



?>


<div class="container">
<h2>Seleccione un Expediente de la Lista.</h2>
<hr>

<table 	class=" table text-center">
			<thead class="thead-dark">
				<tr>
					<th>Numero</th>
					<th>Nombre</th>
				</tr>
			</thead>
			<tbody id="mytable">
            <?php
                while($expedientes = $resultado->fetch_assoc()){
            ?>      <tr onclick="abrirExpediente(this)" id="<?php echo $expedientes["idListado"]; ?>" class="resaltar">
                        <td align="center"><?php echo $expedientes["nroExpediente"]; ?></td>
                        <td align="center"><?php echo $expedientes["titulo"]; ?></td>
                    </tr>
            <?php
                }
            ?>
			</tbody>
			<input type="hidden" id="titulo" value="<?php echo $titulo; ?>">
			<input type="hidden" id="nroExpedienteMail" value="<?php echo $nroExpediente; ?>">

		</table>
</div>

<div id="prueba">

</div>



<?php 
include "../Componentes/footer.php";
 ?>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 <script>
 
 function abrirExpediente(obj) {
    // $("#exampleModal").modal("show")
    document.querySelector("#prueba").innerHTML = 
'<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">' +
'<div class="modal-dialog" role="document">' +
'<div class="modal-content">' +
'<div class="modal-body"> ... </div>' +
'<div class="modal-footer">' +
'<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>' +
'<button type="button" class="btn btn-primary">Save changes</button>' +
'</div>' +
'</div>' +
'</div>' +
'</div>'

$("#exampleModal").modal("show")
 }
 


 </script>