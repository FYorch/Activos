<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARCHIVOS FIJOS ADMINISTRADOR</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
</head>

<body>
                
    <br>

    <div class="container">
        <div class="col-sm-12">
            <h2 style="text-align: center;">PRODUCTOS DE ARCHIVOS FIJOS USUARIOS</h2>
            <br>
            <br>
            <form action="../../includes/php/exit.php" method="post">
                <input type="SUBMIT" value="Cerrar Sesi&oacute;n" />
            </form>

            <div class="container">
            <style>
        .styled-table {
            width: 90%;
            border-collapse: collapse;
            margin: 20px 60px;
            font-size: 18px;
            text-align: left;
        }

        .styled-table th, .styled-table td {
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
        }

        .styled-table th {
            background-color: #5B89E4;
        }

        .styled-table tbody tr:hover {
            background-color: #ddd;
        }

        h4 {
        margin: 30px 60px; /* Centra el texto horizontalmente */
        color: #5B89E4;     /* Cambia el color del texto a azul */
        }
    </style>

            </div>
        </div>
    </div>
</body>
<style>
    a {
        text-decoration: none;
    }

    .s {
        padding-top: 50px;
        text-align: center;
    }
</style>

<footer>
</footer>

</html>

<?php
include("../../includes/conexion/db.php");

// Obtener categorías únicas de la base de datos
$result = $conexion->query("SELECT DISTINCT categoria FROM act_fijos");
$categorias = [];

while ($row = $result->fetch_assoc()) {
    $categorias[] = $row['categoria'];
}

// Generar tablas HTML para cada categoría y realizar consultas
foreach ($categorias as $categoria) {
    echo "<h4>$categoria</h4>";

    // Consultar elementos de la categoría actual
    $query = "SELECT id, codigo, marca, clave, descripcion, serie, existencia, usuarios, costo, factura FROM act_fijos WHERE categoria = '$categoria'";
    $result = $conexion->query($query);

    // Verificar si hay resultados
    if ($result->num_rows > 0) {
        echo "<table class='styled-table'>";
        echo "<thead><tr>
                        <th>ID</th>
                        <th>Codigo</th>
                        <th>Marca</th>
                        <th>Clave</th>
                        <th>Descripcion</th>
                        <th>Serie</th>
                        <th>Existencia</th>
                        <th>Usuarios</th>
                        <th>Costo $</th>
                        <th>Factura</th>
                        <th>Descargar</th>
                     </tr></thead>";
        echo "<tbody>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['codigo'] . "</td>";
            echo "<td>" . $row['marca'] . "</td>";
            echo "<td>" . $row['clave'] . "</td>";
            echo "<td>" . $row['descripcion'] . "</td>";
            echo "<td>" . $row['serie'] . "</td>";
            echo "<td>" . $row['existencia'] . "</td>";
            echo "<td>" . $row['usuarios'] . "</td>";
            echo "<td>" . $row['costo'] . "</td>";
            echo "<td>" . $row['factura'] . "</td>";
            echo "<td><a href='../includes/download.php?id=" . $row['id'] . "'><button class='btn btn-primary'><i class='fas fa-download'></i></button></a></td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
    } else {
        echo "No hay elementos en esta categoría.";
    }
}

$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla Estilizada</title>
    
</head>
<body>
    <!-- Resto de tu HTML si es necesario -->
</body>
</html>