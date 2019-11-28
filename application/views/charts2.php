<?php
		//categorias
	$porcentaje = 0;
        foreach ($categorias->result() as $key) {
			$porcentaje += $key->rating;
		}
		
?>
</div>
<main class="page">
    <section class="clean-block features">
        <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Categorías mas puntuadas</h2>
                </div>
                <div class="row justify-content-center table-responsive">
                    <table class="table">
                        <thead class="thead-dark text-sm-center">
                            <tr>
                            <th scope="col">Categoría</th>
                            <th scope="col">Rating</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm-center">
                            <?php foreach ($categorias->result() as $key) { ?>
                            <tr>
                            <td class="align-middle"><?= $key->nombre; ?></td>
                            <td class="align-middle"><?= (($key->rating)*100)/$porcentaje; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="block-heading">
                    <h2 class="text-info">Postales mas puntuadas</h2>
                </div>
                
               
                <div class="row justify-content-center table-responsive">
                    <table class="table table-info table-bordered">
                        <thead class="thead-dark text-sm-center">
                            <tr>
                            <th scope="col">Postal</th>
                            <th scope="col">Rating</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm-center">
                            <?php foreach ($postales->result() as $fila) { ?>
                            <tr>
                            <td class="align-middle"><?= $fila->nombre; ?></td>
                            <td class="align-middle"><?= $fila->rating; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

    </main>
