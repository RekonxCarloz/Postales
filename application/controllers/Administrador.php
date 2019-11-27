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
            $id = (isset($_POST['id']))?trim($_POST["id"]):'';
            $opcion = (isset($_POST['opcion']))?trim($_POST["opcion"]):'';
            $data = array(
                'nombre' => (isset($_POST['nombre']))?trim($_POST["nombre"]):'',
                'email' => (isset($_POST['email']))?trim($_POST["email"]):'',
                'celular' => (isset($_POST['mobile']))?trim($_POST["mobile"]):'',
                'genero' => (isset($_POST['gender']))?trim($_POST["gender"]):'',
                'fechaNac' => (isset($_POST['date']))?trim($_POST["date"]):'',
                'privilegio' => (isset($_POST['privilegio']))?trim($_POST["privilegio"]):'',
            );

            switch ($opcion) {
                case 1: // Aqui se registrara el usuario
                    $data['contrasena'] = (isset($_POST['password']))?md5(trim($_POST["password"])):'';
                    $query = $this->db->get_where('usuario',array('email' => $data['email']));
                    if ($query->num_rows() > 0) { //Si entra aqui es porque el email ya esta registrado
                        die();
                    }
                    # En data se capturan todos los datos del formulario
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
                    }
                    break;
                
                case 2: // Aqui se editará el usuario
                    $this->crud_model->update($id,$data);
                    if ($this->db->affected_rows() == 1) { // Si se pudo hacer el update entonces recupere los datos en el arreglo $respAX
                        $query = $this->crud_model->find($id);
                        if (isset($query)) {
                            $respAX["id"] = $query->idUsuario;
                            $respAX["nombre"] = $query->nombre;
                            $respAX["email"] = $query->email;
                            $respAX["celular"] = $query->celular;
                            $respAX["genero"] = $query->genero = ($query->genero == 'm')?"Masculino":"Femenino";
                            $respAX["fecha"] = $query->fechaNac;
                            $respAX["privilegio"] = $query->privilegio = ($query->privilegio == 1)?"Administrador":"Usuario";
                        }
                    } else die();
                    break;

                case 3: // Aquí se va a eliminar el usuario
                    $this->crud_model->delete($id);
                    if ($this->db->affected_rows() != 1) {
                        die();
                    }
                    break;
            }
            
            
            print json_encode($respAX, JSON_UNESCAPED_UNICODE);
        }
    }
?>