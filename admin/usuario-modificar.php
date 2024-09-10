<?php
session_start();
if(!isset($_SESSION["ID"])){ 
    echo'<script>history.go(-1);</script>';
}
if (isset($_GET['id'])){

include './../conexion.php';

$name=$_GET['name'];
$mail=$_GET['mail'];
$password=$_GET['password'];
$id=$_GET['id'];


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
    <form action="./back/usuario-modificar.php" method="post">
        <?php
        echo'
        <input type="hidden" value="'.$id.'" name="id" id="id" required>

        Nombre
        <input type="text" value="'.$name.'" name="name" id="name"  minlength="5" maxlength="20" required>

        Correo
        <input type="mail" value="'.$mail.'" name="mail" id="mail" minlength="10" maxlength="50" required>

        Contraseña
        <input type="text" value="'.$password.'" name="password" id="password" minlength="8" maxlength="13" required>
        
        Tipo de usuario
        <select name="type" id="type">
        ';
            if($res){
                while($lista=mysqli_fetch_assoc($res)){
                    echo'<option value="'.$lista['TipoUsuarioID'].'">'.$lista['Nombre'].'</option>';
                }
            }
        ?>    
        </select>

        <button type="submit">Actualizar</button>
    </form>
    <a href="">Eliminar usuario</a>
</body>
</html>

<?php
}else{
    echo "<script>history.go(-1);</script>";
}
?>
