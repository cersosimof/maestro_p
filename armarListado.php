<?php
include "header.php";

?>

<form action="listadoArmado.php" method="POST">
	<label>Nro Expediente:
		<input required type="number" name="nroExpediente" placeholder="XXXX" id="numero"><br>
	</label>
	<label>Buscar tag:
		<input required type="text" name="buscar" placeholder="Ejemplo informatica, libreria" id="tag"><br>
	</label>
	<input type="submit" name="Buscar" onclick="verificar()">
</form><br>

<script>
function verificar(){
	var numero = document.getElementById("numero").value;
	var tag = document.getElementById("tag").value;
	$.ajax({
		type: 'POST',
		url: 'verificar.php',
		data:{'numeroExpediente': numero, 'ramo': tag},
			success: function(response){
				if(response == 1 ){
					alert("el expediente ya existe, arreglar el problema ya que redirecciona")
				}
			}
	})
}
</script>

<?php
include "footer.php";
 ?>
