<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4"><?php echo $titulo; ?> </h3>
            <div>
                <p>
                    <a href="<?php echo base_url(); ?>/productos" class="btn btn-warning">Productos</a>
                </p>
            </div>

            <div class="card mb-4">

                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Codigo</th>
                                <th>Precio</th>
                                <th>Existencias</th>
                                <th></th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Codigo</th>
                                <th>Precio</th>
                                <th>Existencias</th>
                                <th></th>

                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($datos as $dato) { ?>
                                <tr>
                                    <td><?php echo $dato['id']; ?></td>
                                    <td><?php echo $dato['nombre']; ?></td>
                                    <td><?php echo $dato['codigo']; ?></td>
                                    <td><?php echo $dato['precio_venta']; ?></td>
                                    <td><?php echo $dato['existencias']; ?></td>


                                    <td><a href="<?php echo base_url() . '/productos/reingresar/' . $dato['id']; ?>" class="btn btn-warning"><i class="fas fa-upload"></i></a> </td>



                                </tr>

                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>