<?php
if (isset($_GET['id'])) {
    $producto_id = $_GET['id'];
    
    // Conexión a la base de datos
    $conexion = new mysqli("localhost", "root", "", "kge");

    // Verificar conexión
    if ($conexion->connect_error) {
        die("Error en la conexión: " . $conexion->connect_error);
    }

    // Consulta para eliminar el producto según el ID proporcionado
        $sql = "DELETE FROM products WHERE id = $producto_id";
        if ($conexion->query($sql) === TRUE) {
            echo "Producto eliminado exitosamente.";
            // Redirigir a la página deseada después de eliminar el producto
            header("Location: products.php");
            exit; // Asegura que el script se detenga después de la redirección
        } else {
            echo "Error al eliminar el producto: " . $conexion->error;
        }

    // Cerrar conexión
    $conexion->close();
} else {
    echo "No se ha proporcionado un ID de producto.";
}
?>
