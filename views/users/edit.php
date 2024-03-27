<?php

include("../../includes/conexion/db.php");

$id=$_POST['id'];
$tx_nombre=$_POST['tx_nombre'];
$tx_apellidoPaterno=$_POST['tx_apellidoPaterno'];
$tx_apellidoMaterno=$_POST['tx_apellidoMaterno'];
$tx_correo=$_POST['tx_correo'];
$tx_username=$_POST['tx_username'];
$tx_password=$_POST['tx_password'];
$id_tipousuario=$_POST['id_tipousuario'];

$sql="UPDATE tbl_users SET tx_nombre='$tx_nombre',tx_apellidoPaterno='$tx_apellidoPaterno',
tx_apellidoMaterno='$tx_apellidoMaterno', tx_correo='$tx_correo', tx_username='$tx_username', tx_password='$tx_password',
id_tipousuario='$id_tipousuario' WHERE id='$id' ";
$query=mysqli_query($conexion,$sql);

    if($query){
        header("Location: user.php");
    }
?> 