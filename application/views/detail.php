</div>
<main class="page">
    <section class="clean-block features">
        <div class="container">

                <div class="block-heading">
                    <h2 class="text-info">Actividad de envíos de los usuarios</h2>
                    <p>Cantidad de postales enviadas: <?=$numero;?></p>
                </div>

                <div class="row justify-content-center table-responsive">
                    <table class="table table-condensed table-bordered">
                        <thead class="thead-dark text-sm-center">
                            <tr>
                            <th scope="col">De</th>
                            <th scope="col">Fecha de envío</th>
                            <th scope="col">Para</th>
                            <th scope="col">Postal</th>
                            <th scope="col">Categoría</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm-center">
                            <?php 
                            if($postal != null)
                                    foreach ($postal->result() as $fila) { ?>
                            <tr>
                            <td class="align-middle"><?= $fila->email; ?></th>
                            <td class="align-middle"><?= $fila->fecha; ?></td>
                            <td class="align-middle"><?= $fila->emailDestinatario; ?></td>
                            <td class="align-middle w-25"><img src="<?= base_url().$fila->ruta; ?>" class="img-fluid rounded"></td>
                            <td class="align-middle"><?= $fila->nombre; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <a href="#"><button class="col-xs-6 btn btn-primary">Generar PDF</button></a>
                </div>
            </div>
        </section>
    </main>
