<?php
session_start();
if(!isset($_SESSION["ID"])){ 
    echo'<script>history.go(-1);</script>';
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
<a href="./../cerrarsesion.php">Cerrar sesión</a>
<a href="./usuarios.php">Ver usuarios</a>

</body>
</html>