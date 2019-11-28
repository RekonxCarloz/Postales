
</div>
<main class="page">
    <section class="clean-block features">
        <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Información general</h2>
                </div>
                <div class="row justify-content-center table-responsive">
                    <table class="table">
                        <thead class="thead-dark text-sm-center">
                            <tr>
                            <th scope="col">Nombre completo</th>
                            <th scope="col">Email</th>
                            <th scope="col">Celular</th>
                            <th scope="col">Sexo</th>
                            <th scope="col">Fecha de Nacimiento</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm-center">
                            <tr>
                            <th scope="row" class="align-middle"><?= $datos[0]; ?></th>
                            <td class="align-middle"><?= $datos[1]; ?></td>
                            <td class="align-middle"><?= $datos[2]; ?></td>
                            <td class="align-middle"><?= $datos[3]; ?></td>
                            <td class="align-middle"><?= $datos[4]; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="block-heading">
                    <h2 class="text-info">Historial de tus postales</h2>
                    <p>Las postales que has enviado son:</p>
                </div>
                
               
                <div class="row justify-content-center table-responsive">
                    <table class="table table-info table-bordered">
                        <thead class="thead-dark text-sm-center">
                            <tr>
                            <th scope="col">La enviaste a</th>
                            <th scope="col">Fecha y Hora</th>
                            <th scope="col">Categoría</th>
                            <th scope="col">Postal</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm-center">
                            <?php 
                            if($enviadas != null)
                                    foreach ($enviadas->result() as $fila) { ?>
                            <tr>
                            <th scope="row" class="align-middle"><?= $fila->emailDestinatario; ?></th>
                            <td class="align-middle"><?= $fila->fecha; ?></td>
                            <td class="align-middle"><?= $fila->nombre; ?></td>
                            <td class="align-middle w-25"><img src="<?= base_url().$fila->ruta; ?>" class="img-fluid rounded"></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="block-heading" style="padding-top:30px;">
                    <p>Las postales que has recibido son:</p>
                </div>
              
                <div class="row justify-content-center table-responsive">
                    <table class="table table-warning table-bordered">
                        <thead class="thead-dark text-sm-center">
                            <tr>
                            <th scope="col">Te la envió</th>
                            <th scope="col">Fecha y Hora</th>
                            <th scope="col">Categoría</th>
                            <th scope="col">Postal</th>
                            <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm-center">
                            <?php 
                            if($recibidas != null)
                                    foreach ($recibidas->result() as $fila) { ?>
                            <tr>
                            <th scope="row" class="align-middle"><?= $fila->email; ?></th>
                            <td class="align-middle"><?= $fila->fecha; ?></td>
                            <td class="align-middle"><?= $fila->nombre; ?></td>
                            <td class="align-middle w-25"><img src="<?= base_url().$fila->ruta; ?>" class="img-fluid rounded"></td>
                            <td class="align-middle">
                                <div class="col-sm" align="center" id="btnenv">
                                    <i class="fas fa-file-pdf fa-2x"></i><br>
                                    <button class="btn btn-success btnGenerar">Generar PDF</button>
                                </div>
                            </td>
                            
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

    </main>

    <script>
        
        $(document).on('click','.btnGenerar',function(){
            fila = $(this).closest("tr");
            fecha = fila.find('td:eq(0)').text(); //Guarda en la variable fecha el valor de 
            window.location.href = '<?=base_url()?>ReportePDF/postalRecibida/'+fecha;
            //la columna fecha (La segunda) y la fila en la que se clickeo el boton generar
            /*$.ajax({
                url: "<?=base_url()?>ReportePDF/postalRecibida",
                type: "POST",
                dataType: 'json',
                data: {fecha:fecha},
                cache: false,
                success: function (respAX) {
                    alert(respAX.fecha);
                }
            });*/
                       
        });

    </script>
