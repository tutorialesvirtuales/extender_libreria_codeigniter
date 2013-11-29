<?php

class Webcam extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model(array('Fotos_model'));
    }
    
    public function index(){
        $this->load->view('webcam/index_view');
    }
    
    public function ajax(){
        $src = $this->input->post('src');
        $this->Fotos_model->grabarFoto($src);
        $foto = $this->Fotos_model->getLastFoto();
        $this->output->set_output($foto);
    }
}

