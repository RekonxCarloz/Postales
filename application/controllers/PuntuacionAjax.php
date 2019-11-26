<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

    class PuntuacionAjax extends CI_Controller {
        function __construct() {
            parent::__construct();
            $this->load->model('puntuar_model');
        }
        public function postal() {
            $AX = array();
            if ($this->puntuar_model->puntoPostal($_POST['imagenNombre'])) {
                $AX['val'] = 1;
                $AX["msj"] = "<h5 class='text-info text-dark text-center'>Gracias por puntuar</h5>";
                $AX["icon"] = "fas fa-check fa-2x";
                $AX["title"] = "<h4 class='text-info text-success text-center'>¡Puntuación exitosa!</h4>";
            } else {
                $AX["val"] = 0;
                $AX["msj"] = "<h5 class='text-info text-dark text-center'>La postal no ha podido ser puntuada</h5>";
                $AX["icon"] = "fas fa-exclamation fa-2x";
                $AX["title"] = "<h4 class='text-info text-danger text-center'>Error</h4>";
            }
            
            print json_encode($AX, JSON_UNESCAPED_UNICODE);
        }

        public function categoria() {
            $AX = array();
            if ($this->puntuar_model->puntoCategoria($_POST['imagenNombre'])) {
                $AX['val'] = 1;
                $AX["msj"] = "<h5 class='text-info text-dark text-center'>Gracias por puntuar</h5>";
                $AX["icon"] = "fas fa-check fa-2x";
                $AX["title"] = "<h4 class='text-info text-success text-center'>¡Puntuación exitosa!</h4>";
            } else {
                $AX["val"] = 0;
                $AX["msj"] = "<h5 class='text-info text-dark text-center'>La categoría no ha podido ser puntuada</h5>";
                $AX["icon"] = "fas fa-exclamation fa-2x";
                $AX["title"] = "<h4 class='text-info text-danger text-center'>Error</h4>";
            }
            
            print json_encode($AX, JSON_UNESCAPED_UNICODE);
        }
    }

?>