<?php

// Comprobar si se ha cargado un archivo
if (isset($_FILES['factura'])) {
    extract($_POST);
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
    $nueva_categoria = $_POST['nueva_categoria'];
    $imagen = $_POST['imagen'];

    // Definir la carpeta de destino
    $carpeta_destino = "../files/";

    // Obtener el nombre y la extensión del archivo
    $nombre_archivo = basename($_FILES["factura"]["name"]);
    $extension = strtolower(pathinfo($nombre_archivo, PATHINFO_EXTENSION));


    // Obtener el nombre y la extensión de la imagen
    $nombre_imagen = basename($_FILES["imagen"]["name"]);
    $extension_imagen = strtolower(pathinfo($nombre_imagen, PATHINFO_EXTENSION));


    // Definir la carpeta de destino para la imagen
    $carpeta_imagen = "../img/";





     // Validar la extensión de la imagen
     if ($extension_imagen == "jpg" || $extension_imagen == "jpeg" || $extension_imagen == "png"  || $extension_imagen == "webp") {
        // Mover la imagen a la carpeta de destino
        if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $carpeta_imagen . $nombre_imagen)) {
            // Agregar el nombre de la imagen a la base de datos
            include "../conexion/db.php";


                if (!empty($nueva_categoria)) {
                    // Validar la extensión del archivo
                        if ($extension == "pdf" || $extension == "doc" || $extension == "docx") {


                            // Mover el archivo a la carpeta de destino
                            if (move_uploaded_file($_FILES["factura"]["tmp_name"], $carpeta_destino . $nombre_archivo)) {
                                // Insertar la información del archivo en la base de datos
                                include "../conexion/db.php";
                                $sqlnuevo = "INSERT INTO act_fijos (codigo, marca, clave, descripcion, serie, existencia, usuarios, costo, factura, imagen, lugar, categoria) 
                                VALUES ( '$codigo', '$marca', '$clave', '$descripcion', '$serie', '$existencia', '$usuarios', '$costo','$nombre_archivo', '$nombre_imagen', '$lugar', '$nueva_categoria')";
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
                                include "../conexion/db.php";
                                $sql = "INSERT INTO act_fijos (codigo, marca, clave, descripcion, serie, existencia, usuarios, costo, factura, imagen, lugar, categoria) 
                                VALUES ( '$codigo', '$marca', '$clave', '$descripcion', '$serie', '$existencia', '$usuarios', '$costo','$nombre_archivo', '$nombre_imagen', '$lugar', '$categoria')";
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