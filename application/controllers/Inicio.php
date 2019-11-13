<?php
class Inicio extends CI_Controller {

    public function __construct(){
      parent::__construct();
    }
   public function index(){
    $dato = $this->session->userdata('login');
    $n = array('name' => $this->session->userdata('nombre'));
    if ($dato == 1 || $dato == 2) {
      if ($dato == 1) {
        $this->load->view('headers/headerActiveSesion',$n);
      } else $this->load->view('headers/headerAdmin');
    } else $this->load->view('headers/header');

      $this->load->view('inicio');
      $this->load->view('footer/footer');
   }
   public function caracteristicas(){
    $dato = $this->session->userdata('login');
    $n = array('name' => $this->session->userdata('nombre'));
    if ($dato == 1 || $dato == 2) {
      if ($dato == 1) {
        $this->load->view('headers/headerActiveSesion',$n);
      } else $this->load->view('headers/headerAdmin');
    } else $this->load->view('headers/header'); 

     $this->load->view('features');
     $this->load->view('footer/footer');
   }
   public function about(){
    $dato = $this->session->userdata('login');
    $n = array('name' => $this->session->userdata('nombre'));
    if ($dato == 1 || $dato == 2) {
      if ($dato == 1) {
        $this->load->view('headers/headerActiveSesion',$n);
      } else $this->load->view('headers/headerAdmin');
    } else $this->load->view('headers/header'); 
    
    $this->load->view('about-us');
     $this->load->view('footer/footer');
   }
   public function registro(){
    $dato = $this->session->userdata('login'); 
    if (!($dato == 1 || $dato == 2)) {
      $this->load->view('headers/header');
      $this->load->view('registration');
      $this->load->view('footer/footer');
    } else header("Location: ". base_url());
  }
  public function login(){
    $dato = $this->session->userdata('login'); 
    if (!($dato == 1 || $dato == 2)) {
      $this->load->view('headers/header');
      $this->load->view('login');
      $this->load->view('footer/footer');
    } else header("Location: ". base_url());
   }
   public function contacto(){
    $dato = $this->session->userdata('login');
    $n = array('name' => $this->session->userdata('nombre'));
    if ($dato == 1 || $dato == 2) {
      if ($dato == 1) {
        $this->load->view('headers/headerActiveSesion',$n);
      } else $this->load->view('headers/headerAdmin');
    } else $this->load->view('headers/header'); 
    
    $this->load->view('contact-us');
     $this->load->view('footer/footer');
   }
   public function postales(){
     $this->load->view('headers/headerPostales');
     $this->load->view('categoriaPostales');
     $this->load->view('footer/footer');
   }
   public function enviarPostales(){
    $dato = $this->session->userdata('login');
    $n = array('name' => $this->session->userdata('nombre'));
    if ($dato == 1 || $dato == 2) {
      if ($dato == 1) {
        $this->load->view('headers/headerActiveSesion',$n);
      } else $this->load->view('headers/headerAdmin');
    } else $this->load->view('headers/header');
    
    $this->load->view('enviarPostales');
    $this->load->view('footer/footer');
  }
  public function cerrarSesion() {
    $this->session->sess_destroy();
    header("Location: ". base_url());
  }
}
?>
