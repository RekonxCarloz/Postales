</div>
<main class="page">
    <section class="clean-block features">
        <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Información general</h2>
                </div>
                <div class="row justify-content-center">
                    <table class="table table-responsive">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">Nombre completo</th>
                            <th scope="col">Email</th>
                            <th scope="col">Celular</th>
                            <th scope="col">Sexo</th>
                            <th scope="col">Fecha de Nacimiento</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th scope="row"><?= $datos[0]; ?></th>
                            <td><?= $datos[1]; ?></td>
                            <td><?= $datos[2]; ?></td>
                            <td><?= $datos[3]; ?></td>
                            <td><?= $datos[4]; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="block-heading">
                    <h2 class="text-info">Historial de tus postales</h2>
                    <p>Las postales que has enviado son:</p>
                </div>
                <div class="row justify-content-center">
                    <table class="table table-responsive table-info table-bordered">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">La enviaste a</th>
                            <th scope="col">Fecha y Hora</th>
                            <th scope="col">Categoría</th>
                            <th scope="col">Postal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if($enviadas != null)
                                    foreach ($enviadas->result() as $fila) { ?>
                            <tr>
                            <th scope="row"><?= $fila->emailDestinatario; ?></th>
                            <td><?= $fila->fecha; ?></td>
                            <td><?= $fila->nombre; ?></td>
                            <td class="w-25"><img src="<?= base_url().$fila->ruta; ?>" class="img-fluid rounded"></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="block-heading" style="padding-top:30px;">
                    <p>Las postales que has recibido son:</p>
                </div>
                <div class="row justify-content-center">
                    <table class="table table-responsive table-warning table-bordered">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">Te la envió</th>
                            <th scope="col">Fecha y Hora</th>
                            <th scope="col">Categoría</th>
                            <th scope="col">Postal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if($recibidas != null)
                                    foreach ($recibidas->result() as $fila) { ?>
                            <tr>
                            <th scope="row"><?= $fila->email; ?></th>
                            <td><?= $fila->fecha; ?></td>
                            <td><?= $fila->nombre; ?></td>
                            <td class="w-25"><img src="<?= base_url().$fila->ruta; ?>" class="img-fluid rounded"></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>
