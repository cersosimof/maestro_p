<?php
require "conexion.php";


  $empresa = $_POST["empresaAEliminar"];

  $sqlEliminarEmpresa = "DELETE FROM proveeores WHERE nombre = '$empresa'";
  $eliminarEmpresa = mysqli_query($link, $sqlEliminarEmpresa);

    if (mysqli_affected_rows($link) >= 1) {
      echo "Empresa ", $empresa, "eliminada";
    } else {
      echo "no paso nada";
    }
