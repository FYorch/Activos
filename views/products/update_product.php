<?php

include("../../includes/conexion/db.php");

$id=$_GET['id'];

$sql="SELECT * FROM products WHERE id='$id' ";
$query=mysqli_query($conexion,$sql);

$row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <title>Actualizar</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        
    </head>
    <body> <br><br>
            <div class="row align-items-center">
                <h5 class="text-center">ACTUALIZAR PRODUCTOS GENERALES</h5>
             <div class="col"></div>
                    <div class="col-5">
                        <form action="edit_product.php" method="POST">
                    
                                    <input type="hidden" name="id" value="<?php echo $row['id']  ?>">
                                    <label for="..">Clave:</label>
                                    <input type="text" class="form-control mb-3" name="clave" placeholder="Clave" value="<?php echo $row['clave'] ?> ">
                                    <label for="..">Marca</label>
                                    <input type="text" class="form-control mb-3" name="marca" placeholder="Marca" value="<?php echo $row['marca'] ?> ">
                                    <label for="..">Modelo</label>
                                    <input type="text" class="form-control mb-3" name="modelo" placeholder="Modelo" value="<?php echo $row['modelo'] ?> ">
                                    <label for="..">Unidad</label>
                                    <input type="text" class="form-control mb-3" name="unidad" placeholder="Unidad" value="<?php echo $row['unidad'] ?> ">
                                    <label for="..">Numero de parte</label>
                                    <input type="text" class="form-control mb-3" name="num_parte" placeholder="Num_parte" value="<?php echo $row['num_parte'] ?> ">
                                    <label for="..">Descripcion</label>
                                    <input type="text" class="form-control mb-3" name="descripcion" placeholder="Descripcion" value="<?php echo $row['descripcion'] ?> ">
                                    <label for="..">Presentacion</label>
                                    <input type="text" class="form-control mb-3" name="presentacion" placeholder="Presentacion" value="<?php echo $row['presentacion'] ?> ">
                                    <label for="..">Tipo</label>
                                    <input type="text" class="form-control mb-3" name="tipo" placeholder="Tipo" value="<?php echo $row['tipo'] ?> ">
                                    <label for="..">Precio</label>
                                    <input type="text" class="form-control mb-3" name="precio" placeholder="Precio" value="<?php echo $row['precio'] ?> ">
                                    <label for="..">Notas</label>
                                    <input type="text" class="form-control mb-3" name="notas" placeholder="Notas" value="<?php echo $row['notas'] ?> ">
                                    <label for="..">Grupo</label>
                                    <input type="text" class="form-control mb-3" name="grupo" placeholder="Grupo" value="<?php echo $row['grupo'] ?> ">  
                                    <!--<label for="nombre">Selecciona lugar:</label>
                                     Utiliza la etiqueta <select> para crear la selección de opciones -->
                                    <!--<select id="lugar" name="lugar" required>
                                     Utiliza la etiqueta <option> para cada opción dentro de la selección 
                                        <option value="Alta">Planta alta</option>
                                        <option value="Baja">Planta baja</option>
                                        <option value="Fuera">Fuera de oficina</option>-->
                                        <!-- Puedes agregar más opciones según sea necesario 
                                    </select>  -->                          
                                    
                                <input type="submit" class="btn btn-warning btn-block" value="Actualizar">
                                
                        </form>

                        <form action="../../views/views_admin/index.php">
                            <input type="submit" class="btn btn-danger btn-block" value="Cancelar">
                        </form>
      
                        
                        
                    </div>
                    <div class="col"></div>
            </div>
    </body>
</html>