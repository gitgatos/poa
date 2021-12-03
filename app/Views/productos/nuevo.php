<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid ">
            <h3 class="mt-4"><?php echo $titulo; ?> </h3>

            <?php if (isset($validation)) { ?>
                <div class="alert alert-danger" <?php echo $validation->listErrors(); ?>>
                </div>
            <?php } ?>

            <form method="POST" action="<?php echo base_url(); ?>/productos/insertar" autocomplete="off">
                
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">

                            <label for="">Codigo</label>
                            <input class="form-control" id="codigo" name="codigo" type="text" autofocus  />

                        </div>
                        <div class="col-12 col-sm-6">

                            <label for="">Nombre</label>
                            <input class="form-control" id="nombre" name="nombre" type="text"  />

                        </div>
                    </div>
                </div>

                <div>
                    <br>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">

                            <label for="">Unidad</label>
                            <select class="form-control" name="id_unidad" id="id_unidad" required>
                                <option value="">Seleccionar unidad</option>
                                <?php foreach ($unidades as $unidad) { ?>
                                    <option value="<?php echo $unidad['id']; ?>">
                                        <?php echo $unidad['nombre']; ?></option>
                                <?php } ?>
                            </select>

                        </div>
                        <div class="col-12 col-sm-6">

                            <label for="">Categoria</label>
                            <select class="form-control" name="id_categoria" id="id_categoria" required>
                                <option value="">Seleccionar categoria</option>
                                <?php foreach ($categorias as $categoria) { ?>
                                    <option value="<?php echo $categoria['id']; ?>">
                                        <?php echo $categoria['nombre']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div>
                    <br>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">

                            <label for="">Precio de compra</label>
                            <input class="form-control" id="precio_compra" name="precio_compra" type="text" required />

                        </div>
                        <div class="col-12 col-sm-6">

                            <label for="">Precio de venta</label>
                            <input class="form-control" id="precio_venta" name="precio_venta" type="text" required />

                        </div>
                    </div>
                </div>

                <div>
                    <br>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">

                            <label for="">Estock minimo</label>
                            <input class="form-control" id="stock_minimo" name="stock_minimo" type="text" required />

                        </div>
                        <div class="col-12 col-sm-6">

                            <label for="">Es inventariable</label>
                            <select name="inventariable" id="inventariable" class="form-control">
                                <option value="1">Si</option>
                                <option value="0">No</option>
                            </select>

                        </div>
                    </div>
                </div>

                <div>
                    <br>
                </div>

                <div>
                    <a href="<?php echo base_url(); ?>/productos" class="btn btn-primary">Regresar</a>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>

            </form>

        </div>
    </main>