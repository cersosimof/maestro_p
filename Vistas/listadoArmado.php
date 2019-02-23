<?php
include "../Componentes/header.php";
$nroExpediente = $_GET["nroExpediente"];
$titulo = $_GET["titulo"];
?>

<div class="container">
	<h2> Nro. Expediente: <b> <?php echo $nroExpediente;  ?> - <?php echo $titulo;  ?> </b> - Empresas a invitar:</h2>

		<input type="hidden" value=<?php echo $nroExpediente;  ?> id="nroExpediente">
		<table 	class=" table text-center">
			<thead class="thead-dark">
				<tr>
					<th>Razon Social</th>
					<th>Correo Electronico</th>
					<th>Telefono</th>
					<th>Contacto</th>
					<th>OPCION</th>
				</tr>
			</thead>
			<tbody id="mytable">

			</tbody>
			<input type="hidden" id="titulo" value="<?php echo $titulo; ?>">
			<input type="hidden" id="nroExpedienteMail" value="<?php echo $nroExpediente; ?>">

		</table>


	<!-- AGREGA UNA NUEVA EMPRESA -->
	<div  id='autocomplete'>
	<input type="text" autocomplete='off' class="form-control form-control-lg eliminarRecuadro" placeholder='¿Falta alguna empresa?, agreguela aqui!' id='idSug'>
		<ul class='eliminaPunto' id="sugg">
		</ul>
	</div>
	<!-- AGREGA UNA NUEVA EMPRESA -->
</div>
<script src='../JS/jquery.js'> </script>
<script type="text/javascript">

	armarCuadro();

// $( document ).ready(function() {
//     borrarLinea();
// });

function tuvieja(e) {
	if(confirm('Desea borrar la empresa seleccionada?')){
				$.ajax({
				type: 'POST',
				url: '../AJAX/eliminarEmpresa.php',
				data:{ 'aEliminar' : e.toElement.id, 'listado' : document.querySelector('#nroExpedienteMail').value },
					success: function(data){
					alert(data)
					armarCuadro();
					}
				})
			} else {
				alert('La empresa continua en el listado')
			}
			
}

function armarCuadro() {
	var nroExp = document.querySelector('#nroExpedienteMail').value

	$.ajax({
	type: 'POST',
	url: '../AJAX/armarCuadro.php',
	data:{'nroExp': nroExp},
		success: function(data){
				document.querySelector('#mytable').innerHTML = data;
		}
		
	}) 
	// borrarLinea();
	
	
}


function vaciarSugg() {
	document.querySelector("#idSug").value = "";
	document.querySelector("#sugg").innerHTML = "";
}

// AL HACER CLICK POR FUERA DEL INPUT AUTOCOMPLETE EJECUTA LA FUNCION VACIARSUGG.
var specifiedElement = document.getElementById('#autocomplete');
document.addEventListener('click', function(event) {
	if((event.path[1].id) !== 'autocomplete') {
		vaciarSugg();
	}
});



//ENVOLVER ESTO EN UNA FUNCION ###################################
document.querySelector("#idSug").onkeyup = () => { //ver de hacerlo cuando cambie la cantidad de letras que tenga el imput

	var nombreEmpresaBuscada = document.querySelector("#idSug").value;
	var nroExp = document.querySelector("#nroExpediente").value;
	var conteo = nombreEmpresaBuscada.length;

	// VER CUANTOS CARACTERES TIENE EL INPUT
	$.ajax({
	type: 'POST',
	url: '../AJAX/agregaUnaEmpresa.php',
	data:{'nombreEmpresa': nombreEmpresaBuscada, 'nroExp': nroExp},
		success: function(data){
			if(conteo == 0) { //para que arranque a buscar en la segunda opcion (ver algo mejor)
				vaciarSugg();
			} else {
				document.querySelector("#sugg").innerHTML = data; //TRAE LOS RESULTADOS DEL QUERY CON EL VALOR QUE SE LE ENVIO
				enumerarArray(); //FUNCION QUE ENUMERA LOS RESULTADOS Y LE PONE LA OPCION DE CLICK
			}

		}
	})
}

//FUNCION QUE ENUMERA LOS RESULTADOS Y LE PONE LA OPCION DEL CLICK.
function enumerarArray() {
	var clickAgregarArray = document.querySelectorAll('.clickAgregar');

	for (var i = 0; i < clickAgregarArray.length; i++) {
		var select = clickAgregarArray[i].id;
			clickAgregarArray[i].onclick = () => { //click en la opcion agrega la linea.
			$.ajax({
			type: 'POST',
			url: '../AJAX/filaGenerada.php',
			data:{ 'select' : select, 'nroExp' : document.querySelector("#nroExpediente").value, 'titulo' : document.querySelector("#titulo").value },
				success: function(data){
					armarCuadro();
					vaciarSugg();
					// borrarLinea();
				}
			})
		}
	}
}


// function borrarLinea(){
// 	var botonesEliminar = document.querySelectorAll(".botonEliminar")


// 	for (var i = 0; i < botonesEliminar.length; i++) {
// 		console.log(botonesEliminar.length);
// 		console.log('esto esta actuando')
// 		botonesEliminar[i].onclick = (e) => {
// 			if(confirm('Desea borrar la empresa seleccionada?')){
// 				$.ajax({
// 				type: 'POST',
// 				url: '../AJAX/eliminarEmpresa.php',
// 				data:{ 'aEliminar' : e.toElement.id, 'listado' : document.querySelector('#nroExpedienteMail').value },
// 					success: function(data){
// 					alert(data)
// 					ejecutar()
// 					}
// 				})
// 			} else {
// 				alert('La empresa continua en el listado')
// 			}

// 		}
// 	}
// }



</script>

<?php
include "../Componentes/footer.php";
?>
