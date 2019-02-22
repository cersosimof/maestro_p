<?php

include "../Componentes/comprobarSesion.php";
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
		buscador.placeholder = "Ingresar Cuit"
	} else if(selector.value == 2) {
		buscador.placeholder = "Ingresar Nombre"
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

<?php 
	include "../Componentes/footer.php";
 ?>


