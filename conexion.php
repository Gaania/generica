<?php

$conectar = mysqli_connect("localhost", "root","", "usuario");

if(!$conectar){
    echo "<script>alert('ERROR: No se pudo conectar a la base de datos')</script>";
}

