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
            $data['tabla'] = $this->crud_model->findAll();
            $this->load->view('crud',$data);
            $this->load->view('footer/footer');
        }

        public function crudAjax() {
            $respAX = array();
            $data = array(
                'nombre' => (isset($_POST['nombre']))?trim($_POST["nombre"]):'',
                'contrasena' => (isset($_POST['password']))?md5(trim($_POST["password"])):'',
                'email' => (isset($_POST['email']))?trim($_POST["email"]):'',
                'celular' => (isset($_POST['mobile']))?trim($_POST["mobile"]):'',
                'genero' => (isset($_POST['gender']))?trim($_POST["gender"]):'',
                'fechaNac' => (isset($_POST['date']))?trim($_POST["date"]):'',
                'privilegio' => (isset($_POST['privilegio']))?trim($_POST["privilegio"]):''
            );
            
            # Arriba se capturan todos los datos del formulario
            $id = $this->crud_model->insert($data); # Se hace el insert con los datos del arreglo
            $query = $this->crud_model->find($id); # $id almacena el id del usuario insertado y consulta la fila de ese id
            if (isset($query)) {
                $respAX["id"] = $query->idUsuario;
                $respAX["nombre"] = $query->nombre;
                $respAX["email"] = $query->email;
                $respAX["celular"] = $query->celular;
                $respAX["genero"] = $query->genero = ($query->genero == 'm')?"Masculino":"Femenino";
                $respAX["fecha"] = $query->fechaNac;
                $respAX["privilegio"] = $query->privilegio = ($query->privilegio == 1)?"Administrador":"Usuario";
                echo json_encode($respAX);
            } else {
                echo "Error";
            }
        }
    }
?>