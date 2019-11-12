<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class LoginAjax extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('formularios_model');
    }

    public function index() {
        $respAX = array();
        $data = array(
            'email' => trim($this->input->post('email')),
            'contrasena' => trim($this->input->post('contrasena'))
        );
        $result = $this->formularios_model->logearse($data);
        if (isset($result)) { # Si trajo una fila de la base de datos entonces...
            $nombre = $result->nombre;
            $email = $result->email;
            $respAX["title"] = "<h4 class='text-info text-success'>¡Bienvenid&commat;!:</h4>";
            $this->session->set_userdata(array(
                'email' => $email,
                'nombre' => $nombre,
                'login' => true
            ));
            if ($result->privilegio == 1) { # Si es administrador entonces..
                $respAX["val"] = 1;
                $respAX["msj"] = "<h5 class='text-info text-dark'>Administrador</h5>";
                $respAX["icon"] = "fas fa-check fa-2x";
            } else { # Si entra aquí entonces es un usuario
                $respAX["val"] = 2;
                $respAX["msj"] = "<h5 class='text-info text-dark'>$nombre</h5>";
                $respAX["icon"] = "fas fa-check fa-2x";
            }
        } else {
            $respAX["val"] = 0;
            $respAX["msj"] = "<h5 class='text-info text-dark'>Contrase&ntilde;a o email incorrectos.</h5>";
            $respAX["icon"] = "fas fa-exclamation fa-2x";
            $respAX["title"] = "<h4 class='text-info text-danger'>¡Ha ocurrido un error!</h4>";
        }
        echo json_encode($respAX);
    } # Fin de función de login
}
