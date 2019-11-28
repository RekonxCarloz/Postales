</div>
<main class="page">
    <section class="clean-block features">
        <div class="container">

                <div class="block-heading">
                    <h2 class="text-info">La edad y sexo de nuestros usuarios</h2>
                </div>

                <div class="row justify-content-center table-responsive">
                    <table class="table table-condensed table-bordered">
                        <thead class="thead-dark text-sm-center">
                            <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Sexo</th>
                            <th scope="col">Edad</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm-center">
                            <?php 
                            if($usuario != null)
                                    foreach ($usuario->result() as $fila) { ?>
                            <tr>
                            <td class="align-middle"><?= $fila->nombre; ?></th>
                            <td class="align-middle"><?= $fila->genero; ?></td>
                            <td class="align-middle"><?= $fila->fechaNac; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <a href="<?=base_url();?>reportePDF/usuario"><button class="col-xs-6 btn btn-primary">Generar PDF</button></a>
                </div>
            </div>
        </section>
    </main>
