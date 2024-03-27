<?php
include "../../includes/conexion/db.php";


// Obtener el nombre del archivo desde la URL
$id = $_GET['id'];

// Buscar el archivo en la base de datos
$sql = "SELECT * FROM products WHERE id = '$id'";
$resultado = mysqli_query($conexion, $sql);

if (mysqli_num_rows($resultado) == 1) {
    $fila = mysqli_fetch_assoc($resultado);
    $factura = $fila['factura'];
    $ruta_archivo = "../../includes/files/" . $factura;

    // Verificar que el archivo exista en el servidor
    if (file_exists($ruta_archivo)) {
        // Enviar el archivo al navegador
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $factura . '"');
        readfile($ruta_archivo);
    } else {
        echo "El archivo no existe en el servidor.";
    }
} else {
    echo "El archivo no se encontró en la base de datos.";
}
