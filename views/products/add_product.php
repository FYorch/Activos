<div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title" id="exampleModalLabel">AGREGAR PRODUCTO GENERAL</h3>
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    <i class="fa fa-times" aria-hidden="true"></i></button>
            </div>
            <div class="modal-body">

                <form action="upload_product.php" method="POST" enctype="multipart/form-data">

                    <div class="row">


                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Clave</label>
                                <input type="number" id="clave" name="clave" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Marca</label>
                                <input type="text" id="marca" name="marca" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Modelo</label>
                                <input type="text" id="modelo" name="modelo" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Unidad</label>
                                <input type="text" id="unidad" name="unidad" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Num parte</label>
                                <input type="text" id="num_parte" name="num_parte" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Descripción</label>
                                <input type="text" id="descripcion" name="descripcion" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Presentacion</label>
                                <input type="text" id="presentacion" name="presentacion" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Tipo</label>
                                <input type="text" id="tipo" name="tipo" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Precio $</label>
                                <input type="text" id="precio" name="precio" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Notas</label>
                                <input type="text" id="notas" name="notas" class="form-control" required>
                            </div>
                        </div>



                        <div class="col-sm-6">
                            <div class="mb-3">
                            <label for="grupo">Grupo:</label>

                                <?php
                                // Conexión a la base de datos (reemplaza con tus propias credenciales)
                                $conexion = new mysqli("localhost", "root", "", "kge");

                                // Verificar la conexión
                                if ($conexion->connect_error) {
                                    die("Error en la conexión: " . $conexion->connect_error);
                                }

                                // Consultar categorías existentes
                                $result = $conexion->query("SELECT DISTINCT grupo FROM products");

                                echo "<select name='grupo' id='grupo'>";
                                echo "<option value='' disabled selected>Seleccione un grupo</option>";

                                while ($row = $result->fetch_assoc()) {
                                    $grupo = $row['grupo'];
                                    echo "<option value='$grupo'>$grupo</option>";
                                }

                                echo "</select>";

                                // Cerrar la conexión
                                $conexion->close();
                                ?>

                                <br>

                                <label for="nuevo_grupo">Nuevo grupo (si no existe):</label>
                                <input type="text" id="nuevo_grupo" name="nuevo_grupo">

                            </div>
                        </div>
                    </div>


                     <!-- Agregar campo para cargar imagen -->
                     <div class="mb-3">
                        <label for="imagen" class="form-label">Imagen</label>
                        <input type="file" name="imagen" id="imagen" class="form-control" required>
                    </div>




                    <div class="col-12">
                        <label for="yourPassword" class="form-label">Archivo (WORD & PDF)</label>
                        <input type="file" name="factura" id="factura" class="form-control" required>
                    <br>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="register" name="registrar">Guardar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>

            </div>

            </form>
        </div>
    </div>
</div>