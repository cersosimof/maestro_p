<?php 
include "../Componentes/header.php";
?>

<html>
<head>
	<title>Proveedores Principal</title>
</head>
<body>
<div class="container">
  <div class="row filaDeTres">
    <div class="col-sm">
    <a href="../Vistas/alta.php"><button type="button" class="btn btn-outline-secondary styleBoton" id="botonPrincipal">Alta</button></a>
    </div>
    <div class="col-sm">
    <a href="../Vistas/modificar.php"><button type="button" class="btn btn-outline-secondary styleBoton">Modificaciones - Baja</button></a>
    </div>
    <div class="col-sm">
    <button type="button" class="btn btn-outline-secondary styleBoton">Otros</button>
    </div>
  </div>

    <div class="row filaDeTres">
    <div class="col-sm">
    <a href="../Vistas/armarListado.php"><button type="button" class="btn btn-outline-secondary styleBoton" id="botonPrincipal">Armar Listado</button></a>
    </div>
    <div class="col-sm">
    <a href="../Vistas/mostrarListados.php"><button type="button" class="btn btn-outline-secondary styleBoton">Ver Listados Armados</button></a>
    </div>
    <div class="col-sm">
    <button type="button" class="btn btn-outline-secondary styleBoton">Buscar Empresas</button>
    </div>
  </div>
</div>
<script>
function ponerCuadrados() {
  var anchoBoton = document.querySelector("#botonPrincipal").offsetWidth;
  var botones = document.querySelectorAll(".styleBoton");
  for (var i = 0; i < botones.length; i++) {
    botones[i].style.height = anchoBoton+"px";
  }
}
window.onload = function() {
  ponerCuadrados();
}

window.addEventListener("resize", function() {
  ponerCuadrados();
});

</script>
<?php
include "../Componentes/footer.php"
?>
