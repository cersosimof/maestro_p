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
<h2 style="margin: 3%">INGRESAR DATOS DE EXPEDIENTE:</h2>
<form style="margin: 3%" action="listadoArmado.php" method="POST" id="formArmarListado">

	<div class="form-group">
		<label for="numero">Numero: <span id="mensaje"> </span> </label>
		<input required type="number" name="nroExpediente" class="form-control" id="numero">
	</div>

	<div class="form-group">
		<label for="titulo">Titulo:</label>
		<input required type="text" name="titulo" class="form-control" id="titulo">
	</div>

	<div class="form-group">
		<label for="tag">Ramos a Buscar:</label>
		<input required type="text" name="buscar" class="form-control" id="ramos">
	</div>

	<input type="submit" name="Crear" id="botonSubmit" class="btn btn-secondary btn-lg btn-block">

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


//hola