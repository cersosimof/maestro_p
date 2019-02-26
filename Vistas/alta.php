<?php
include "../Componentes/comprobarSesion.php";
include "../Componentes/header.php";
// include "../classConnectionMySQL.php";

// $instance = ConnectDb::getInstance();
// $conn = $instance->getConnection();


// if (isset($_GET["cargado"])) {
// 	$nombre = $_POST["nombre"];
// 	$cuit = $_POST["cuit"];
// 	$correo = $_POST["correo"];
// 	$telefono = $_POST["telefono"];
// 	$contacto = $_POST["contacto"];
// 	$ramo = $_POST["ramo"];
//     $pass = md5($_POST["pass"]);
    

//     $query = "INSERT INTO proveeores (nombre, correo, telefono, contacto, ramo, cuit, pass, participo, cotizo) VALUES ('$nombre', '$correo', '$telefono', '$contacto', '$ramo', '$cuit', '$pass', 0, 0)";
//     $result = $instance->ExecuteQuery($query); 

//             if($result) {
//                 //enviar el alert, y luego envia al inicio
//                 echo "<script>alert('El proveedor ", $nombre, " fue cargado correctamente, el mismo trabaja con los ramos ", $ramo,", se redirigira al inicio.'); window.location.href = 'principal.php'</script>"; 
//             } else {
//                 echo "<script>alert('Error!!! Intente nuevamente')</script>";
//             }
// }

?>

<!--FORM DE INGRESO EMPRESA -->
<div class="container">
<h2>Alta de Nuevo Proveedor</h2>
<hr>
<form action="alta.php?cargado=1" method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
        <label for="idNombre">Nombre o Razon social:</label>
        <input type="text" class="form-control" id="idNombre" required  >
    </div>
    <div class="form-group col-md-6">
        <label for="idCuit">CUIT:</label>
        <input type="text" name="cuit" class="form-control" id="idCuit" onblur="borrarGuion()" required  >
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-9">
    <label for="irRamo">Ramos que vende:</label>
    <input type="text" name="ramo" class="form-control" id="idRamo"  >
    <small id="emailHelp" class="form-text text-muted">Separar los distintos ramos con coma.</small>
    </div>
    <div class="form-group col-md-3">
    <label for="idContacto">Persona de contacto:</label>
<input type="text" name="contacto" class="form-control" id="idContacto" >
    </div>
  </div>

  <div class="form-row">

    <div class="form-group col-md-4">
    <label for="idCorreo">Correo Electronico:</label>
            <input type="mail" name="correo" class="form-control" id="idCorreo" required  >
            <small id="emailHelp" class="form-text text-muted">Puede ingresar mas de una direccion separando con punto y coma.</small>
    </div>
    <div class="form-group col-md-2">
    <label for="idTel">Telefonos:</label>
        <input type="text" name="telefono" class="form-control" id="idTel" required autocomplete="off"  >
    </div>

    <div class="form-group col-md-6">
    <label for="idPass">Contraseña:</label>
            <div class="input-group"  >
                <input type="password" name="pass" class="form-control" id="idPass" name="pass" >
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" onclick="mostrarPass()" type="button">Mostrar</button>
                </div>
            </div>
            <small id="emailHelp" class="form-text text-muted">Esto servira para modificar los datos en un futuro.</small>
    </div>

</div>
		<button name="Cargar" id="btnEnviar" value="Cargar Proveedor" class="btn btn-secondary btn-lg btn-block">Cargar</button>
</form>

<div id="mensaje">

</div>

</div>
</div>

<?php
include "../Componentes/footer.php"
?>



<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script> //MOVER SCRIPTS

document.querySelector("#btnEnviar").addEventListener("click", (e)=> {
    var nombre = document.querySelector("#idNombre").value;
    var cuit = document.querySelector("#idCuit").value;
    var ramo = document.querySelector("#idRamo").value;
    var correo = document.querySelector("#idCorreo").value;
    var contacto = document.querySelector("#idContacto").value;
    var telefono = document.querySelector("#idTel").value;
    var pass = document.querySelector("#idPass").value;
    e.preventDefault();

		$.ajax({
			type: 'POST',
			url: '../AJAX/altaEmpresa.php',
			data: { 'nombre': nombre,
                    'cuit': cuit,
                    'ramo': ramo,
                    'correo': correo,
                    'contacto': contacto,
                    'telefono': telefono,
                    'pass': pass},
			success: function(data){
				document.querySelector("#mensaje").innerHTML = data;
                $("#modalMensaje").modal("show")
			}
		})
})


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




