<?php 

	include "../Componentes/header.php";
	require "../conexion.php";

	$tag = $_GET["buscar"];
	$selector = $_GET["selector"];
	$selector == 1 ? $selector = 'cuit' : $selector = 'nombre';

	$sql = "SELECT idEmpresa, nombre, correo, telefono, ramo, cuit, contacto FROM proveeores WHERE $selector LIKE '%$tag%'";
	$cargarProveedor = mysqli_query($link, $sql);
	$datosEmpresa = mysqli_fetch_assoc($cargarProveedor);

 ?>

	<form style="margin: 3%">
		<!-- 	<div class="row" id="mylist">	</div>	 -->
		<div class="form-group">
			<label for="idNombre">Nombre:</label>
			<input type="text" name="nombre" class="form-control" value="<?php echo $datosEmpresa["nombre"]; ?>" id="idNombre">
		</div>
		<div class="form-group">
			<label for="idMail">Correo Electronico:</label>
			<input type="text" name="correo" class="form-control" value="<?php echo $datosEmpresa["correo"]; ?>" id="idMail">
		</div>
		<div class="form-group">
			<label for="idContacto">Contacto:</label>
			<input type="text" name="contacto" class="form-control" value="<?php echo $datosEmpresa["contacto"]; ?>" id="idContacto">
		</div>
		<div class="form-group">
			<label for="idTel">Telefono:</label>
			<input type="text" name="telefono" class="form-control" value="<?php echo $datosEmpresa["telefono"]; ?>" id="idTel">
		</div>
		<div class="form-group">
			<label for="idRamo">Ramo que vende:</label>
			<input type="text" name="ramo" class="form-control" value="<?php echo $datosEmpresa["ramo"]; ?>" id="idRamo">
		</div>
		<div class="form-group">
			<label for="idCuit">Cuit:</label>
			<input type="text" name="cuit" class="form-control" value="<?php echo $datosEmpresa["cuit"]; ?>"id="idCuit">
		</div>
		<input type="hidden" name="idEmpresa" value="<?php echo $datosEmpresa["idEmpresa"] ?>" id="idEmpresaAActualizar">
		<button id="botonUpdate" name="button" class="btn btn-primary btn-lg btn-block">Actualizar Empresa</button>
	</form>


<script type="text/javascript">

document.querySelector("#botonUpdate").onclick = function(e){
	e.preventDefault();

		var nombreNuevo = document.getElementById("idNombre").value
		var mailNuevo = document.getElementById("idMail").value
		var contactoNuevo = document.getElementById("idContacto").value
		var telNuevo = document.getElementById("idTel").value
		var ramoNuevo = document.getElementById("idRamo").value
		var cuitNuevo = document.getElementById("idCuit").value
		var idEmpresaAActualizar = document.getElementById("idEmpresaAActualizar").value

		$.ajax({
			type: 'POST',
			url: '../AJAX/actualizarAJAX.php',
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
				console.log(res)
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

</script>


<?php include "../Componentes/footer.php"; ?>