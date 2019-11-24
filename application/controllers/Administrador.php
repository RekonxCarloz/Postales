<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

    class Administrador extends CI_Controller {
        function __construct() {
            parent::__construct();
            $this->load->model('crud_model');
        }

        public function index() {
            if ($this->session->userdata('login') == 2) {
                $this->load->view('headers/headerAdmin');
            } else header("Location: " . base_url()); # Si no estas logueado como admin entonces regresa al index
            
            $this->load->view('admin');
            $this->load->view('footer/footer');
        }

        public function gestion() {
            if ($this->session->userdata('login') == 2) {
                $this->load->view('headers/headerAdmin');
            } else header("Location: " . base_url()); # Si no estas logueado como admin entonces regresa al index
            
            $this->load->view('crud');
            $this->load->view('footer/footer');
        }
    }
?>