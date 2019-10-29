<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Inicio - iPostal</title>
    <meta name="description" content="Proyecto Tecnologías para la Web. Postales">
    <link rel="stylesheet" href="<?php base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="<?php base_url(); ?>assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="<?php base_url(); ?>assets/css/validetta/validetta.min.css">
    <link rel="stylesheet" href="<?php base_url(); ?>assets/css/smoothproducts.css">
    <link rel="stylesheet" href="<?php base_url(); ?>assets/css/headerPostalCategory.css">
    <link rel="stylesheet" href="<?php base_url(); ?>assets/confirm/dist/jquery-confirm.min.css">

    <script src="<?php base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="<?php base_url(); ?>assets/js/validetta/validetta.min.js"></script>
    <script src="<?php base_url(); ?>assets/js/validetta/validettaLang-es-ES.js"></script>
    <script src="<?php base_url(); ?>assets/js/smoothproducts.min.js"></script>
    <script src="<?php base_url(); ?>assets/js/theme.js"></script>
    <script src="<?php base_url(); ?>assets/confirm/dist/jquery-confirm.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#formRegistro").validetta({
                bubblePosition: 'bottom',
                bubbleGapTop: 10,
                bubbleGapLeft: -5,
                onValid:function(e){
                    e.preventDefault();
                    $.ajax({
                        method:"POST",
                        url:"<?php base_url(); ?>Procesamiento/registroAjax",
                        data:$("#formRegistro").serialize(),
                        cache:false,
                        success:function(respAX){
                            var tipoAlerts = new Array("red","green");
                            var AX = JSON.parse(respAX);
                            $.alert({
                                title:"<h4 class='text-info'>Estado del registro:</h4>",
                                content:AX.msj,
                                type:tipoAlerts[AX.val],
                                onDestroy:function(){
                                    window.location.replace("index.php");
                                }
                            });
                        }
                    });
                }
            });
        });
    </script>
</head>
