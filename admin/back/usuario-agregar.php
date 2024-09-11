<?php
session_start();
if(!isset($_SESSION["ID"])){ 
    echo'<script>history.go(-1);</script>';
}
if (isset($_POST['name'])){

    include './../../conexion.php';
    
//declaracion variables
    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $type = $_POST['type'];
    $password = $_POST['password'];


//verificaciones
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
    $ingreso = "INSERT INTO `usuario`(`Nombre`, `Clave`, `Correo`, `TipoUsuarioID`)
    VALUES ('$name','$password','$mail','$type')";
    $res = mysqli_query($conectar, $ingreso);
    if($res){
        echo '<script>alert("EXITO AL CREAR LA CUENTA");window.location="./../usuarios.php";</script>';
        exit();
    }else{
        echo '<script>alert("ERROR: No se realizó el registro");history.go(-1);</script>';
        exit();
    }

}else{
    echo "<script>history.go(-1);</script>";
}
