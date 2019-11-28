<?php
class Inicio extends CI_Controller {

    public function __construct(){
      parent::__construct();
    }

   public function index(){
    $dato = $this->session->userdata('login');
    $n = array('name' => $this->session->userdata('nombre'));
    $justName= explode(" ",$n["name"]);
    $n["name"] = $justName[0];
    if ($dato == 1 || $dato == 2) {
      if ($dato == 1) {
        $this->load->view('headers/headerActiveSesion',$n);
        $this->load->view('tipoInicios/inicioLoginUser');
        $this->load->view('footer/footer');
      } else {
        $this->load->view('headers/headerAdmin');
        $this->load->view('tipoInicios/inicioLoginAdmin');
        $this->load->view('footer/footer');
      }
    } else {
      $this->load->view('headers/header');
      $this->load->view('tipoInicios/inicio');
      $this->load->view('footer/footer');
    }
   }

   public function caracteristicas(){
    $dato = $this->session->userdata('login');
    $n = array('name' => $this->session->userdata('nombre'));
    $justName= explode(" ",$n["name"]);
    $n["name"] = $justName[0];
    if ($dato == 1 || $dato == 2) {
      if ($dato == 1) {
        $this->load->view('headers/headerActiveSesion',$n);
        $this->load->view('features');
        $this->load->view('footer/footer');
      } else {
        $this->load->view('headers/headerAdmin');
        $this->load->view('features');
        $this->load->view('footer/footer');
      }
    } else {
      $this->load->view('headers/header');
      $this->load->view('features');
      $this->load->view('footer/footer');
    }
   }

   public function about(){
    $dato = $this->session->userdata('login');
    $n = array('name' => $this->session->userdata('nombre'));
    $justName= explode(" ",$n["name"]);
    $n["name"] = $justName[0];
    if ($dato == 1 || $dato == 2) {
      if ($dato == 1) {
        $this->load->view('headers/headerActiveSesion',$n);
        $this->load->view('about-us');
        $this->load->view('footer/footer');
      } else {
        $this->load->view('headers/headerAdmin');
        $this->load->view('about-us');
        $this->load->view('footer/footer');
      }
    } else {
      $this->load->view('headers/header');
      $this->load->view('about-us');
      $this->load->view('footer/footer');
    }
   }

   public function registro(){
    $dato = $this->session->userdata('login');
    if (!($dato == 1 || $dato == 2)) {
      $this->load->view('headers/header');
      $this->load->view('registration');
      $this->load->view('footer/footer');
    } else header("Location: ". base_url()); # Si la sesion esta activa no puedes acceder al registro
  }

  public function login(){
    $dato = $this->session->userdata('login');
    if (!($dato == 1 || $dato == 2)) {
      $this->load->view('headers/header');
      $this->load->view('login');
      $this->load->view('footer/footer');
    } else header("Location: ". base_url()); # Si la sesión está activa no puedes acceder al login
   }

