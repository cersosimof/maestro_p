<?php
require "Componentes/header.php";
?>

<form action="index.php" class="form-signin" method="POST">
  <h1 class="h3 mb-3 font-weight-normal">Iniciar Sesion!</h1>
  <label for="inputEmail" class="sr-only">Usuario:</label>
  <input type="text" name="user" id="user" class="form-control" required="">
  <label for="inputPassword" class="sr-only">Clave:</label>
  <input type="password" id="pass" name="pass" class="form-control" required="">
  <button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar!</button>
</form>


</body>

</html>


<?php

if(isset($_POST["user"]) && isset($_POST["pass"])){
$usuNombre = $_POST["user"];
$usuPass = $_POST["pass"];

include "conexion.php"; // Se conecta a la base de datos.

$queryLogin = "SELECT user, pass FROM usuarios WHERE user = '$usuNombre' AND pass = '$usuPass'";
$resultadoLogin = mysqli_query( $link, $queryLogin );
$usuarioBase = mysqli_fetch_assoc($resultadoLogin); //ir a buscar
$resultados = mysqli_num_rows($resultadoLogin);

//Si existen resultados crear variable de sesion.-
if($resultados == 1 ){
  session_start();
  $_SESSION["usuario"] = $usuNombre;
  header("location: Vistas/principal.php");
} else {
  echo "el usuario no existe";
}

mysqli_close($link);
};
?>
