<?php

include("../conexion/db.php");
#Capturar los datos con get por medio del id para despues eliminar
$id=$_GET['id'];

$sql="DELETE FROM act_fijos WHERE id='$id'";
$query=mysqli_query($conexion,$sql);
#Si todo sale bien me actualizará datos en la misma ventana
    if($query){
        header("Location: ../../views/views_admin/index.php");
    }
?>