<?php
session_start();
if(!isset($_SESSION["ID"])){ 
    echo'<script>history.go(-1);</script>';
}else{
    $sesion=$_SESSION["ID"];
}

include './../conexion.php';
$sql = "SELECT UsuarioID,Nombre,Correo,TipoUsuarioID,Clave
FROM usuario";
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
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Tipo de usuario</th>
            <th>Modificar</th>
            <th>Eliminar</th>
        </tr>
        </thead>
        <tbody>
        <?php echo $sesion; 
        if($res){
            while($usuario=mysqli_fetch_assoc($res)){
                $name=$usuario['Nombre'];
                $mail=$usuario['Correo'];
                $type=$usuario['TipoUsuarioID'];
                $password=$usuario['Clave'];
                $id=$usuario['UsuarioID'];
                echo '<tr>
                <td>'.$id.'</td>
                <td>'.$name.'</td>
                <td>'.$mail.'</td>
                <td>'.$type.'</td>
                <td><a href="usuario-modificar.php?id='.$id.'&name='.$name.'&mail='.$mail.'&password='.$password.'">/</a></td>
                <td><a href="./back/usuario-eliminar.php?id='.$id.'">X</a></td>
                </tr>';
                
            }
        }
        ?>
        </tbody>
    </table>

</body>
</html>