   public function contacto(){
    $dato = $this->session->userdata('login');
    $n = array('name' => $this->session->userdata('nombre'),
    'nombreCompleto' => $this->session->userdata('nombre'),
    'email' => $this->session->userdata('priv'));
    $justName= explode(" ",$n["name"]);
    $n["name"] = $justName[0];
    if ($dato == 1 || $dato == 2) {
      if ($dato == 1) {
        $this->load->view('headers/headerActiveSesion',$n);
        $this->load->view('contact-us', $n);
        $this->load->view('footer/footer');
      } else {
        $this->load->view('headers/headerAdmin');
        $this->load->view('contact-us', $n);
        $this->load->view('footer/footer');
      }
    } else {
      $this->load->view('headers/header');
      $this->load->view('contact-us', $n);
      $this->load->view('footer/footer');
    }
   }
   public function postales(){
    $dato = $this->session->userdata('login');
    $n = array('name' => $this->session->userdata('nombre'));
    $justName= explode(" ",$n["name"]);
    $n["name"] = $justName[0];
    if ($dato == 1 || $dato == 2) {
      if ($dato == 1) {
        $this->load->view('headers/headerActiveSesion',$n);
      } else $this->load->view('headers/headerAdmin');
    } else header("Location: ". base_url()."inicio"); # Si no estas logueado no puedes acceder al apartado postales

     $this->load->view('categoriaPostales');
     $this->load->view('footer/footer');
   }
   public function crearPDF($nombre_imagen){

    $this->load->model('envios_model');
    $query = $this->envios_model->ruta($nombre_imagen);
    $query = $query->row(); //Traemos todos los datos de el nombre de la imagen
    $data = array();
    $data["nombre"] = $this->session->userdata('nombre');
    $data["email"] = $this->session->userdata('priv');
    $data["imagen"] = $query->ruta;
    $mpdf = new \Mpdf\Mpdf();
    $html = $this->load->view('crearMPDF',$data,true);
    $mpdf->WriteHTML($html);
    $mpdf->Output(); // opens in browser
    //$mpdf->Output('arjun.pdf','D'); // it downloads the file into the user system, with give name
    $this->load->view('crearMPDF',$data);
   }
   public function descargarPostales($info){

    $dato = $this->session->userdata('login');
    $n = array('name' => $this->session->userdata('nombre'));
    $justName= explode(" ",$n["name"]);
    $n["name"] = $justName[0];
    if ($dato == 1 || $dato == 2) {
      if ($dato == 1) {
        $this->load->view('headers/headerActiveSesion',$n);
      } else $this->load->view('headers/headerAdmin');
    } else header("Location: ". base_url()."inicio"); # Si no estas logueado no puedes acceder al apartado postales
    echo("esta es tu info: ");
    $data = array();
    $data["imagen"] =$info;
    echo($info);
     $this->load->view('descargarPostal', $data);
     $this->load->view('footer/footer');
   }


   public function enviarPostales($nombre_imagen){
    $dato = $this->session->userdata('login');
    $n = array('name' => $this->session->userdata('nombre'));
    $justName= explode(" ",$n["name"]);
    $n["name"] = $justName[0];
    if ($dato == 1 || $dato == 2) {
      if ($dato == 1) {
        $this->load->view('headers/headerActiveSesion',$n);
      } else $this->load->view('headers/headerAdmin');
    } else header("Location: ". base_url()."inicio"); # Si no estas logueado no puedes acceder al apartado postales

      $this->load->model('envios_model');
      $query = $this->envios_model->ruta($nombre_imagen);
      $query = $query->row(); //Traemos todos los datos de el nombre de la imagen
      $data = array();
      $data["imagen"] = $query->ruta;
      $data["nombreP"]= $n["name"];
    $this->load->view('enviarPostales',$data);
    $this->load->view('footer/footer');
  }

  public function historial() {

    $this->load->model('envios_model');
    $data['datos'] = $this->envios_model->getDatos(); # Aqui guarda la consulta de los datos de usuario
    $data['enviadas'] = $this->envios_model->getEnviadas(); # Aqui guarda la consulta de las postales enviadas
    $data['recibidas'] = $this->envios_model->getRecibidas(); # Aqui guarda la consulta de las postales recibidas
        $dato = $this->session->userdata('login');
        $n = array('name' => $this->session->userdata('nombre'));
        $justName= explode(" ",$n["name"]);
        $n["name"] = $justName[0];
        if ($dato == 1 || $dato == 2) {
            if ($dato == 1) {
                $this->load->view('headers/headerActiveSesion',$n);
                $this->load->view('history',$data);
                $this->load->view('footer/footer');
            } else {
                $this->load->view('headers/headerAdmin');
                $this->load->view('history',$data);
                $this->load->view('footer/footer');
            }
        } else header("Location: ". base_url()."registro");
  }

  public function cerrarSesion() {
    $this->session->sess_destroy();
    header("Location: ". base_url());
  }
}
?>
