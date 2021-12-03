<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4"><?php echo $titulo; ?></h3>

            <?php if(isset($validation)){?>
                <div class="alert alert-danger" <?php echo $validation->listErrors();?>>
                </div>
            <?php } ?>

            <form method="POST" action="<?php echo base_url(); ?>/usuarios/actualizar" autocomplete="off">

            <input type="hidden" id="id" name="id" value="<?php echo $usuario['id'];?>">

                <div class="form-group">
                    <div class="row">
                    <div class="col-12 col-sm-6">
                            <label for="">Usuario</label>
                            <input class="form-control" id="usuario" name="usuario" type="text" 
                            value="<?php echo $usuario['usuario']?>" required autofocus />
                        </div>

                        <div class="col-12 col-sm-6">
                            <label for="">Nombre</label>
                            <input class="form-control" id="nombre" name="nombre" type="text" 
                            value="<?php echo $usuario['nombre'];?>" required />

                        </div>

                    </div>
                </div>

                <div>
                    <br>
                </div>

                <div class="form-group">
                    <div class="row">

                        <div class="col-12 col-sm-6">
                            <label for="">Password</label>
                            <input class="form-control" id="password" name="password" type="password" 
                            value="<?php echo set_value('password')?>" required  />
                        </div>

                        <div class="col-12 col-sm-6">
                            <label for="">Confirma password</label>
                            <input class="form-control" id="repassword" name="repassword" type="password" 
                            value="<?php echo set_value('repassword')?>" required />
                        </div>
                        
                    </div>
                </div>

                <div>
                    <br>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">

                            <label for="">Caja</label>
                            <select class="form-control" name="id_caja" id="id_caja" required>
                                <option value="">Seleccionar caja</option>
                                <?php foreach ($cajas as $caja) { ?>
                                    <option value="<?php echo $caja['id']; ?>"
                                    <?php if($caja['id'] == $usuario['id_caja']){ echo 'selected';}?>>
                                    <?php echo $caja['nombre']; ?></option>
                                <?php } ?>
                            </select>

                        </div>
                        <div class="col-12 col-sm-6">

                            <label for="">Rol</label>
                            <select class="form-control" name="id_roles" id="id_roles" required>
                                <option value="">Seleccionar rol</option>
                                <?php foreach ($roles as $rol) { ?>
                                    <option value="<?php echo $rol['id']; ?>"
                                    <?php if($rol['id'] == $usuario['id_roles']){ echo 'selected';}?>>
                                    <?php echo $rol['nombre']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div>
                    <br>
                </div>

                <a href="<?php echo base_url();?>/usuarios" class="btn btn-primary">Regresar</a>
                <button type="submit" class="btn btn-success">Guardar</button>
            </form>

        </div>
    </main>