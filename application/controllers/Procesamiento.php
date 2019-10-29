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
        $this->postal_model->registrarUsuario($data);
        $result = $this->db->affected_rows();
        if ($result == 1) {
            $respAX["val"] = 1;
            $respAX["msj"] = "<h5 class='text-info'>¡Registro Exitoso!</h5>";
        } else {
            $respAX["val"] = 0;
            $respAX["msj"] = "<h5 class='text-info'>Registro fallido</h5>";
        }
        echo json_encode($respAX);
    }
}
