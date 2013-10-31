<?php

class Usuarios extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('Usuarios_model'));
    }

    public function index() {
        $this->load->view('usuarios/index_view',array('usuarios' => $this->Usuarios_model->getUsuarios()));
    }

    public function crear() {
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('usuario', 'Usuario', 'required|valorUnico[usuarios.usuario]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run()) {
            $this->Usuarios_model->crearUsuario();
            $this->session->set_flashdata('mensaje', 'Usuario Creado con Exito');
            redirect('usuarios/crear');
        } else {
            $this->load->view('usuarios/crear_view');
        }
    }

    public function editar($id = FALSE) {
        if ($id) {
            $this->form_validation->set_rules('nombre', 'Nombre', 'required');
            $this->form_validation->set_rules('usuario', 'Usuario', 'required|valorUnico[usuarios.usuario]');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if ($this->form_validation->run()) {
                $this->Usuarios_model->actualizarUsuario();
                $this->session->set_flashdata('mensaje', 'Usuario Actualizado con Exito');
                redirect('usuarios/crear');
            } else {
                $usuario = $this->Usuarios_model->getUsuario($id);
                $this->load->view('usuarios/editar_view', array('usuario' => $usuario));
            }
        } else {
            show_404();
        }
    }

}
