<?php
session_start();
if(!isset($_SESSION["ID"])){ 
    echo'<script>history.go(-1);</script>';
}
if (isset($_GET['id'])){

    include './../../conexion.php';
    
    //declaracion variables
    $id = $_GET['id'];

    //verificaciones
    $sql = "SELECT Nombre
        FROM usuario
        WHERE UsuarioID= '$id'";
        $res = mysqli_query($conectar, $sql);
        if($res){
            if(mysqli_num_rows($res) == 0){
                echo '<script>alert("ERROR:Este usuario no existe");history.go(-1);</script>';
                exit();
            }
        }

     //borrado de BD
     $update = "DELETE FROM usuario
     WHERE UsuarioID='$id'";
     $res = mysqli_query($conectar, $update);
     if($res){
         echo '<script>alert("EXITO AL ELIMINAR");window.location="./../usuarios.php";</script>';
         exit();
     }else{
         echo '<script>alert("ERROR: No se eliminó");history.go(-1);</script>';
         exit();
     }
 
}else{
    echo "<script>history.go(-1);</script>";
}
?>