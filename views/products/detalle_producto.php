<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Producto</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="../../includes/css/D_prod.css">

    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <style>
        
    </style>
</head>

<body>

    <div class="container">
        <?php
        // Verificar si se ha proporcionado un ID de producto
        if (isset($_GET['id'])) {
            $producto_id = $_GET['id'];

            // Conexión a la base de datos
            $conexion = new mysqli("localhost", "root", "", "kge");

            // Verificar conexión
            if ($conexion->connect_error) {
                die("Error en la conexión: " . $conexion->connect_error);
            }

            // Consulta para obtener los detalles del producto según el ID proporcionado
            $sql = "SELECT * FROM products WHERE id = $producto_id";
            $resultado = $conexion->query($sql);

            // Verificar si se encontró el producto
            if ($resultado->num_rows > 0) {
                $producto = $resultado->fetch_assoc();

                // Mostrar detalles del producto
                echo "<div class='producto-image'>";
                echo "<img src='../../includes/img/{$producto['imagen']}' alt='Imagen del Producto' width='400px' heigth='70'>";
                echo "</div>";

                echo "<div class='producto-detalles'>";
                echo "<h2>Detalles del Producto</h2>";
                //inicio de la primera fila 3 contenedores
                echo "<div class='container'>";
                echo "<div class='row'>";

                echo "<div class='col-6 col-sm-4'>";
                echo "<p><strong>ID:</strong> {$producto['id']}</p>";
                echo "</div>";
                echo "<div class='col-6 col-sm-4'>";
                echo "<p><strong>Clave:</strong> {$producto['clave']}</p>";
                echo "</div>";
                echo "<div class='col-6 col-sm-4'>";
                echo "<p><strong>Marca:</strong> {$producto['marca']}</p>";
                echo "</div>";
              
                echo "</div>";
                echo "</div>";

                // fin de primera fila tres contenedores

                 //inicio de la primera fila 3 contenedores
                 echo "<div class='container'>";
                 echo "<div class='row'>";
 
                 echo "<div class='col-6 col-sm-4'>";
                 echo "<p><strong>Modelo:</strong> {$producto['modelo']}</p>";
                 echo "</div>";
                 echo "<div class='col-6 col-sm-4'>";
                 echo "<p><strong>Unidad:</strong> {$producto['unidad']}</p>";
                 echo "</div>";
                 echo "<div class='col-6 col-sm-4'>";
                 echo "<p><strong>Número de Parte:</strong> {$producto['num_parte']}</p>";
                 echo "</div>"; 
                 echo "</div>";
                 echo "</div>";
 
                 // fin de primera fila tres contenedores

                 //inicio de la descripción y presentación en cuadros
                 echo "<div class='container'>";
                 echo "<div class='row'>";

                 echo "<div class='col-6 col-sm-6'>";
                 echo "<p><strong>Descripción:</strong> {$producto['descripcion']}</p>";
                 echo "</div>";
                 echo "<div class='col-6 col-sm-6'>";
                 echo "<p><strong>Presentación:</strong> {$producto['presentacion']}</p>";
                 echo "</div>";

                 echo "</div>";
                 echo "</div>";

                 // fin de la descripción y presentación en cuadros

                //inicio de la primera fila 3 contenedores
                echo "<div class='container'>";
                echo "<div class='row'>";

                echo "<div class='col-6 col-sm-4'>";
                echo "<p><strong>Grupo:</strong> {$producto['grupo']}</p>";
                echo "</div>";
                echo "<div class='col-6 col-sm-4'>";
                echo "<p><strong>Tipo:</strong> {$producto['tipo']}</p>";
                echo "</div>";
                echo "<div class='col-6 col-sm-4'>";
                echo "<p><strong>Precio:</strong> {$producto['precio']}</p>";
                echo "</div>"; 
                echo "</div>";
                echo "</div>";

                // fin de primera fila tres contenedores
                
                echo "<p><strong>Notas:</strong> {$producto['notas']}</p>";
                //echo "<p><strong>Factura:</strong> {$producto['factura']}</p>";
                echo "</div>";
            } else {
                echo "<p>Producto no encontrado.</p>";
            }

            echo "<th><a href='delete_products.php?id={$producto['id']}' class='btn btn-danger'>Eliminar Producto</a></th>";
            echo "<th><a href='update_product.php?id={$producto['id']}' class='btn btn-primary'>Editar</a></th>";
            echo "<th><a href='download_pdf.php?id={$producto['id']}' class='btn btn-success'>Descargar Factura</a></th>";


            // Cerrar conexión
            $conexion->close();
        } else {
            echo "<p>No se ha proporcionado un ID de producto.</p>";
        }
        ?>
    </div>

</body>

</html>