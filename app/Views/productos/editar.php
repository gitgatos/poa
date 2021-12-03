<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid ">
            <h3 class="mt-4"><?php echo $titulo; ?> </h3>
            <?php \Config\Services::validation()->listErrors();?>
            <form method="POST" action="<?php echo base_url();?>/productos/actulizar" autocomplete="off">
            <?php csrf_field();?>

                <input type="hidden" id="id" name="id" value="<?php echo $producto['id'];?>">

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">

                            <label for="">Codigo</label>
                            <input class="form-control" id="codigo" name="codigo" type="text"  value="<?php echo $producto['codigo'];?>" autofocus required/>

                        </div>
                        <div class="col-12 col-sm-6">

                            <label for="">Nombre</label>
                            <input class="form-control" id="nombre" name="nombre" type="text"
                            value="<?php echo $producto['nombre'];?>" required/>

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
                                    <option value="<?php echo $unidad['id'];?>"
                                    <?php if($unidad['id'] == $producto['id_unidad']){ echo 'selected';}?>>
                                    <?php echo $unidad['nombre'];?></option>
                                <?php } ?>
                           </select>

                        </div>
                        <div class="col-12 col-sm-6">

                            <label for="">Categoria</label>
                            <select class="form-control" name="id_categoria" id="id_categoria" required>
                               <option value="">Seleccionar categoria</option>
                               <?php foreach ($categorias as $categoria) { ?>
                                <option value="<?php echo $categoria['id'];?>"
                                <?php if($categoria['id'] == $producto['id_categoria']){ echo 'selected';}?>>
                                <?php echo $categoria['nombre'];?></option>
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
                            <input class="form-control" id="precio_compra" name="precio_compra" type="text"  value="<?php echo $producto['precio_compra'];?>"  required/>

                        </div>
                        <div class="col-12 col-sm-6">

                            <label for="">Precio de venta</label>
                            <input class="form-control" id="precio_venta" name="precio_venta" type="text"  value="<?php echo $producto['precio_venta'];?>"  required/>

                        </div>
                    </div>
                </div>

                <div>
                    <br>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">

                            <label for="">Stok minimo</label>
                            <input class="form-control" id="stock_minimo" name="stock_minimo" type="text"  value="<?php echo $producto['stock_minimo'];?>"  required/>

                        </div>
                        <div class="col-12 col-sm-6">

                            <label for="">Es inventariable</label>
                            <select name="inventariable" id="inventariable" class="form-control">
                                <option value="1"  <?php if($producto['inventariable'] == 1){ echo 'selected';}?> >Si</option>
                                <option value="0" <?php if($producto['inventariable'] == 0){ echo 'selected';}?> >No</option>
                            </select>

                        </div>
                    </div>
                </div>

                <div>
                    <br>
                </div>
                
                <div>
                <a href="<?php echo base_url();?>/productos" class="btn btn-primary">Regresar</a>
                <button type="submit" class="btn btn-success">Guardar</button>
                </div>
                
            </form>

        </div>
    </main>