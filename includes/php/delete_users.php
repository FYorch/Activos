<?php
// Conexión a la base de datos (reemplaza 'localhost', 'usuario', 'contraseña', 'basededatos' según corresponda)
$conn = new mysqli('localhost', 'root', '', 'kge');

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Verificar si se proporcionó un parámetro de tabla y ID
if (isset($_GET['tabla']) && isset($_GET['id'])) {
    $tabla = $_GET['tabla'];
    $id = $_GET['id'];

    // Inicializar la variable de consulta
    $sql = "";

    // Construir la consulta según la tabla proporcionada
    switch ($tabla) {
        case 'tbl_users':
            $sql = "DELETE FROM tbl_users WHERE id = ?";
            break;
        case 'act_fijos':
            $sql = "DELETE FROM act_fijos WHERE id = ?";
            break;
        default:
            echo "Tabla no válida.";
            exit;
    }

    // Preparar la consulta
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        echo "Error al preparar la consulta: " . $conn->error;
        exit;
    }

    // Vincular parámetros y ejecutar la consulta
    $stmt->bind_param("i", $id);
    if (!$stmt->execute()) {
        echo "Error al ejecutar la consulta: " . $stmt->error;
        exit;
    }

        header("Location: ../../views/users/user.php");

    // Cerrar la declaración
    $stmt->close();
} else {
    echo "No se proporcionó un parámetro de tabla o ID.";
}

// Cerrar conexión
$conn->close();
?>
