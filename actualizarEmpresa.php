<?php
include "header.php";
require "conexion.php";

	if(isset($_GET["buscar"])){
		$tag = $_GET["buscar"];
			$sqlBuscarProveedores = "SELECT idEmpresa, nombre, correo, telefono, ramo, cuit, contacto FROM proveeores WHERE nombre LIKE '%$tag%'";
			$cargarProveedor = mysqli_query($link, $sqlBuscarProveedores);
			$empresa = mysqli_fetch_assoc($cargarProveedor);
	}

	if(isset($_GET["actualizar"])){
		$idUpdate = $_GET["actualizar"];
		$sqlactualizarEmpresa = "DELETE FROM proveeores WHERE idEmpresa = '$id'";
		$eliminarEmpresa = mysqli_query($link, $sqlEliminarEmpresa);
			if (mysqli_affected_rows($link) >= 1) {
				echo "Empresa ", $id, " eliminada";
			} else {
				echo "no paso nada";
			}
	}

mysqli_close($link);

?>

	<!--######################################
	########## BUSCADOR DE EMPRESA ###########
	#######################################-->
<?php
if (!isset($_GET["buscar"])) { ?>
	<form method="GET" onkeypress="autocompletar()" id="buscarForm">
			<label for="buscarEmpresa">Indique la empresa con la que desa trabajar de las sugerencias:</label>
				<input autocomplete="off" type="text" name="buscar" id="buscarEmpresa" class="form-control" ><br>
<?php } ?>

	<!--######################################
	######## MODIFICADOR DE PROVEEDOR ########
	#######################################-->

	<form >
	<div class="row" id="mylist">	</div>

<?php if (isset($_GET["buscar"])) { ?>

		<div class="form-group">
			<label for="idNombre">Nombre:</label>
			<input type="text" name="nombre" class="form-control" value="<?php echo $empresa["nombre"]; ?>" id="idNombre">
		</div>
		<div class="form-group">
			<label for="idMail">Correo Electronico:</label>
			<input type="text" name="correo" class="form-control" value="<?php echo $empresa["correo"]; ?>" id="idMail">
		</div>
		<div class="form-group">
			<label for="idContacto">Contacto:</label>
			<input type="text" name="contacto" class="form-control" value="<?php echo $empresa["contacto"]; ?>" id="idContacto">
		</div>
		<div class="form-group">
			<label for="idTel">Telefono:</label>
			<input type="text" name="telefono" class="form-control" value="<?php echo $empresa["telefono"]; ?>" id="idTel">
		</div>
		<div class="form-group">
			<label for="idRamo">Ramo que vende:</label>
			<input type="text" name="ramo" class="form-control" value="<?php echo $empresa["ramo"]; ?>" id="idRamo">
		</div>
		<div class="form-group">
			<label for="idCuit">Cuit:</label>
			<input type="text" name="cuit" class="form-control" value="<?php echo $empresa["cuit"]; ?>"id="idCuit">
		</div>
		<input type="hidden" name="idEmpresa" value="<?php echo $empresa["idEmpresa"] ?>" id="idEmpresaAActualizar">
	</form>

	<button onclick="actualizarEmpresa()" name="button" class="btn btn-primary">Actualizar Empresa</button>
	<button onclick="borrarEmpresa()" class="btn btn-danger">Eliminar Empresa</button>

<?php } ?>

	<!--######################################
	##### BUSCADOR DE EMPRESA A ELIMINAR #####
	#######################################-->

  	<script type="text/javascript">

		function	actualizarEmpresa(){
			var nombreNuevo = document.getElementById("idNombre").value
			var mailNuevo = document.getElementById("idMail").value
			var contactoNuevo = document.getElementById("idContacto").value
			var telNuevo = document.getElementById("idTel").value
			var ramoNuevo = document.getElementById("idRamo").value
			var cuitNuevo = document.getElementById("idCuit").value
			var idEmpresaAActualizar = document.getElementById("idEmpresaAActualizar").value

				$.ajax({
					type: 'POST',
					url: 'actualizarAJAX.php',
					data: {
									'nombreNuevo': nombreNuevo,
									'mailNuevo': mailNuevo,
									'contactoNuevo': contactoNuevo,
									'telNuevo': telNuevo,
									'ramoNuevo': ramoNuevo,
									'cuitNuevo': cuitNuevo,
									'idEmpresaAActualizar': idEmpresaAActualizar,
					},
					success: function(res){
						if (res == 1) {
							alert("Los nuevos datos ingresados en la empresa se actualizaron correctamente");
							  top.location.href = "principal.php"
						} else {
							if(confirm("No modificaste ningun dato. ¿Deseas volver al menu principal?")){
								 top.location.href = "principal.php"
							}
						}
					}
				})
		}

		function borrarEmpresa() {
			var empresaAEliminar = document.getElementById("idNombre").value
				if(confirm('Desea eliminar la empresa ' + empresaAEliminar + '?')){
				$.ajax({
					type: 'POST',
					url: 'eliminarEmpresa2.php',
					data:{'empresaAEliminar': empresaAEliminar },
						success: function(response){
							console.log(response)
						}
				})
			} else {
				alert('La empresa continua en el sistema')
			}
		}

		function autocompletar(){
			var ramoEmpresaBuscada = document.getElementById("buscarEmpresa").value;
				$.ajax({
					type: 'POST',
					url: 'search.php',
					data:{'empresa': ramoEmpresaBuscada},
						success: function(response){
						console.log("apretasteeee");
						$('#mylist').html(response);
							$(".efectoSelect").click(function (){
								var select = $(this)["0"].innerHTML
								var myJSON = JSON.stringify(select);
								var splitEmpresa = select.split(" ");
								var empresaNombre = splitEmpresa["0"];
								$("#buscarEmpresa").val(empresaNombre);
								document.getElementById("buscarForm").submit();
							})
						}
				})
		}
  	</script>

<?php include "footer.php"; ?>
