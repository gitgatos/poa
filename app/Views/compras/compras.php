<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4"><?php echo $titulo; ?> </h3>
            <div>
                <p>
                    <a href="<?php echo base_url(); ?>/unidades/nuevo" class="btn btn-info">Agregar</a>
                    <a href="<?php echo base_url(); ?>/unidades/eliminados" class="btn btn-warning">Eliminados</a>
                </p>
            </div>

            <div class="card mb-4">

                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Nombre corto</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Nombre corto</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($datos as $dato) { ?>
                                <tr>
                                    <td><?php echo $dato['id']; ?></td>
                                    <td><?php echo $dato['nombre']; ?></td>
                                    <td><?php echo $dato['nombre_corto']; ?></td>

                                    <td><a href="<?php echo base_url() . '/unidades/editar/' . $dato['id']; ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a> </td>

                                    <td><button data-bs-id="<?php echo $dato['id'] ?>" data-bs-nombreid="<?php echo $dato['nombre'] ?>" data-bs-toggle="modal" data-bs-target="#modalconfirma" class="btn btn-danger">
                                            <i class="far fa-trash-alt"></i></button> </td>

                                </tr>

                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>




    <!-- Modal -->
    <div class="modal fade" id="modalconfirma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Eliminar Registro <span></span> </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Seguro que desea eliminar este registro?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-bs-dismiss="modal">NO</button>
                    <form id="modelForm" data-bs-action="<?php echo base_url() . '/unidades/eliminar/' ?>" action="" method="post">
                        <button type="submit" class="btn btn-danger">Si</button>
                    </form>
                </div>
            </div>
        </div>
    </div>