<?php
    require_once("c://xampp/htdocs/proyecto/view/head/head.php");
    require_once("c://xampp/htdocs/proyecto/controller/usernameController.php");
    $obj = new usernameController();
    $rows = $obj->index();
?>
<div class="table-responsive"> <!-- Agregamos esta clase para hacer la tabla responsiva -->
    <table class="table table-striped table-hover">
        <thead class="table-dark"> <!-- Encabezado de la tabla con fondo oscuro -->
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Dirección</th> <!-- Corregimos la ortografía -->
                <th scope="col">Teléfono</th>
                <th scope="col">Correo Electrónico</th> <!-- Espacios entre palabras -->
                <th scope="col">Estado</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if($rows): ?>
                <?php foreach($rows as $row): ?>
                    <tr>
                        <td><?= $row[0] ?></td>
                        <td><?= $row[1] ?></td>
                        <td><?= $row[2] ?></td>
                        <td><?= $row[3] ?></td>
                        <td><?= $row[4] ?></td>
                        <td><?= $row[5] ?></td>
                        <td>
                            <!-- Botón para abrir el modal de ver -->
                            <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#viewModal<?=$row[0]?>">Ver</button>
                            <!-- Modal de ver -->
                            <div class="modal fade" id="viewModal<?=$row[0]?>" tabindex="-1" aria-labelledby="viewModalLabel<?=$row[0]?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="viewModalLabel<?=$row[0]?>">Detalles del usuario</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Id:</strong> <?= $row[0] ?></p>
                                            <p><strong>Nombre:</strong> <?= $row[1] ?></p>
                                            <p><strong>Dirección:</strong> <?= $row[2] ?></p>
                                            <p><strong>Teléfono:</strong> <?= $row[3] ?></p>
                                            <p><strong>Correo Electrónico:</strong> <?= $row[4] ?></p>
                                            <p><strong>Estado:</strong> <?= $row[5] ?></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Botón para abrir el modal de editar -->
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?=$row[0]?>">Modificar</button>
                            <!-- Modal de editar -->
                            <div class="modal fade" id="editModal<?=$row[0]?>" tabindex="-1" aria-labelledby="editModalLabel<?=$row[0]?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel<?=$row[0]?>">Modificar usuario</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="edit.php?id=<?= $row[0] ?>" method="post">
                                                <div class="mb-3">
                                                    <label for="nombre" class="form-label">Nombre</label>
                                                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $row[1] ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="direccion" class="form-label">Dirección</label>
                                                    <input type="text" class="form-control" id="direccion" name="direccion" value="<?= $row[2] ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="telefono" class="form-label">Teléfono</label>
                                                    <input type="text" class="form-control" id="telefono" name="telefono" value="<?= $row[3] ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="correo" class="form-label">Correo Electrónico</label>
                                                    <input type="email" class="form-control" id="correo" name="correo" value="<?= $row[4] ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="estado" class="form-label">Estado</label>
                                                    <input type="text" class="form-control" id="estado" name="estado" value="<?= $row[5] ?>" required>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Botón para abrir el modal de eliminar -->
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?=$row[0]?>">Eliminar</button>
                            <!-- Modal de confirmación de eliminación -->
                            <div class="modal fade" id="deleteModal<?=$row[0]?>" tabindex="-1" aria-labelledby="deleteModalLabel<?=$row[0]?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel<?=$row[0]?>">¿Desea eliminar el registro?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Una vez eliminado no se podrá recuperar el registro.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <a href="delete.php?id=<?= $row[0]?>" class="btn btn-danger">Eliminar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" class="text-center">No hay registros actualmente</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<div class="mb-3 text-center"> <!-- Añadimos la clase "text-center" para centrar horizontalmente -->
    <a href="/proyecto/view/username/create.php" class="btn btn-info">Agregar nuevo usuario</a>
</div>
<?php
    require_once("c://xampp/htdocs/proyecto/view/head/footer.php");
?>