<?php include "../../includes/php/header.php"; ?>

<?php
// Evitar cacheo de página
#header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
#header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Fecha en el pasado
// Si no hay una sesión iniciada, redireccionar al inicio o a donde desees
#if (!isset($_SESSION['usuario'])) {
#    header("Location: ../../index.php");
#    exit;
#}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
       
    </style>
    <title>ARCHIVOS FIJOS ADMINISTRADOR</title>
    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
</head>
<body>
    <br>
    <div class="container-fluid p-5">
        <div class="col-sm-12">
            <h2 style="text-align: center;">PRODUCTOS GENERALES</h2>
            <br>
            <div>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#agregar">Agregar</button>
                <a href="../views_admin/index.php" class="btn btn-primary">Activos fijos</a>
            </div>
            <br>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php
                // Conexión a la base de datos (reemplaza con tus propias credenciales)
                $conexion = new mysqli("localhost", "root", "", "kge");
                // Verificar la conexión
                if ($conexion->connect_error) {
                    die("Error en la conexión: " . $conexion->connect_error);
                }
                // Obtener categorías únicas de la base de datos
                $result_categorias = $conexion->query("SELECT DISTINCT grupo FROM products");
                // Verificar si hay resultados
                if ($result_categorias->num_rows > 0) {
                    while ($row_categoria = $result_categorias->fetch_assoc()) {
                        $categoria_actual = $row_categoria['grupo'];
                        echo "<div class='table-responsive'>";
                        echo "<h4>$categoria_actual</h4>";
                        // Consultar elementos de la categoría actual
                        $query = "SELECT id, clave, marca, clave, modelo, unidad, num_parte, descripcion, presentacion, grupo, tipo, precio, imagen, notas, factura FROM products WHERE grupo = '$categoria_actual'";
                        $result_categoria = $conexion->query($query);
                        // Verificar si hay resultados
                        if ($result_categoria->num_rows > 0) {
                            echo "<div class='table-responsive'>";
                            echo "<table class='table text-start align-middle table-bordered table-hover mb-1 bg-secondary'>";
                            echo "<thead><tr class='text-white'>
                                        <th>Clave</th>
                                        <th>Marca</th>
                                        <th>Modelo</th>
                                        <th>Unidad</th>
                                        <th>N° de parte</th>                                     
                                        <th>Presentación</th>
                                        <th>Grupo</th>
                                        <th>Tipo</th>
                                        <th>Precio</th>
                                    </tr></thead>";
                                    echo "<br>"; /* editado */
                            echo "<tbody>";
                           
                            while ($fila = $result_categoria->fetch_assoc()) {
                                echo "<tr class='fila-seleccionable' data-id='" . $fila['id'] . "' data-descripcion='" . $fila['descripcion'] . "' data-factura='" . $fila['factura'] . "'>";
                                echo "<td>" . $fila['clave'] . "</td>";
                                echo "<td>" . $fila['marca'] . "</td>";
                                echo "<td>" . $fila['modelo'] . "</td>";                      
                                echo "<td>" . $fila['unidad'] . "</td>";
                                echo "<td>" . $fila['num_parte'] . "</td>";                                  
                                echo "<td>" . $fila['presentacion'] . "</td>";
                                echo "<td>" . $fila['grupo'] . "</td>";
                                echo "<td>" . $fila['tipo'] . "</td>";                      
                                echo "<td>" . $fila['precio'] . "</td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";
                        } else {
                            echo "No hay elementos en esta categoría.";
                        }
                        echo "</div>";
                    }
                } else {
                    echo "No hay categorías disponibles.";
                }
                $conexion->close();
                ?>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            // Manejar clic en filas seleccionables
            $(".fila-seleccionable").click(function () {
                // Obtener datos de la fila seleccionada
                var id = $(this).data("id");
                var descripcion = $(this).data("descripcion");
                var factura = $(this).data("factura");
                // Abrir una nueva ventana con los detalles del producto
                window.open("detalle_producto.php?id=" + id, "_blank");
            });
        });
    </script>
</body><br><br>
<?php include "../../includes/php/footer.php"; ?>
<?php include "add_product.php"; ?>
</html>