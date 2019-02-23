<?php
include "../Componentes/comprobarSesion.php";
include "../Componentes/header.php";
include "../classConnectionMySQL.php";

$instance = ConnectDb::getInstance();
$conn = $instance->getConnection();

// BUSCA ULTIMO EXPEDIENTE
$query = "SELECT nroExpediente FROM listadoexpediente ORDER BY nroExpediente DESC LIMIT 1";
$resultado = $instance->ExecuteQuery($query); 
$masAlto = $resultado->fetch_assoc();

?>
<h2 style="margin: 3%">INGRESAR DATOS DE EXPEDIENTE:</h2>
<form style="margin: 3%" action="listadoArmado.php" method="POST" id="formArmarListado">
	
	<div class="form-group">
		<label for="numero">Numero: <span id="mensaje"> </span> </label>
		<input required type="number" name="nroExpediente" class="form-control" id="numero" placeholder="Ultimo Expediente <?php echo $masAlto["nroExpediente"]; ?>">
	</div>

	<div class="form-group">
		<label for="titulo">Titulo:</label>
		<input required type="text" name="titulo" class="form-control" id="titulo" placeholder="Adq. de utiles 8 de Junio de 1988">
	</div>

	<div class="form-group">
		<label for="tag">Ramo a incluir:</label>
		<input required type="text" name="buscar" class="form-control" id="ramos" placeholder="Utiles">
	</div>

	<input type="submit" name="Crear" id="botonSubmit" class="btn btn-primary">

</form>



<script >

	//EVENTO QUE SE DISPARA AL ABANDONAR EL CAMPO "NUMERO"
	document.querySelector("#numero").onblur = (e) => {
		var numero = document.getElementById("numero").value;
		$.ajax({
			type: 'POST',
			url: '../AJAX/verificar.php',
			data:{'numeroExpediente': numero},
				success: function(data){
					//0 => NO EXISTE EL EXPEDIENTE
					// 1 => EXISTE EL EXPEDIENTE
					if(data == 0 ){
						//document.querySelector("#numero").style.border = '2px solid green'
						document.querySelector("#mensaje").innerHTML = "";
						document.querySelector("#numero").style.border = '2px solid green';						
						// window.location.href = 'listadoArmado.php?nroExpediente='+numero;
					} else {
						document.querySelector("#numero").style.border = '2px solid red';
						document.querySelector("#mensaje").innerHTML = "Numero de expediente ya usado";
					}
				}
		})
	}

	//
	document.querySelector('#botonSubmit').onclick = (e) => {
		e.preventDefault();
		var numero = document.getElementById("numero").value;
		var titulo = document.getElementById("titulo").value
		var ramos = document.getElementById("ramos").value;


		$.ajax({
			type: 'POST',
			url: '../AJAX/anotaExp.php',
				data:{'numero': numero, 'ramos': ramos, 'titulo': titulo},
				success: function(data){
					console.log(data)
					if(data == 1 ){
						window.location.href = '../Vistas/listadoArmado.php?nroExpediente='+numero+'&titulo='+titulo;
					} else {
						alert("el expediente ya existe")
					}
				}
		})
	}

</script>

<?php include "../Componentes/footer.php"; ?>

