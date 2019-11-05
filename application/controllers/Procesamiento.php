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
    }
}
