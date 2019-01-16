<?php

session_start();
if (!isset($_SESSION['usuario'])){
echo '  <script type="text/javascript">
                alert("Para acceder a este contenido tiene que estar logueado");
               window.location="index.php"
           </script>';
}

include "../Componentes/header.php";

?>

<!--######################################
########## BUSCADOR DE EMPRESA ###########
#######################################-->

<div style="margin: 3%" id="alerta"></div>
<div style="margin: 3%">
	<form method="GET" id="buscarForm" onsubmit="return validar()" action="empresaAmodif.php">
		<div class="row">
		    <div class="col">
				<select name="selector" class="form-control" id="selector">
				   <option selected value="0"> Buscar por... </option>
				       <option value="1">CUIT</option> 
				       <option value="2">Nombre</option> 
				   </optgroup> 
				</select>
		    </div>
		    <div class="col">
		    	<!-- ESTE BUSCAR DE ABAJO ES EL QUE DETECTA -->
				<input autocomplete="off" type="text" name="buscar" id="buscarEmpresa" class="form-control"><br>
		    </div>
		</div>
		<!-- BOTON ENVIAR -->
		<input type="submit" id="botonEnviar" name="cargar" value="Buscar" class="btn btn-secondary btn-lg btn-block">
	</form>
</div>

<script type="text/javascript">

var box = document.querySelector("#alerta");
var formulario = document.querySelector("#buscarForm");
var selector = document.querySelector("#selector");
var buscador = document.querySelector("#buscarEmpresa");
var botonEnviar = document.querySelector("#botonEnviar");

function validar() {
	if(selector.value == 0) {
		alert("Ingrese una opcion para buscar")
		return false;
	} else {
		return true;
	}
}
	
selector.onchange = function(){
	if(selector.value == 1) {
		buscador.placeholder = "Ingrese Cuit"
	} else if(selector.value == 2) {
		buscador.placeholder = "Ingrese Nombre"
	}
}

botonEnviar.onclick = function(e) {
	if(buscador.value == ""){
		e.preventDefault();	
		alert('Completar datos')
	} else {
		e.preventDefault();
				$.ajax({
					type: 'POST',
					url: '../AJAX/buscarEmpresa.php',
					data: {
						'selector': selector.value,
						'empresa': buscador.value
					},
					success: function(res){
						if(res == "OK") {
							formulario.submit();
						} else {
							document.getElementById("alerta").innerHTML = res;

						}


					}
				})
	}
}

</script>

<?php include "../Componentes/footer.php"; ?>


<!--   	<script type="text/javascript">

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
  	</script> -->

