</div>

<main class="page">
    <section class="clean-block">
        <div class="container">
        <div class="block-heading">
          <br>
            <h3 class="text-info">Reporte Semanal de iPostal</h3>
        </div>
            <div id="chartContainer" style="height: 300px; width: 100%;"></div>
        <br><br><br><br><br><br><br>
			<div id="chartContainer2" style="height: 300px; width: 100%;"></div>
			<div class="row block-heading">
				<a href="<?=base_url();?>reportePDF/graficas"><button class="col-xs-6 btn btn-primary">Generar PDF</button></a>
			</div>
        </div>
    </section>
</main>

<script>

<?php
		//categorias
	$porcentaje = 0;
        foreach ($categorias->result() as $key) {
			$porcentaje += $key->rating;
		}
		//Porcentaje ahora tiene el numero de puntiaciones totales
        $dataPoints = array(4);
        for($i = 0 ; $i < 4 ; $i++) {

            $dataPoints[$i] = array("label"=> $categorias->result()[$i]->nombre, "y"=> (($categorias->result()[$i]->rating)*100/$porcentaje));
		}

		//postales
		$x = 0;
		$dataPoints2 = array(5);
        for($i = 0 ; $i < 5 ; $i++) {
			$x++;
			$dataPoints2[$i] = array("x"=> $x, "y"=> $postales->result()[$i]->rating, "indexLabel" => $postales->result()[$i]->nombre);


		}
?>



window.onload = function() {

var chart2 = new CanvasJS.Chart("chartContainer2", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Postal Más Gustada"
	},
	data: [{
		type: "column", //change type to bar, line, area, pie, etc
		//indexLabel: "{y}", //Shows y value on all Data Points
		indexLabelFontColor: "#5A5757",
		indexLabelPlacement: "outside",
		dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
	}]
});
chart2.render();



var chart = new CanvasJS.Chart("chartContainer", {
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	exportEnabled: true,
	animationEnabled: true,
	title: {
		text: "Categoría Más Gustada"
	},
	data: [{
		type: "pie",
		startAngle: 25,
		toolTipContent: "<b>{label}</b>: {y}%",
		showInLegend: "true",
		legendText: "{label}",
		indexLabelFontSize: 16,
		indexLabel: "{label} - {y}%",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();

}

</script>
