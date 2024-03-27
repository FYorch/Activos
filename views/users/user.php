<?php 
include "../../includes/php/header.php"; 
include("../../includes/conexion/db.php");

$sql = "SELECT * FROM tbl_users";

if (isset($_POST['buscar'])) {
    $nombre = $_POST['nombre'];
    $sql = "SELECT * FROM tbl_users WHERE tx_nombre LIKE '%$nombre%' OR tx_apellidoPaterno LIKE '%$nombre%' OR tx_apellidoMaterno LIKE '%$nombre%' OR tx_correo LIKE '%$nombre%' OR tx_username LIKE '%$nombre%'";
}

if (isset($_POST['filtro'])) {
    $nombre = $_POST['nombre'];
    switch ($_POST['filtro']) {
        case 'M_todos':
            $sql = "SELECT * FROM tbl_users";
            break;
        case 'D_nombre':
            $sql = "SELECT * FROM tbl_users WHERE tx_nombre LIKE '%$nombre%'";
            break;
        case 'F_apellido':
            $sql = "SELECT * FROM tbl_users WHERE tx_apellidoPaterno LIKE '%$nombre%'";
            break;
    }
}

$query = mysqli_query($conexion, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <title>Administradores</title>
   <meta charset="UTF-8">
</head>
<!-- <body background="../Imagenes/gby.jpg" width="2500" weight="1000"><br>
    <style>
        .buscador {
            border-radius: 1px;
            padding: 10px;
        }
        .btn-warning {
            background-color: #794e0f;
            border-color: #8b8b8a00;
        }
    </style> -->

<div class="container-fluid p-5">
    <div class="row align-items-center buscador">
        <div class="container-row"></div>
        <div class="col-5">
            <form class="d-flex" method="POST">
                <input class="form-control me-2" type="search" placeholder="Datos a buscar" name="nombre" style="border: 1px solid #ccc; color: white;">
                <button class="btn btn-warning" type="submit" name="buscar"><b style="color: white;">Buscar</b></button>
            </form>
        </div>
        <div class="col"></div>
    </div>
    <div class="row">
        <div class="col-12 p-2">
            <table class="table text-start align-middle table-bordered table-hover mb-1 bg-secondary">
                <thead class="text-white">
                    <tr>
                        <th>N</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Apellido Paterno</th>
                        <th class="text-center">Apellido Materno</th>
                        <th class="text-center">Correo</th>
                        <th class="text-center">Usuario</th>
                        <th class="text-center">Contraseña</th>
                        <th class="text-center">Tipo de Usuario</th>
                        <th class="text-center">Fecha</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="">
                    <?php
                    while ($row = mysqli_fetch_array($query)) {
                        $M = $row['id_tipousuario'];
                        ?>
                        <tr>
                            <th><?php echo $row['id'] ?></th>
                            <th><?php echo $row['tx_nombre'] ?></th>
                            <th><?php echo $row['tx_apellidoPaterno'] ?></th>
                            <th><?php echo $row['tx_apellidoMaterno'] ?></th>
                            <th><?php echo $row['tx_correo'] ?></th>
                            <th><?php echo $row['tx_username'] ?></th>
                            <th><?php echo $row['tx_password'] ?></th>
                            <th><?php echo ($M == 1) ? 'admin' : 'users'; ?></th>
                            <th><?php echo $row['dt_registros'] ?></th>
                            <th><a href="update.php?id=<?php echo $row['id'] ?>" class="btn btn-success">Editar</a></th>
                            <th><a href="../../includes/php/delete_users.php?id=<?php echo $row['id'] ?>&tabla=tbl_users" class="btn btn-danger">Eliminar Usuarios</a></th>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div>
   <!-- Button trigger modal -->
   <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
       Agregar nuevo
   </button>

   <!-- Modal -->
   <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog">
           <div class="modal-content">
              
           <div class="modal-header bg-info">
                   <h1 class="modal-title fs-5" id="exampleModalLabel">Registros de Usuarios</h1>
                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body p-6 p-2 text-dark ">
                   <h3 class="text-dark">Datos requeridos</h3>
                   <form action="insert.php" method="POST">
                       <label for="..">Nombre:</label>
                       <input type="text" class="form-control mb-3" name="tx_nombre" placeholder="Nombre" required="True">
                       <label for="..">Apellido Paterno:</label>
                       <input type="text" class="form-control mb-3" name="tx_apellidoPaterno" placeholder="Apellido Paterno">
                       <label for="..">Apellido Materno:</label>
                       <input type="text" class="form-control mb-3" name="tx_apellidoMaterno" placeholder="Apellido Materno">
                       <label for="..">Correo:</label>
                       <input type="text" class="form-control mb-3" name="tx_correo" placeholder="Correo" required="True">
                       <label for="..">Usuario:</label>
                       <input type="text" class="form-control mb-3" name="tx_username" placeholder="Username" required="True">
                       <label for="..">Contraseña:</label>
                       <input type="password" class="form-control mb-3" name="tx_password" placeholder="Contraseña">
                       <select name="id_tipousuario" id="">
                           <option value="1">Administrador</option>
                           <option value="2">Usuario</option>
                       </select>
                       <input type="submit" class="btn btn-info">
                   </form>
               </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cerrar</button>
               </div>
           </div>
       </div>
   </div>
</div>

<!-- PDF -->
<div class="row align-items-center">
   <div class="col"></div>
   <div class="col"></div>
   <div class="col"></div>
   <div class="col"></div>
   <div class="col"></div>
   <div class="col">
       <button type="button" class="btn btn-danger" onclick="location.href='gpdf.php'">
           Generar PDF
       </button>
   </div>
</div>
<br>
<!-- FIN-PDF -->

<!-- Resto del código HTML y JavaScript -->

<?php include "../../includes/php/footer.php"; ?>
</body>
</html>