</div>
<main class="page">
    <section class="clean-block">
        <div class="container">
            <div class="block-heading">
                <h3 class="text-info text-center">Gesti&oacute;n de Usuarios</h3>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <button id="btnNuevo" type="button" class="btn btn-success" style="margin-bottom:20px;">Agregar</button>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table id="tablaPersonas" class="table table-striped table table-condensed" style="width:100%">
                            <thead class="text-sm-center">
                                <tr>
                                    <th scope="row" class="align-middle">Id</th>
                                    <th scope="row" class="align-middle">Nombre</th>
                                    <th scope="row" class="align-middle">Email</th>
                                    <th scope="row" class="align-middle">Celular</th>
                                    <th scope="row" class="align-middle">Sexo</th>
                                    <th scope="row" class="align-middle">Fecha de Nacimiento</th>
                                    <th scope="row" class="align-middle">Tipo de Usuario</th>
                                    <th scope="row" class="align-middle">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm-center">
                                    <?php 
                                    if($tabla != null)
                                            foreach ($tabla->result() as $fila) { ?>
                                            <tr>
                                                <td class="align-middle"><?=$fila->idUsuario;?></td>
                                                <td class="align-middle"><?=$fila->nombre;?></td>
                                                <td class="align-middle"><?=$fila->email;?></td>
                                                <td class="align-middle"><?=$fila->celular;?></td>
                                                <td class="align-middle"><?=$fila->genero = ($fila->genero == 'm')?"Masculino":"Femenino";?></td>
                                                <td class="align-middle"><?=$fila->fechaNac;?></td>
                                                <td class="align-middle"><?=$fila->privilegio = ($fila->privilegio == 1)?"Administrador":"Usuario";?></td>
                                                <td class="align-middle"></td>
                                            </tr>
                                    <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<!--Modal para CRUD-->
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formPersonas">    
                <div class="modal-body">
                    <div class="form-group">
                    <label for="nombre" class="col-form-label">Nombre Completo:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" data-validetta="required">
                    </div>
                    <div class="form-group">
                    <label for="email" class="col-form-label">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" data-validetta="required,email,maxLength[32]">
                    </div>
                    <div class="form-group">
                        <label for="password">Contrase&ntilde;a</label>
                        <input class="form-control item" type="password" id="password" name="password" data-validetta="required,minLength[5],maxLength[32]">
                    </div>                
                    <div class="form-group">
                    <label for="mobile" class="col-form-label">M&oacute;vil:</label>
                    <input type="tel" class="form-control" id="mobile" name="mobile" data-validetta="required,number,minLength[10],maxLength[10]">
                    </div>
                    <div class="form-group"><label class="col-form-label" for="gender">Sexo:</label></div>
                        <div class="form-group form-check">
                            <input class="form-check-input" type="radio" id="gender" name="gender" value="m" checked>
                            <label class="form-check-label" for="gender">
                                Masculino
                            </label>
                        </div>
                        <div class="form-group form-check">
                            <input class="form-check-input" type="radio" id="gender2" name="gender" value="f">
                            <label class="form-check-label" for="gender2">
                                Femenino
                            </label>
                        </div>            
                    <div class="form-group">
                        <label for="date" class="col-form-label">Fecha de Nacimiento</label>
                        <input class="form-control" type="date" id="date" name="date" data-validetta="required">
                    </div>
                    <div class="form-group"><label class="col-form-label" for="privilegio">Privilegio:</label></div>
                        <div class="form-group form-check">
                            <input class="form-check-input" type="radio" id="privilegio" name="privilegio" value="0" checked>
                            <label class="form-check-label" for="privilegio">
                                Usuario
                            </label>
                        </div>
                        <div class="form-group form-check">
                            <input class="form-check-input" type="radio" id="privilegio2" name="privilegio" value="1">
                            <label class="form-check-label" for="privilegio2">
                                Administrador
                            </label>
                        </div>            
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                    <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
                </div>
            </form>    
        </div>
    </div>
</div> 

<script src="<?=base_url();?>assets/js/crud.js"></script>