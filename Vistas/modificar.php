<?php
include "../Componentes/comprobarSesion.php";
include "../Componentes/header.php";
?>


<div style="margin-top: 3%"class="container">
<h2 style="margin-bottom: 2%"><i class="fas fa-search"></i> - Buscar Proveedor.</h2>
<hr class="featurette-divider">
	<form method="GET" id="buscarForm" onsubmit="return validar()" action="empresaAmodif.php">
		<!-- SELECTOR -->
		<fieldset id="fichaSelect" class="form-group">
			<div class="row">
				<legend class="col-form-label col-sm-2 pt-0">Buscar Por:</legend>
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
		<!-- BUSCADOR -->
		<div class="form-group row">
			<label for="inputEmail3" class="col-sm-2 col-form-label">Clave</label>
			<div class="col-sm-10" id="autocomplete" >
			<small id="emailHelp" class="form-text text-muted">Escribir el <span id="cuitONombre">cuit </span> que desea buscar, luego hacer click en la opcion correcta.</small>

				<input type="text" class="form-control eliminarRecuadro" autocomplete="off" id="sugerencia" name="tag">
				<ul class='eliminaPunto' style='margin-bottom: 0px' id="opciones">
			</div>
		</div>
		<!-- BOTON ENVIAR -->
		<!-- <div class="form-group row">
			<div class="col-sm-10">
				<input type="submit" id="botonEnviar" value="Buscar" class="btn btn-primary">
			</div>
		</div> -->
	</form>
</div>

<?php 
include "../Componentes/footer.php";
 ?>

<script type="text/javascript">

var buscador = document.querySelector("#buscarEmpresa");
var botonEnviar = document.querySelector("#botonEnviar");

//EVITA SE ENVIE EL FORMULARIO SI NO TIENE NINGUN VALOR
function validar() {
	if(buscador.value == "") {
		alert("Ingrese una opcion para buscar, seleccione cuit o nombre.")
		return false;
	} else {
		return true;
	}
}

// CAMBIA LA VARIABLE DONDE BUSCAR PARA SABER QUE CAMPO ESTA PRENDIDO
var dondeBuscar = "cuit";

document.getElementById("gridCuit").addEventListener("click", function(){
  dondeBuscar = "cuit";
  document.querySelector("#cuitONombre").innerHTML = "cuit"
});
document.getElementById("gridNombre").addEventListener("click", function(){
  dondeBuscar = "nombre";
  document.querySelector("#cuitONombre").innerHTML = "nombre"
});

//EJECUTA UN AJAX QUE TRAE LAS SUGERENCIAS
document.querySelector("#sugerencia").onkeyup = () => { 
	if(document.querySelector("#sugerencia").value == "") {
	document.getElementById("opciones").innerHTML = "";
	} else {
	var aBuscar = document.querySelector("#sugerencia").value;
		$.ajax({
		type: 'POST',
		url: '../AJAX/sugCuitNombre.php',
		data:{'clave': aBuscar, 'donde': dondeBuscar},
		success: function(data){
		document.getElementById("opciones").innerHTML = data;
		}
		})
	}
}

function getText(obj) {
	document.querySelector("#sugerencia").value = obj.innerHTML;
	document.querySelector("#buscarForm").submit();
}


document.addEventListener('click', function(event) {
	if( event.target.id != "autocomplete" ) {
		document.getElementById("opciones").innerHTML = "";
		document.querySelector("#sugerencia").value = "";
	}
});


</script>




