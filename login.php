<?php
if (isset($_POST['name'])){

    include './conexion.php';
    
    //declaracion variables
    $name = $_POST['name'];
    $password = $_POST['password'];

    //verificaciones
    $sql = "SELECT Nombre
    FROM usuario
    WHERE Nombre= '$name'";
    $res = mysqli_query($conectar, $sql);
    if($res){
        if(mysqli_num_rows($res) == 0){
            echo '<script>alert("ERROR:Este usuario no existe");history.go(-1);</script>';
            exit();
        }
    }

    $sql = "SELECT UsuarioID, TipoUsuarioID
    FROM usuario
    WHERE Nombre= '$name' AND Clave= '$password'";
    $res = mysqli_query($conectar, $sql);
    if($res){
        if(mysqli_num_rows($res) == 0){
            echo '<script>alert("ERROR: Credenciales incorrectas");history.go(-1);</script>';
            exit();
        }
    }
    //datos de BD
    $datos=mysqli_fetch_assoc($res);
    $id=$datos['UsuarioID'];
    $tipo=$datos['TipoUsuarioID'];

    //ingreso
    session_start();
    $_SESSION['ID'] = $id;
    if($tipo == 2){
        echo "<script>alert('Has iniciado sesión como administrador');window.location='./admin/'</script>";
        exit();
    }

    echo "<script>alert('Has iniciado sesión');window.location='./index.php';</script>";
    exit();

}else{
    echo "<script>history.go(-1);</script>";
}