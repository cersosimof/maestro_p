<?php
require("classConnectionMySQL.php");
$instance = ConnectDb::getInstance();
$conn = $instance->getConnection();

if(isset($_POST["user"]) && isset($_POST["pass"])){
$usuNombre = $_POST["user"];
$usuPass = $_POST["pass"];

$query="SELECT user, pass FROM usuarios WHERE user = '$usuNombre' AND pass = '$usuPass'";

$result = $instance->ExecuteQuery($query); //crea una variable, en la que ejecutas un metodo.
if($result){ //Si existen resultados...
 
$resultados = $instance->GetCountAffectedRows($result);
    if($resultados == 1 ){
        session_start();
        $_SESSION["usuario"] = $usuNombre;
        header("location: Vistas/principal.php");
    } else {
        echo "el usuario no existe";
    }
     
    $NewConn->SetFreeResult($result);
 
}else{
    echo "<h3>Error generando la consulta</h3>";
}

};
?>

<html>

<head>
<link rel="stylesheet" type="text/css" href="CSS/style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href='CSS/loginStyle.css'>
</head>

<body class='text-center'>
  <form action="index.php" class="form-signin" method="POST">
    <h1 class="h3 mb-3 font-weight-normal">Bienvenido, iniciar sesion</h1>
    <label for="userID" class="sr-only">Usuario:</label>
    <input type="text" name="user" id="userID" class="form-control" required="">
    <label for="passID" class="sr-only">Clave:</label>
    <input type="password" id="passID" name="pass" class="form-control" required="">
    <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
  </form>
</body>

</html>





