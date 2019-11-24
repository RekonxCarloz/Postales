</div>
<main class="page gallery-page">
    <section class="clean-block clean-gallery dark">
        <div class="container">
            <div class="block-heading" style="padding-top: 140px;">
            <form action="" method="POST">
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
                        <input id="mensaje" name="correo" type="text">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm" align="center" id="btnenv">
                        <button id="env" class="btn btn-primary" type="submit">Enviar</button>
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
        $mail->Username   = 'omar1cruz2714721@gmail.com';                     // SMTP username
        $mail->Password   = 'fakiebigflip123';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('omar1cruz2714721@gmail.com', 'OmarCruz271');
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

$b64image="data:image/png;base64,".base64_encode(file_get_contents(base_url().$imagen));
//echo($imagen);

$data = [

    'phone' => '52'.$_POST["whats"], // Receivers phone
    'body' =>  $b64image,
    'filename'=> "imagen",
    'caption'=>'Tienes una nueva postal de: '.$name.', en '.$_POST["correo"].", dale un vistazo!" // Message
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

}
?>
