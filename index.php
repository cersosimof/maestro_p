<?php
require "Componentes/header.php";
 ?>

<form action="index.php" class="form-signin" method="POST">
  <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
  <label for="inputEmail" class="sr-only">Email address</label>
  <input type="text" name="user" id="user" class="form-control" placeholder="Email address" required="" autofocus="">
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" id="pass" name="pass" class="form-control" placeholder="Password" required="">

  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
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
