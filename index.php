<?php
session_start();
if(!isset($_SESSION["ID"])){ 
    $sesion=null;
}else{
    $sesion=$_SESSION["ID"];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <?php echo $sesion; ?>
<a href="./login.html">Iniciar Sesion</a>
<a href="./signup.html">Crear cuenta</a>
<a href="./cerrarsesion.php">Cerrar sesión</a>
</body>
</html>