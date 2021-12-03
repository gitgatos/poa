<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4"><?php echo $titulo; ?> </h3>
            <?php if (isset($validation)) { ?>
                <div class="alert alert-danger" <?php echo $validation->listErrors(); ?>>
                </div>
            <?php } ?>


            <form method="POST" action="<?php echo base_url(); ?>/configuraciones/actualizar" autocomplete="off">
                <?php csrf_field(); ?>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">

                            <label for="">Nombre de la tienda</label>
                            <input class="form-control" id="tienda_nombre" name="tienda_nombre" type="text" 
                            value="<?php echo $nombre['valor'];?>" required autofocus />

                        </div>
                        <div class="col-12 col-sm-6">

                            <label for="">RFC</label>
                            <input class="form-control" id="tienda_rfc" name="tienda_rfc" type="text" 
                            value="<?php echo $rfc['valor'];?>" required />

                        </div>
                    </div>
                </div>

                <div>
                    <br>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">

                            
                            <label for="">Correo</label>
                            <input class="form-control" id="tienda_email" name="tienda_email" type="text" 
                            value="<?php echo $email['valor']; ?>" required />

                        </div>
                        <div class="col-12 col-sm-6">

                            <label for="">Telefono</label>
                            <input class="form-control" id="tienda_telefono" name="tienda_telefono" type="text"
                            value="<?php echo $telefono['valor']; ?>" required />

                        </div>
                    </div>
                </div>

                <div>
                    <br>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">

                        <label for="">Direccion</label>
                            <textarea class="form-control" name="tienda_direccion" id="tienda_direccion"  required><?php echo $direccion['valor']; ?></textarea>

                        </div>
                        <div class="col-12 col-sm-6">

                            <label for="">Leyenda del ticket</label>
                            <textarea class="form-control" name="ticket_leyenda" id="ticket_leyenda"  required><?php echo $leyenda['valor']; ?></textarea>

                        </div>
                    </div>
                </div>

                <div>
                    <br>
                </div>

                <div>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>

            </form>
        </div>

    </main>




    