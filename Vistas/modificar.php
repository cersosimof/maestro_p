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
<div style="margin-top: 3%"class="container">
  <form method="GET" id="buscarForm" onsubmit="return validar()" action="empresaAmodif.php">

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
    
    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-2 col-form-label">Clave</label>
      <div class="col-sm-10" id="autocomplete" >
        <input type="text" class="form-control eliminarRecuadro" autocomplete="off" id="sugerencia" name="tag">
        <ul class='eliminaPunto' id="opciones">
      </div>
    </div>

    <!-- BOTON ENVIAR -->
    <div class="form-group row">
      <div class="col-sm-10">
    <input type="submit" id="botonEnviar" value="Buscar" class="btn btn-primary">
      </div>
    </div>

  </form>
  <!-- ## NUEVO ## -->
</div>
<script type="text/javascript">

var box = document.querySelector("#alerta");
var formulario = document.querySelector("#buscarForm");
var selector = document.querySelector("#selector");
var buscador = document.querySelector("#buscarEmpresa");
var botonEnviar = document.querySelector("#botonEnviar");

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
// CAMBIA LA VARIABLE DONDE BUSCAR PARA SABER QUE CAMPO ESTA PRENDIDO


document.querySelector("#sugerencia").onkeyup = () => { //ver de hacerlo cuando cambie la cantidad de letras que tenga el imput
var aBuscar = document.querySelector("#sugerencia").value;
  $.ajax({
  type: 'POST',
  url: '../AJAX/sugCuitNombre.php',
  data:{'clave': aBuscar, 'donde': dondeBuscar},
    success: function(data){
      document.getElementById("opciones").innerHTML = data;
      click() 
    }
  })
}

function click() {
	var clickAgregarArray = document.querySelectorAll('.clickAgregar');
	for (var i = 0; i < clickAgregarArray.length; i++) {
		var select = clickAgregarArray[i].id;
			clickAgregarArray[i].onclick = (e) => { //click en la opcion agrega la linea.
        var aBuscar = document.querySelector("#sugerencia").value = e.path[0].innerHTML;
		}
	}
}

</script>

<?php 
	include "../Componentes/footer.php";
 ?>


