<?php

include "../Componentes/comprobarSesion.php";
include "../Componentes/header.php";

?>

<!--######################################
########## BUSCADOR DE EMPRESA ###########
#######################################-->

<!-- ## VIEJO ## -->
<!-- <div style="margin: 3%" id="alerta"></div>
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
		    <div class="col"> -->
		    	<!-- ESTE BUSCAR DE ABAJO ES EL QUE DETECTA -->
				<!-- <input autocomplete="off" type="text" name="buscar" id="buscarEmpresa" class="form-control"><br>
		    </div>
		</div> -->
		<!-- BOTON ENVIAR -->
		<!-- <input type="submit" id="botonEnviar" name="cargar" value="Buscar" class="btn btn-secondary btn-lg btn-block">
	</form>
</div> -->
<!-- ## VIEJO ## -->

<!-- ## NUEVO ## -->
<form method="GET" id="buscarForm" onsubmit="return validar()" action="empresaAmodif.php">

  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Clave</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="buscarEmpresa" placeholder="">
    </div>
  </div>

  <fieldset id="fichaSelect" class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Seleccionar</legend>
      <div class="col-sm-10">

        <div class="form-check">
          <input class="form-check-input" type="radio" name="checkForm" id="gridCuit" value="cuit" checked>
          <label class="form-check-label" for="gridCuit"> Cuit </label>
        </div>

        <div class="form-check">
          <input class="form-check-input" type="radio" name="checkForm" id="gridNombre" value="nombre">
          <label class="form-check-label" for="gridNombre"> Nombre </label>
        </div>

      </div>
    </div>
  </fieldset>

	<!-- BOTON ENVIAR -->
  <div class="form-group row">
    <div class="col-sm-10">
	<input type="submit" id="botonEnviar" name="cargar" value="Buscar" class="btn btn-primary">
    </div>
  </div>

</form>
<!-- ## NUEVO ## -->

<script type="text/javascript">




var box = document.querySelector("#alerta");
var formulario = document.querySelector("#buscarForm");
var selector = document.querySelector("#selector");
var buscador = document.querySelector("#buscarEmpresa");
var botonEnviar = document.querySelector("#botonEnviar");

// function validar() {
// 	if(selector.value == 0) {
// 		alert("Ingrese una opcion para buscar")
// 		return false;
// 	} else {
// 		return true;
// 	}
// }
	
// selector.onchange = function(){
// 	if(selector.value == 1) {
// 		buscador.placeholder = "Ingresar Cuit"
// 	} else if(selector.value == 2) {
// 		buscador.placeholder = "Ingresar Nombre"
// 	}
// }

// botonEnviar.onclick = function(e) {
// 	if(buscador.value == ""){
// 		e.preventDefault();	
// 		alert('Completar datos')
// 	} else {
// 		e.preventDefault();
// 				$.ajax({
// 					type: 'POST',
// 					url: '../AJAX/buscarEmpresa.php',
// 					data: {
// 						'selector': selector.value,
// 						'empresa': buscador.value
// 					},
// 					success: function(res){
// 						if(res == "OK") {
// 							formulario.submit();
// 						} else {
// 							document.getElementById("alerta").innerHTML = res;

// 						}


// 					}
// 				})
// 	}
// }

</script>

<?php 
	include "../Componentes/footer.php";
 ?>


