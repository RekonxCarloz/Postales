<?php
    require_once __DIR__ . '/vendor/autoload.php';
    require_once __DIR__ . '/HTMLpdf.php';

    $plantilla= getPlantilla();
    $mpdf = new \Mpdf\Mpdf();
   
    //$mpdf->WriteHTML($css,\Mpdf\HTMLParserMode::HEADER_CSS);
    $mpdf->WriteHTML($plantilla);
    
    $mpdf->Output();
?>