<?php
include("../../includes/conexion/db.php");

$tx_nombre = $_POST['tx_nombre'];
$tx_apellidoPaterno = $_POST['tx_apellidoPaterno'];
$tx_apellidoMaterno = $_POST['tx_apellidoMaterno'];
$tx_correo = $_POST['tx_correo'];
$tx_username = $_POST['tx_username'];
$tx_password = $_POST['tx_password'];
$id_tipousuario = $_POST['id_tipousuario'];

// Consulta SQL sin el campo "id"
$sql = "INSERT INTO tbl_users (tx_nombre, tx_apellidoPaterno, tx_apellidoMaterno,
        tx_correo, tx_username, tx_password, id_tipousuario, dt_registros)
        VALUES ('$tx_nombre', '$tx_apellidoPaterno', '$tx_apellidoMaterno',
        '$tx_correo', '$tx_username', '$tx_password', '$id_tipousuario', NOW())";

$query = mysqli_query($conexion, $sql);

if ($query) {
    header("Location: user.php");
} else {
    echo "Error al insertar en la base de datos.";
}
?>
