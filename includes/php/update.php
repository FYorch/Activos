<?php

include("../conexion/db.php");

$id=$_GET['id'];

$sql="SELECT * FROM act_fijos WHERE id='$id' ";
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
                <h5 class="text-center">ACTUALIZAR PRODUCTOS FIJOS</h5>
             <div class="col"></div>
                    <div class="col-5">
                        <form action="edit.php" method="POST">
                    
                                    <input type="hidden" name="id" value="<?php echo $row['id']  ?>">
                                    <label for="..">Código:</label>
                                    <input type="text" class="form-control mb-3" name="codigo" placeholder="Codigo" value="<?php echo $row['codigo'] ?> ">
                                    <label for="..">Marca</label>
                                    <input type="text" class="form-control mb-3" name="marca" placeholder="Marca" value="<?php echo $row['marca'] ?> ">
                                    <label for="..">Clave</label>
                                    <input type="text" class="form-control mb-3" name="clave" placeholder="Clave" value="<?php echo $row['clave'] ?> ">
                                    <label for="..">Descripción</label>
                                    <input type="text" class="form-control mb-3" name="descripcion" placeholder="Descripcion" value="<?php echo $row['descripcion'] ?> ">
                                    <label for="..">Serie</label>
                                    <input type="text" class="form-control mb-3" name="serie" placeholder="Serie" value="<?php echo $row['serie'] ?> ">
                                    <label for="..">Existencia</label>
                                    <input type="text" class="form-control mb-3" name="existencia" placeholder="Existencia" value="<?php echo $row['existencia'] ?> ">
                                    <label for="..">Usuarios</label>
                                    <input type="text" class="form-control mb-3" name="usuarios" placeholder="Usuarios" value="<?php echo $row['usuarios'] ?> ">
                                    <label for="..">Costo $</label>
                                    <input type="text" class="form-control mb-3" name="costo" placeholder="Costo" value="<?php echo $row['costo'] ?> ">
                                    <label for="..">Existencia</label>
                                    <input type="text" class="form-control mb-3" name="existencia" placeholder="Existencia" value="<?php echo $row['existencia'] ?> ">
                                    <label for="..">Categoria</label>
                                    <input type="text" class="form-control mb-3" name="categoria" placeholder="Categoria" value="<?php echo $row['categoria'] ?> ">  
                                    <label for="nombre">Selecciona lugar:</label>
                                    <!-- Utiliza la etiqueta <select> para crear la selección de opciones -->
                                    <select id="lugar" name="lugar" required>
                                        <!-- Utiliza la etiqueta <option> para cada opción dentro de la selección -->
                                        <option value="Alta">Planta alta</option>
                                        <option value="Baja">Planta baja</option>
                                        <option value="Fuera">Fuera de oficina</option>
                                        <!-- Puedes agregar más opciones según sea necesario -->
                                    </select>                            
                                    
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