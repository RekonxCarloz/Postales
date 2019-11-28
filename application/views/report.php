</div>
<style>
    .opciones-btn a{
        margin-right: 30px;
    }
    .opciones-btn a:last-of-type {
        margin-right: 0;
    }
</style>
<main class="page">
    <section class="clean-block">
        <div class="container">
            <div class="block-heading">
                <h3 class="text-info text-center">Opciones de administrador</h3>
            </div>
            <div class="row">
                <div class="col-lg-12 btn-group opciones-btn justify-content-center">
                    <a href="<?=base_url()?>detalle"><button type="button" class="btn btn-primary" >Reporte de Postales</button></a>
                    <a href="<?=base_url()?>calificacion"><button type="button" class="btn btn-secondary" >Reporte de puntuaciones</button></a>
                    <a href="<?=base_url()?>usuarios"><button type="button" class="btn btn-info">Reporte Usuarios</button></a>
                </div>
            </div>
        </div>
    </section>
</main>