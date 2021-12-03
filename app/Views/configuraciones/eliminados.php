<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4"><?php echo $titulo; ?> </h3>
            <div>
                <p>
                    <a href="<?php echo base_url(); ?>/unidades" class="btn btn-warning">Unidades</a>
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
                                
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Nombre corto</th>
                                <th></th>
                                
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($datos as $dato) { ?>
                                <tr>
                                    <td><?php echo $dato['id']; ?></td>
                                    <td><?php echo $dato['nombre']; ?></td>
                                    <td><?php echo $dato['nombre_corto']; ?></td>

                                    <td><a href="<?php echo base_url(). '/unidades/reingresar/'.$dato 
                                    ['id']; ?>" class="btn btn-warning"><i class="fas fa-upload"></i></a> </td>

                                    

                                </tr>

                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>