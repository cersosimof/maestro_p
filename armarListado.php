<?php
include "header.php";

?>

<form action="listadoArmado.php" method="POST" id="formArmarListado">
	<label>Nro Expediente:
		<input required type="number" name="nroExpediente" placeholder="XXXX" id="numero"><br>
	</label>
	<label>Buscar tag:
		<input required type="text" name="buscar" placeholder="Ejemplo informatica, libreria" id="tag"><br>
	</label>
	<input type="submit" name="Buscar">
</form>

<br>

<script src="JS/jquery.js">

</script>
<script >
$("#formArmarListado").submit(function (e){
e.preventDefault();
var numero = document.getElementById("numero").value;
var tag = document.getElementById("tag").value;
	$.ajax({
		type: 'POST',
		url: 'PEDIDOS_AJAX/verificar.php',
		data:{'numeroExpediente': numero, 'ramo': tag},
			success: function(data){
				console.log(data)
				if(data == 0 ){
					window.location.href = 'listadoArmado.php?nroExpediente='+numero;
				} else {
					alert("el expediente ya existe")
				}
			}
	})
})
</script>
