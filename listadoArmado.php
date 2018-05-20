<?php

include "header.php";
require "conexion.php";

$nroExpediente = $_GET["nroExpediente"];

//SQL de creacion de la taba. trae todo lo que tiene ese expediente.
$SQLArmadoTabla = "SELECT listadoexpediente.idListado, listadoexpediente.nroExpediente, proveeores.idEmpresa, proveeores.nombre, proveeores.correo, proveeores.telefono, proveeores.contacto, proveeores.cuit
FROM listadoexpediente
LEFT JOIN proveeores ON listadoexpediente.idEmpresa = proveeores.idEmpresa
WHERE listadoexpediente.nroExpediente = '$nroExpediente'";
$armadoTabla = mysqli_query($link, $SQLArmadoTabla);

//SQL de eliminacion de linea.
if(isset($_GET["borrar"])){
		$eliminado = $_GET["borrar"];
		$SQLEliminar = "DELETE FROM listadoexpediente WHERE idListado = $eliminado";
		$resultado_eliminar = mysqli_query($link, $SQLEliminar);
}

mysqli_close($link);
?>


<h2> Nro. Expediente <b> <?php echo $nroExpediente;  ?> </b> - Empresas a invitar:</h2>

	<table 	class="table table-bordered">
		<thead>
			<tr>
	    		<th>Razon Social</th>
			    <th>Correo Electronico</th>
			    <th>Telefono</th>
			    <th>Contacto</th>
			    <th>OPCION</th>
	 		</tr>
	 	</thead>
	 	<tbody id="mytable">
	 		<tr>
				<?php
				while($tabla = mysqli_fetch_assoc($armadoTabla)){ ?>
			    <td align="center"><?php echo $tabla["nombre"]; ?></td>
			    <td align="center"><?php echo $tabla["correo"]; ?></td>
			    <td align="center"><?php echo $tabla["telefono"]; ?></td>
			    <td align="center"><?php echo $tabla["contacto"]; ?></td>
			    <td align="center">
						<span class="botonEliminar glyphicon glyphicon-trash" aria-hidden="true"></span>
					</td>

	  		</tr>
				<input type="hidden" id="idListado" value="<?php echo $tabla['idListado']; ?>">
				<input type="hidden" id="nroExpedienteMail" value="<?php echo $nroExpediente; ?>">
	  		<?php } ?>
	  	</tbody>
	</table>

	<!--###################################
	######## AGREGAR OTRA EMPRESA #########
	####################################-->

	<form action="#" method="POST" onkeypress="sugerencia()" id="submitAgregar">
		<label>AGREGAR:
			<input type="text" id="nombreEmpresa" placeholder="Nombre de la empresa"><br>
		</label>
			<input type="button" value="Agregar" onClick="agregarEmpresa()" id="botonAgregar">
			<input type="hidden" id="nroExp" name="nroExpediente" value="<?php echo $nroExpediente; ?>">
	</form><br>

	<ul id="listaSug">

	</ul>
	<div id="botonEnviarMail">
		<button onclick="enviarMails()">GENERAR</button>
	</div>




	<!--###################################
	################# SCRIPT ##############
	####################################-->

<script type="text/javascript" src="JS/jquery.js"></script>
<script type="text/javascript">

$(document).ready(function() {
	// Cuando la página se carge completamente actualizamos los eventos para editar/añadir/borrar filas en la tabla Datos
	borrarLinea();
});

function enviarMails(){
			var NEM = document.getElementById("nroExpedienteMail").value;
			$.ajax({
				type: 'POST',
				url: 'enviarMail.php',
				data: {'nroExpedienteMail': NEM},
					success: function(data){
					location.href = "mailto:?subject= Nro. Exp." + NEM + "&bcc="+data+"";
					}
			})
}

function borrarLinea(){
	$(".botonEliminar").click(function(){
		if(confirm("Desea eliminar esta empresa?")){
		$(this).parent("td").parent("tr").remove("tr");
		var idListado = document.getElementById("idListado").value;
			$.ajax({
				type: 'POST',
				url: 'eliminarEmpresa.php',
				data: {'idListado': idListado},
					success: function(data){
					}
			})
		};
	})
}

// Busca y agrega la linea.
function agregarEmpresa(){
  var nombreEmpresaBuscada = document.getElementById("nombreEmpresa").value;
  var nroExp = document.getElementById("nroExp").value;
    $.ajax({
      type: 'POST',
      url: 'solicitud.php',
      data:{'nombreEmpresa': nombreEmpresaBuscada, 'nroExp': nroExp},
        success: function(response){
        $('#mytable').append(response).ready(borrarLinea());

        }
    })
  }

// Muestra las sugerencias de empresas con ese nombre.
function sugerencia(){
	var nombreEmpresaBuscada2 = document.getElementById("nombreEmpresa").value;
	var nroExp2 = document.getElementById("nroExp").value;
		$.ajax({
		//buscar en la base de datos, la cantidad de letras ingresada en NOMBRE DE EMPRESA
			type: 'POST',
			url: 'search2.php',
			data:{'empresa2': nombreEmpresaBuscada2, 'nroExp': nroExp2},
				success: function(response){
				// imprime las alternativas en pantalla
				$('#listaSug').html(response);
					$('li').click(function(){
							var select = $(this)["0"].innerHTML
							var myJSON = JSON.stringify(select);
							var splitEmpresa = select.split(" ");
							var empresaNombre = splitEmpresa["0"];
							document.getElementById("nombreEmpresa").value = empresaNombre;
					})
				}
		})
}
  	</script>

<?php
include "footer.php";
?>
