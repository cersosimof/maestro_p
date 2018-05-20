<?php
    //define('SERVER', 'localhost');
    const SERVER = 'localhost';
    const USUARIO = 'root';
    const CLAVE = '';
    const BASE = 'proveedores';

    $link = mysqli_connect(SERVER, USUARIO, CLAVE, BASE)
                        or die( mysqli_connect_error($link) );
        mysqli_set_charset($link, 'utf8');
?>
