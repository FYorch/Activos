<?php

include("../../includes/conexion/db.php");

$id=$_POST['id'];
$clave = $_POST['clave'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$unidad = $_POST['unidad'];
$num_parte = $_POST['num_parte'];
$descripcion = $_POST['descripcion'];
$presentacion = $_POST['presentacion'];
$grupo = $_POST['grupo'];
$tipo = $_POST['tipo'];
$precio = $_POST['precio'];
$notas = $_POST['notas'];


$sql="UPDATE products SET 
clave='$clave',
marca='$marca',
modelo='$modelo', 
unidad='$unidad', 
num_parte='$num_parte', 
descripcion='$descripcion',
presentacion='$presentacion',
grupo='$grupo', 
tipo='$tipo',
precio='$precio',
notas='$notas'
WHERE id='$id' ";
$query=mysqli_query($conexion,$sql);

    if($query){
        header("Location: ../../views/views_admin/index.php");
    }
?> 