<div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title" id="exampleModalLabel">AGREGAR PRODUCTO FIJO</h3>
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    <i class="fa fa-times" aria-hidden="true"></i></button>
            </div>
            <div class="modal-body">

                <form action="../../includes/php/upload.php" method="POST" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label"> Código</label>
                                <input type="text" id="codigo" name="codigo" class="form-control" required>

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
                                <label for="nombre" class="form-label">Clave</label>
                                <input type="text" id="clave" name="clave" class="form-control" required>
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
                                <label for="nombre" class="form-label">Serie</label>
                                <input type="text" id="serie" name="serie" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Existencia</label>
                                <input type="number" id="existencia" name="existencia" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Usuarios</label>
                                <input type="text" id="usuarios" name="usuarios" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Costo $</label>
                                <input type="text" id="costo" name="costo" class="form-control" required>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="mb-3">
                            <label for="nombre">Selecciona lugar:</label>
                                    <!-- Utiliza la etiqueta <select> para crear la selección de opciones -->
                                    <select id="lugar" name="lugar" required>
                                        <!-- Utiliza la etiqueta <option> para cada opción dentro de la selección -->
                                        <option value="Alta">Planta alta</option>
                                        <option value="Baja">Planta baja</option>
                                        <option value="Fuera">Fuera de oficina</option>
                                        <!-- Puedes agregar más opciones según sea necesario -->
                                    </select>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="mb-3">
                            <label for="categoria">Categoría:</label>

                                <?php
                                // Conexión a la base de datos (reemplaza con tus propias credenciales)
                                $conexion = new mysqli("localhost", "root", "", "kge");

                                // Verificar la conexión
                                if ($conexion->connect_error) {
                                    die("Error en la conexión: " . $conexion->connect_error);
                                }

                                // Consultar categorías existentes
                                $result = $conexion->query("SELECT DISTINCT categoria FROM act_fijos");

                                echo "<select name='categoria' id='categoria'>";
                                echo "<option value='' disabled selected>Selecciona una categoría</option>";

                                while ($row = $result->fetch_assoc()) {
                                    $categoria = $row['categoria'];
                                    echo "<option value='$categoria'>$categoria</option>";
                                }

                                echo "</select>";

                                // Cerrar la conexión
                                $conexion->close();
                                ?>

                                <br>

                                <label for="nueva_categoria">Nueva Categoría (si no existe):</label>
                                <input type="text" id="nueva_categoria" name="nueva_categoria">

                            </div>
                        </div>
                    </div>


                    <div class="mb-3">
                        <label for="imagen" class="form-label">Imagen</label>
                        <input type="file" name="imagen" id="imagen" class="form-control" required>
                    </div>


                    <div class="col-12">
                        <label for="yourPassword" class="form-label">Archivo (WORD & PDF)</label>
                        <input type="file" name="factura" id="factura" class="form-control" required>

                    </div>

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