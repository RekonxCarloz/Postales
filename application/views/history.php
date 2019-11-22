</div>
<main class="page">
        <section class="clean-block features">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Postales enviadas</h2>
                    <p>Las postales que has enviado son:</p>
                </div>
                <div class="row justify-content-center">
                    <table class="table table-responsive table-active table-bordered table-hover">
                        <thead>
                            <tr class="table-secondary">
                            <th scope="col">Destinatario</th>
                            <th scope="col">Fecha y Hora</th>
                            <th scope="col">Categoría</th>
                            <th scope="col">Postal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($enviadas->result() as $fila) { ?>
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
                <div class="block-heading">
                    <h2 class="text-info">Postales recibidas</h2>
                    <p>Las postales que has recibido son:</p>
                </div>
            </div>
        </section>
    </main>
