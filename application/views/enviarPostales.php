</div>
<main class="page gallery-page">
    <section class="clean-block clean-gallery dark">
        <div class="container">
            <div class="block-heading" style="padding-top: 140px;">
            <form id="formMail">
                <h2 class="text-info">¡Redacta tu mensaje!</h2>
            </div>
                <textarea id="mensajePostal" name="mensajeiPostal"></textarea>
                <div class="row">
                    <div class="col-sm">
                    <br>
                    <img class="img-thumbnail img-fluid image" id="img1" src="<?=base_url().$imagen?>">
                </div>
            </div>
            <br>
            
            
            <div align="center" class="row">
                <div class="col-md-4 col-lg-6 item">
                    <i id="iconoW" class="fab fa-whatsapp fa-5x green-text"></i> Número de WhatsApp:
                    <input id="whats" name="whats" type="tel">
                </div>
                <div class="col-md-4 col-lg-6 item">
                    <i id="iconoM" class="fas fa-envelope-square fa-5x red-text"></i> Mail:
                    <input id="correo" name="correo" type="text">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 btn-group justify-content-center" id="btnenv">
                    <button id="env" class="btn btn-primary" type="submit">Enviar</button>
                    <button class="btn btn-warning" type="button" id="btnPuntuarPostal">Me gusta ésta Postal</button>
                    <button class="btn btn-dark" type="button" id="btnPuntuarCategoria">Me gusta ésta Categoría</button>
                </div>
            </div>
        </form>

        </div>
    </section>
</main>

<script>

  var simplemde = new SimpleMDE({
    element: document.getElementById("mensajePostal"),
    autosave: {
      enabled: true,
      uniqueId: "MyUniqueID",
      delay: 1000,
    }
  });
  // Boton puntuar postal
  $(document).on("click", "#btnPuntuarPostal", function(){   
    ruta = jQuery(location).attr('href'); // Se guarda la ruta actual de donde esta la ventana
    imagenNombre = ruta.replace(/^.*[\\\/]/, ''); // Se limpia la ruta y se guarda lo que esta despues del ultimo '/'
    $.ajax({
        url: "<?=base_url()?>PuntuacionAjax/postal",
        type: "POST",
        dataType: "json",
        data: {imagenNombre:imagenNombre},
        success: function(AX){  
            var tipoAlerts = new Array("red","green");
            $.alert({
                title:AX.title,
                icon: AX.icon,
                content:AX.msj,
                type:tipoAlerts[AX.val],
                onDestroy:function(){
                    if(AX.val == 1){ //Si se pudo puntuar entonces desabilita el boton y cambia el texto
                        $('#btnPuntuarPostal').prop('disabled',true);
                        $('#btnPuntuarPostal').prop('class','btn btn-success');
                        $('#btnPuntuarPostal').text("Gracias por puntuar");
                    }
                }
            });
        }        
    });
  });

 // Boton puntuar categoria
 $(document).on("click", "#btnPuntuarCategoria", function(){   
    ruta = jQuery(location).attr('href'); // Se guarda la ruta actual de donde esta la ventana
    imagenNombre = ruta.replace(/^.*[\\\/]/, ''); // Se limpia la ruta y se guarda lo que esta despues del ultimo '/'
    $.ajax({
        url: "<?=base_url()?>PuntuacionAjax/categoria",
        type: "POST",
        dataType: "json",
        data: {imagenNombre:imagenNombre},
        success: function(AX){  
            var tipoAlerts = new Array("red","green");
            $.alert({
                title:AX.title,
                icon: AX.icon,
                content:AX.msj,
                type:tipoAlerts[AX.val],
                onDestroy:function(){
                    if(AX.val == 1){ //Si se pudo puntuar entonces desabilita el boton y cambia el texto
                        $('#btnPuntuarCategoria').prop('disabled',true);
                        $('#btnPuntuarCategoria').prop('class','btn btn-success');
                        $('#btnPuntuarCategoria').text("Gracias por puntuar");
                    }
                }
            });
        }        
    });
  });

  // Formulario para enviar email
  $("#formMail").submit(function(e){
    e.preventDefault();    
    mensaje = $("#mensajePostal").val();
    correo = $.trim($("#correo").val());
    whats = $.trim($("#whats").val());
    ruta = jQuery(location).attr('href'); // Se guarda la ruta actual de donde esta la ventana
    imagenNombre = ruta.replace(/^.*[\\\/]/, ''); // Se limpia la ruta y se guarda lo que esta despues del ultimo '/'
    imagen = $('#img1').attr('src');
    $.ajax({
        url: "<?=base_url()?>Email/send",
        type: "POST",
        dataType: "json",
        data: {mensaje:mensaje, correo:correo, whats:whats, imagen:imagen,imagenNombre:imagenNombre},
        success: function(AX){  
            var tipoAlerts = new Array("red","green");
            $.alert({
                title:AX.title,
                icon: AX.icon,
                content:AX.msj,
                type:tipoAlerts[AX.val],
                onDestroy:function(){
                    $("#formMail")[0].reset();
                }
            });
        }        
    });
    
});  

</script>

<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

if($_POST  ){
    set_time_limit(300);

    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'rodrigoreal9@gmail.com';                     // SMTP username
        $mail->Password   = '';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('rodrigoreal9@gmail.com', 'Rodrigo Real');
        $mail->addAddress($_POST["correo"], 'Joe User');     // Add a recipient
        /*$mail->addAddress('ellen@example.com');               // Name is optional
        $mail->addReplyTo('info@example.com', 'Information');
        $mail->addCC('cc@example.com');
        $mail->addBCC('bcc@example.com');

        // Attachments
        $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    */
    $imagenNuevo="";
    $r = str_split($imagen);
    for($i=0; $i<count($r); $i++) 
        if($r[$i]=="/"){
        $r[$i]="\ ";
        $r[$i]=trim($r[$i]);
        }
    foreach($r as $char){
        $imagenNuevo=$imagenNuevo.$char;
        
    }
         
    
    
        $mail->addAttachment(trim('C:\xampp\htdocs\Postales\ ').$imagenNuevo, 'iPostal.png');    // Optional name
    
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Esta es una Postal de iPostal';
        $mail->Body    = '<b>FELICIDADES ESTA ES TU POSTAL</b>: <br>'.$_POST["mensajeiPostal"];
      //  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

/*$b64image="data:image/png;base64,".base64_encode(file_get_contents(base_url().$imagen));
//echo($imagen);

$data = [

    'phone' => '52'.$_POST["whats"], // Receivers phone
    'body' =>  $b64image,
    'filename'=> "imagen",
    'caption'=>'Tienes una nueva postal de: '.$nombreP.', en '.$_POST["correo"].", dale un vistazo!" // Message
];
$json = json_encode($data); // Encode data to JSON
// URL for request POST /message
$url = 'https://api.chat-api.com/instance82140/sendFile?token=flmgkvrplzojpjlw';
// Make a POST request
$options = stream_context_create(['http' => [
        'method'  => 'POST',
        'header'  => 'Content-type: application/json',
        'content' => $json

    ]
]);
$result = file_get_contents($url, false, $options);
*/
}
?>