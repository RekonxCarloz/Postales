<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Procesamiento extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('postal_model');
    }
    public function registroAjax() {
        $respAX = array();
        $data = array(
            'nombre' => trim($_POST["name"]),
            'contrasena' => trim($_POST["password"]),
            'email' => trim($_POST["email"]),
            'celular' => trim($_POST["mobile"]),
            'genero' => trim($_POST["gender"]),
            'fecha' => trim($_POST["date"])
        );
        $er = $this->postal_model->registrarUsuario($data);
        if ($er) {
            $respAX["val"] = 1;
            $respAX["msj"] = "<h5 class='text-info text-dark'>¡Registro Exitoso!</h5>";
            $respAX["icon"] = "fas fa-check fa-2x";
            $respAX["title"] = "<h4 class='text-info text-success'>Estado del registro:</h4>";
        } else {
            $respAX["val"] = 0;
            $respAX["msj"] = "<h5 class='text-info text-dark'>Registro fallido, ya existe ese email</h5>";
            $respAX["icon"] = "fas fa-exclamation fa-2x";
            $respAX["title"] = "<h4 class='text-info text-danger'>Estado del registro:</h4>";
        }
        echo json_encode($respAX);
    } # Fin de funcion de registro

    public function loginAjax() {
        $respAX = array();
        $data = array(
            'email' => trim($this->input->post('email')),
            'contrasena' => trim($this->input->post('contrasena'))
        );
        $er = $this->postal_model->logearse($data);
        if ($er) {
            $query = $this->db->get_where('usuario', array( # Consulta con where = SELECT * FROM usuario WHERE
                'email' => $data['email'],
                'contrasena' => md5($data['contrasena'])
            ));
            $result = $query->row();
            $nombre = $result->nombre;
            $respAX["title"] = "<h4 class='text-info text-success'>¡Bienvenid&commat;!:</h4>";
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
