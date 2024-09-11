<?php
session_start();
if(!isset($_SESSION["ID"])){ 
    echo'<script>history.go(-1);</script>';
}
include './../conexion.php';

$sql = "SELECT Nombre,TipoUsuarioID
FROM tipousuario";
$res = mysqli_query($conectar, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <form action="./back/usuario-agregar.php" method="post">

        Nombre
        <input type="text" name="name" id="name"  minlength="5" maxlength="20" required>

        Correo
        <input type="mail" name="mail" id="mail" minlength="10" maxlength="50" required>

        Contraseña
        <input type="text" name="password" id="password" minlength="8" maxlength="13" required>
        
        Tipo de usuario
        <select name="type" id="type">
        <?php
            if($res){
                while($lista=mysqli_fetch_assoc($res)){
                    echo'<option value="'.$lista['TipoUsuarioID'].'">'.$lista['Nombre'].'</option>';
                }
            }
        ?>    
        </select>

        <button type="submit">Añadir</button>
    </form>
</body>
</html>

