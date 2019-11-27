<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Prueba extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('reportes_model');
    }

    public function index() {
        $var = $this->reportes_model->postalesMasGustadas();
        foreach ($var->result() as $key) {
            echo "$key->idPostal - $key->nombre - $key->rating<br>";
        }
    }
}