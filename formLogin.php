<?php 
include "header.php"
 ?>

<form action="formLogin.php" method="post">
  <label for="id_usuario">Nombre de Usuario:</label><br>
  <input type="text" class="form-control" name="usuNombre"  id="id_nombre"><br>

  <label for="id_password">Contraseña:</label><br>
  <input type="password" class="form-control" name="usuPass" id="id_password"><br>

  <input type="submit" name="iniciarSesion" value="Iniciar Sesion">
</form>