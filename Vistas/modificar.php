<?php
include "../Componentes/comprobarSesion.php";
include "../Componentes/header.php";
?>

<div style="margin-top: 3%"class="container">
	<form method="GET" id="buscarForm" onsubmit="return validar()" action="empresaAmodif.php">
		<!-- SELECTOR -->
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
		<!-- BUSCADOR -->
		<div class="form-group row">
			<label for="inputEmail3" class="col-sm-2 col-form-label">Clave</label>
			<div class="col-sm-10" id="autocomplete" >
				<input type="text" class="form-control eliminarRecuadro" autocomplete="off" id="sugerencia" name="tag">
				<ul class='eliminaPunto' style='margin-bottom: 0px' id="opciones">
			</div>
		</div>
		<!-- BOTON ENVIAR -->
		<div class="form-group row">
			<div class="col-sm-10">
				<input type="submit" id="botonEnviar" value="Buscar" class="btn btn-primary">
			</div>
		</div>
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
  console.log(dondeBuscar)
});
document.getElementById("gridNombre").addEventListener("click", function(){
  dondeBuscar = "nombre";
  console.log(dondeBuscar)
});

//EJECUTA UN AJAX QUE TRAE LAS SUGERENCIAS
document.querySelector("#sugerencia").onkeyup = () => { 
var aBuscar = document.querySelector("#sugerencia").value;
  $.ajax({
  type: 'POST',
  url: '../AJAX/sugCuitNombre.php',
  data:{'clave': aBuscar, 'donde': dondeBuscar},
    success: function(data){
      document.getElementById("opciones").innerHTML = data;
      apretar() 
    }
  })
}

//FUNCION DEL CLICK EN LAS SUGERENCIAS
function apretar() {
	var clickAgregarArray = document.querySelectorAll('.clickAgregar');
	for (var i = 0; i < clickAgregarArray.length; i++) {
		var select = clickAgregarArray[i].id;
			clickAgregarArray[i].onclick = (e) => { //click en la opcion agrega la linea.
			console.log(e.path[0].innerHTML)
        document.querySelector("#sugerencia").value = e.path[0].innerHTML;
		document.querySelector("#opciones").innerHTML = "";
		}
	}
}

// function vaciarSugg() {
// 	document.querySelector("#sugerencia").value = "";
// 	document.querySelector("#opciones").innerHTML = "";
// }

// AL HACER CLICK POR FUERA DEL INPUT AUTOCOMPLETE EJECUTA LA FUNCION VACIARSUGG.
// var specifiedElement = document.getElementById('#autocomplete');
document.addEventListener('click', function(event) {
	if((event.path[1].id) !== ('autocomplete' || 'opciones' || 'sugerencias')) {
	document.querySelector("#sugerencia").value = "";
	document.querySelector("#opciones").innerHTML = "";
	} else {
		console.log('es distinto')
	}
});
</script>




