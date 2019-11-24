<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class enviaP extends CI_Controller {
    function __construct() {
        parent::__construct();

    }
public function index($correo,$imagen,$mensaje,$numero){
if(envia($correo,$imagen,$mensaje,$numero)){
    $respAX["val"] = 1;
    $respAX["msj"] = "<h5 class='text-info text-dark'>Envio exitoso</h5>";
    $respAX["icon"] = "fas fa-check fa-2x";
    $respAX["title"] = "<h4 class='text-info text-success'>Estado del registro:</h4>";
} else{
    $respAX["val"] = 0;
    $respAX["msj"] = "<h5 class='text-info text-dark'>Envio fallido, ocurrió algun error</h5>";
    $respAX["icon"] = "fas fa-exclamation fa-2x";
    $respAX["title"] = "<h4 class='text-info text-danger'>Estado del registro:</h4>";
}
echo json_encode($respAX);
}

public function envia($correo,$imagen,$mensaje,$numero){

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

if($_POST  ){

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
        $mail->addAddress($correo, 'Joe User');     // Add a recipient
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
        $mail->Body    = '<b>FELICIDADES ESTA ES TU POSTAL</b>: <br>'.$mensaje;
      //  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        return(false);
    }

$b64image="data:image/png;base64,".base64_encode(file_get_contents(base_url().$imagen));
//echo($imagen);

$data = [

    'phone' => '52'.$numero, // Receivers phone
    'body' =>  $b64image,
    'filename'=> "imagen",
    'caption'=>'Tienes una nueva postal de: '.$nombreP.', en '.$_POST["correo"].", dale un vistazo!" // Message
];
$json = json_encode($data); // Encode data to JSON
// URL for request POST /message
$url = 'https://eu88.chat-api.com/instance82140/sendFile?token=flmgkvrplzojpjlw';
// Make a POST request
$options = stream_context_create(['http' => [
        'method'  => 'POST',
        'header'  => 'Content-type: application/json',
        'content' => $json

    ]
]);
$result = file_get_contents($url, false, $options);
return(true);
} 
return(false);
}
?>