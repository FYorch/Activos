<?php

// Comprobar si se ha cargado un archivo
if (isset($_FILES['factura'])) {
    extract($_POST);
    $clave = $_POST['clave'];
    $marca = $_POST['marca'];  
    $modelo = $_POST['modelo'];
    $unidad = $_POST['unidad'];
    $num_parte = $_POST['num_parte'];
    $descripcion = $_POST['descripcion'];
    $presentacion = $_POST['presentacion'];
    $tipo = $_POST['tipo'];
    $precio = $_POST['precio'];
    $notas = $_POST['notas'];
    $grupo = $_POST['grupo'];
    $imagen = $_POST['imagen'];
    //$nuevo_grupo = $_POST['nuevo_grupo'];

    // Definir la carpeta de destino
    $carpeta_destino = "../../includes/files/";


    // Obtener el nombre y la extensión del archivo
    $nombre_archivo = basename($_FILES["factura"]["name"]);
    $extension = strtolower(pathinfo($nombre_archivo, PATHINFO_EXTENSION));

    // Obtener el nombre y la extensión de la imagen
    $nombre_imagen = basename($_FILES["imagen"]["name"]);
    $extension_imagen = strtolower(pathinfo($nombre_imagen, PATHINFO_EXTENSION));


    // Definir la carpeta de destino para la imagen
    $carpeta_imagen = "../../includes/img/";


    if ($extension_imagen == "jpg" || $extension_imagen == "jpeg" || $extension_imagen == "png") {
        // Mover la imagen a la carpeta de destino
        if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $carpeta_imagen . $nombre_imagen)) {
            // Agregar el nombre de la imagen a la base de datos
            include "../../includes/conexion/db.php";
            // Aquí deberías adaptar tu código para insertar el nombre de la imagen en la base de datos junto con otros datos del formulario
            // Ejemplo:
            
    if (!empty($nuevo_grupo)) {
        // Validar la extensión del archivo
            if ($extension == "pdf" || $extension == "doc" || $extension == "docx") {


                // Mover el archivo a la carpeta de destino
                if (move_uploaded_file($_FILES["factura"]["tmp_name"], $carpeta_destino . $nombre_archivo)) {
                    // Insertar la información del archivo en la base de datos
                    include "../../includes/conexion/db.php";
                    $sqlnuevo = "INSERT INTO products (clave, marca, modelo, unidad, num_parte, descripcion, presentacion, grupo, tipo, precio, imagen, notas, factura) 
                    VALUES ( '$clave', '$marca', '$modelo', '$unidad', '$num_parte', '$descripcion', '$presentacion', '$nuevo_grupo','$tipo', '$precio', '$nombre_imagen', '$notas', '$nombre_archivo')";
                    $resultado = mysqli_query($conexion, $sqlnuevo);
                    if ($resultado) {
                        echo "<script language='JavaScript'>
                        alert('Archivo Subido');
                        location.assign('../../views/views_admin/index.php');
                        </script>";
                    } else {

                        echo "<script language='JavaScript'>
                        alert('Error al subir el archivo: ');
                        location.assign('../../views/views_admin/agregar.php');
                        </script>";
                    }
                } else {
                    echo "<script language='JavaScript'>
                    alert('Error al subir el archivo. ');
                    location.assign('../views/index.php');
                    </script>";
                }
            } else {
                echo "<script language='JavaScript'>
                alert('Solo se permiten archivos PDF, DOC y DOCX.');
                location.assign('../views/index.php');
                </script>";
            }
    } else {
                // Validar la extensión del archivo
            if ($extension == "pdf" || $extension == "doc" || $extension == "docx") {


                // Mover el archivo a la carpeta de destino
                if (move_uploaded_file($_FILES["factura"]["tmp_name"], $carpeta_destino . $nombre_archivo)) {
                    // Insertar la información del archivo en la base de datos
                    include "../../includes/conexion/db.php";
                    $sql = "INSERT INTO products (clave, marca, modelo, unidad, num_parte, descripcion, presentacion, grupo, tipo, precio, imagen, notas, factura) 
                    VALUES ( '$clave', '$marca', '$modelo', '$unidad', '$num_parte', '$descripcion', '$presentacion', '$grupo','$tipo', '$precio', '$nombre_imagen', '$notas', '$nombre_archivo')";
                    $resultado = mysqli_query($conexion, $sql);
                    if ($resultado) {
                        echo "<script language='JavaScript'>
                        alert('Archivo Subido');
                        location.assign('../../views/views_admin/index.php');
                        </script>";
                    } else {

                        echo "<script language='JavaScript'>
                        alert('Error al subir el archivo: ');
                        location.assign('../../views/views_admin/index.php');
                        </script>";
                    }
                } else {
                    echo "<script language='JavaScript'>
                    alert('Error al subir el archivo. ');
                    location.assign('../../views/views_admin/index.php');
                    </script>";
                }
            } else {
                echo "<script language='JavaScript'>
                alert('Solo se permiten archivos PDF, DOC y DOCX.');
                location.assign('../../views/views_admin/index.php');
                </script>";
            }
    }
}

        }
    }

















    

