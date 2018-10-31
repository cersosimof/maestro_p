<?php

session_start();
if (!isset($_SESSION['usuario'])){
echo '  <script type="text/javascript">
                alert("Para acceder a este contenido tiene que estar logueado");
               window.location="index.php"
           </script>';
}

include "../Componentes/header.php";
include "../conexion.php";


if (isset($_GET["cargado"])) {
	$nombre = $_POST["nombre"];
	$cuit = $_POST["cuit"];
	$correo = $_POST["correo"];
	$telefono = $_POST["telefono"];
	$contacto = $_POST["contacto"];
	$ramo = $_POST["ramo"];
	$pass = md5($_POST["pass"]);


$sqlCargarProveedores = "INSERT INTO proveeoresss (nombre, correo, telefono, contacto, ramo, cuit, pass, participo, cotizo) VALUES ('$nombre', '$correo', '$telefono', '$contacto', '$ramo', '$cuit', '$pass', 1, 1)";
$cargarProveedor = mysqli_query($link, $sqlCargarProveedores);


$pepe = mysqli_num_rows($cargarProveedor);

if($pepe == 1) {
    echo "holaaa";
};
// $validacion = mysqli_affected_rows($link);
// 	if ($validacion > 0) {
//         echo "<script>alert('el proveedor ", $nombre, " fue cargado correctamente, el mismo trabaja con los ramos ", $ramo,"')</script>";
//         // header("location: principal.php");
// 	} else {
//         echo "<script>alert('Hubo un problema =(')</script>";
//     }

}

?>
<!--FORM DE INGRESO EMPRESA -->
<div class='container'>
	<form  action="alta.php?cargado=1" method="POST">

        <div class="form-group">
            <label for="idNombre">Nombre o Razon social:</label>
            <input type="text" name="nombre" class="form-control" id="idNombre" required value="PEPE" >
        </div>

        <div class="form-group">
            <label for="idCuit">CUIT:</label>
            <input type="text" name="cuit" class="form-control" id="idCuit" onblur="borrarGuion()" required  value="PEPE">
        </div>

        <div class="form-group">
            <label for="idCorreo">Correo Electronico:</label>
            <input type="mail" name="correo" class="form-control" id="idCorreo" required  value="PEPE">
            <small id="emailHelp" class="form-text text-muted">Puede ingresar mas de una direccion separando con punto y coma.</small>
        </div>

        <div class="form-group">
            <label for="idTel">Telefonos:</label>
            <input type="text" name="telefono" class="form-control" id="idTel" required  value="PEPE">
        </div>

        <div class="form-group">
            <label for="idContacto">Persona de contacto:</label>
            <input type="text" name="contacto"  class="form-control" id="idContacto" value="PEPE" >
        </div>

        <div class="form-group">
            <label for="irRamo">Ramos que vende:</label>
            <input type="text" name="ramo" class="form-control" id="idRamo" value="PEPE" >
            <small id="emailHelp" class="form-text text-muted">Separar los distintos ramos con coma.</small>
        </div>

        <div class="form-group">
            <label for="idPass">Contraseña:</label>
            <div class="input-group"  >
                <input type="password" name="pass" class="form-control" id="idPass" name="pass" value="PEPE">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" onclick="mostrarPass()" type="button">Mostrar</button>
                </div>
            </div>
            <small id="emailHelp" class="form-text text-muted">Esto servira para modificar los datos en un futuro.</small>
        </div>

		<input type="submit" name="Cargar" value="Cargar Proveedor" class="btn btn-secondary btn-lg btn-block">

	</form>
</div>

<script> //MOVER SCRIPTS
function mostrarPass() {
    switch(document.querySelector('#idPass').type) {
        case "text":
            document.querySelector('#idPass').type = "password"
            break;
        case "password":
            document.querySelector('#idPass').type = "text"
            break;
    }
}

function borrarGuion() {
    var nroCuit = document.querySelector('#idCuit').value.split("");
    var cuitSinGuiones = [];

    for (i = 0; i < nroCuit.length; i++) { 
        if(nroCuit[i] != "-") {
            cuitSinGuiones.push(nroCuit[i])
        }
    }
    document.querySelector('#idCuit').value = cuitSinGuiones.join("");
}
</script>

<?php
include "../Componentes/footer.php"
?>


		<!-- <div class="form-group">
			<label for="idNombre">Nombre:</label>
			<input type="text" name="nombre" class="form-control" id="idNombre">
		</div>
		<div class="form-group">
			<label for="idCorreo">Correo Electronico:</label>
			<input type="text" name="correo" class="form-control" id="idCorreo">
		</div>
		<div class="form-group">
			<label for="idContacto">Contacto:</label>
			<input type="text" name="contacto" placeholder="Vendedor, o persona de contacto" class="form-control" id="idContacto">
		</div>
		<div class="form-group">
			<label for="idTel">Telefono:</label>
			<input type="text" name="telefono" class="form-control" id="idTel">
		</div>
		<div class="form-group">
			<label for="irRamo">Ramo que vende:</label>
			<input type="text" name="ramo" class="form-control" placeholder="Libreria, informatica, formularios..."id="idRamo">
		</div>
		<div class="form-group">
			<label for="idCuit">Cuit:</label>
			<input type="text" name="cuit" placeholder="XXXXXXXXXXXX" class="form-control" id="idCuit">
		</div> -->