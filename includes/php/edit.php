<?php

include("../conexion/db.php");

$id=$_POST['id'];
$codigo = $_POST['codigo'];
$marca = $_POST['marca'];
$clave = $_POST['clave'];
$descripcion = $_POST['descripcion'];
$serie = $_POST['serie'];
$existencia = $_POST['existencia'];
$usuarios = $_POST['usuarios'];
$costo = $_POST['costo'];
$lugar = $_POST['lugar'];
$categoria = $_POST['categoria'];
//$nueva_categoria = $_POST['nueva_categoria'];

$sql="UPDATE act_fijos SET 
codigo='$codigo',
marca='$marca',
clave='$clave', 
descripcion='$descripcion', 
serie='$serie', 
existencia='$existencia',
usuarios='$usuarios',
costo='$costo', 
lugar='$lugar',
categoria='$categoria'
WHERE id='$id' ";
$query=mysqli_query($conexion,$sql);

    if($query){
        header("Location: ../../views/views_admin/index.php");
    }
?> 