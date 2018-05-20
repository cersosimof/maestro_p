<?php
require "header.php";
 ?>


    <form action="index.php" class="form-signin" method="post">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="text" name="user" id="user" class="form-control" placeholder="Email address" required="" autofocus="">
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="pass" name="pass" class="form-control" placeholder="Password" required="">
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">© 2017-2018</p>
    </form>
</body></html>

<?php

if(isset($_POST["user"]) && isset($_POST["pass"])){
$usuNombre = $_POST["user"];
$usuPass = $_POST["pass"];

include "conexion.php";

$sql = "SELECT user, pass FROM usuarios WHERE user = '$usuNombre' AND pass = '$usuPass'";
$resultadoLogin = mysqli_query( $link, $sql );
$usuarioBase = mysqli_fetch_assoc($resultadoLogin);

$x = mysqli_num_rows($resultadoLogin);

if($x == 1 ){
    session_start();
    $_SESSION["usuario"] = $usuNombre;
    header("location: principal.php");
} else {
  echo "el usuario no existe";
}

mysqli_close($link);

};
?>
