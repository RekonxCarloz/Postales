<?php if (! defined("BASEPATH")) exit('No direct script access allowed');

    class Postal_model extends CI_Model {
        function __construct() {
            parent::__construct();
            $this->load->database();
        }

        public function registrarUsuario($data) {
            $this->db->insert('usuario',array(
                'nombre' => $data['nombre'],
                'contrasena' => md5($data['contrasena']),
                'email' => $data['email'],
                'celular' => $data['celular'],
                'genero' => $data['genero'],
                'fechaNac' => $data['fecha'],
                'privilegio' => $data['privilegio']=0
            ));
        }
    }
?>
