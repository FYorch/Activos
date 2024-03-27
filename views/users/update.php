<?php

include("../../includes/conexion/db.php");

$id=$_GET['id'];

$sql="SELECT * FROM tbl_users WHERE id='$id' ";
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
                <h5 class="text-center">ACTUALIZAR DATOS</h5>
             <div class="col"></div>
                    <div class="col-5">
                        <form action="edit.php" method="POST">
                    
                                    <input type="hidden" name="id" value="<?php echo $row['id']  ?>">
                                    <label for="..">Nombre:</label>
                                    <input type="text" class="form-control mb-3" name="tx_nombre" placeholder="Nombre" value="<?php echo $row['tx_nombre'] ?> ">
                                    <label for="..">Apellido Paterno</label>
                                    <input type="text" class="form-control mb-3" name="tx_apellidoPaterno" placeholder="Apellido Paterno" value="<?php echo $row['tx_apellidoPaterno'] ?> ">
                                    <label for="..">Apellido Materno</label>
                                    <input type="text" class="form-control mb-3" name="tx_apellidoMaterno" placeholder="Apellido Materno" value="<?php echo $row['tx_apellidoMaterno'] ?> ">
                                    <label for="..">Correo</label>
                                    <input type="text" class="form-control mb-3" name="tx_correo" placeholder="Correo Electronico" value="<?php echo $row['tx_correo'] ?> ">
                                    <label for="..">Usuario</label>
                                    <input type="text" class="form-control mb-3" name="tx_username" placeholder="Usuario" value="<?php echo $row['tx_username'] ?> ">
                                    <label for="..">Contraseña</label>
                                    <input type="password" class="form-control mb-3" name="tx_password" placeholder="Contraseña" value="<?php echo $row['tx_password'] ?> ">
                                    <select name="id_tipousuario" id="" class="btn btn-success">
                                        <option value="1">Administrador</option>
                                        <option value="2">Usuario</option>
                                    </select>
                                    
                                    
                                <input type="submit" class="btn btn-warning btn-block" value="Actualizar">
                                <input type="submit" href="Administradores.php" class="btn btn-danger btn-block" value="Cancelar">

                            
                               
                        </form>
                        
                    </div>
                    <div class="col"></div>
            </div>
    </body>
</html>