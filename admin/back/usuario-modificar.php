<?php
session_start();
if(!isset($_SESSION["ID"])){ 
    echo'<script>history.go(-1);</script>';
}
if (isset($_POST['id'])){

    include './../../conexion.php';
    
    //declaracion variables
    $id = $_POST['id'];
    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $type = $_POST['type'];
    $password = $_POST['password'];

    //obtener datos originales
    $sql = "SELECT Nombre,Correo,Clave,TipoUsuarioID
    FROM usuario
    WHERE UsuarioID= '$id'";
    $res = mysqli_query($conectar, $sql);
    if($res){
        $row = mysqli_fetch_array($res);
        $oldname = $row['Nombre'];
        $oldmail = $row['Correo'];
        $oldpassword = $row['Clave'];
        $oldtype = $row['TipoUsuarioID'];
    }

    //validaciones
    if($name != $oldname){
        $sql = "SELECT Nombre
        FROM usuario
        WHERE Nombre= '$name'";
        $res = mysqli_query($conectar, $sql);
        if($res){
            if(mysqli_num_rows($res) != 0){
                echo '<script>alert("ERROR:Este nombre ya pertenece a una cuenta");history.go(-1);</script>';
                exit();
            }
        }
    }

    if($mail != $oldmail){
        $sql = "SELECT Nombre
        FROM usuario
        WHERE Correo= '$mail'";
        $res = mysqli_query($conectar, $sql);
        if($res){
            if(mysqli_num_rows($res) != 0){
                echo '<script>alert("ERROR: Este correo ya pertenece a una cuenta");history.go(-1);</script>';
                exit();
            }
        }
    }

    $sql = "SELECT Nombre
    FROM tipousuario
    WHERE TipoUsuarioID= '$type'";
    $res = mysqli_query($conectar, $sql);
    if($res){
        if(mysqli_num_rows($res) == 0){
            echo '<script>alert("ERROR: Este tipo de usuario no existe");history.go(-1);</script>';
            exit();
        }
    }

    //ingreso a BD
    $update = "UPDATE `usuario` 
    SET `Nombre`='$name',`Clave`='$password',`Correo`='$mail',`TipoUsuarioID`='$type' 
    WHERE UsuarioID='$id'";
    $res = mysqli_query($conectar, $update);
    if($res){
        echo '<script>alert("EXITO AL ACTUALIZAR");window.location="./../index.php";</script>';
        exit();
    }else{
        echo '<script>alert("ERROR: No se actualizó");history.go(-1);</script>';
        exit();
    }

}else{
    echo "<script>history.go(-1);</script>";
}
