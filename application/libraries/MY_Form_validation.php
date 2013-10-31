<?php if (!defined('BASEPATH'))exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation {

    public function __construct($rules = array()) {
        parent::__construct($rules);
        $CI = & get_instance();
    }

    public function valorUnico($valor, $parametros) {
        list($tabla, $campo) = explode(".", $parametros, 2);
        //echo $valor; exit();
        $this->CI->form_validation->set_message('valorUnico', 'El Usuario ' . $valor .' ya existe');
        if (!empty($tabla) && !empty($campo)) {
            if ($this->CI->input->post('id')) {
                $this->CI->db->select($campo);
                $this->CI->db->from($tabla);
                $this->CI->db->where('id !=', $this->CI->input->post('id'));
                $this->CI->db->where($campo, $valor);
                $this->CI->db->limit(1);
                $query = $this->CI->db->get();
                if ($query->row()) {
                    return FALSE;
                } else {
                    return TRUE;
                }
            } else {
                $this->CI->db->select($campo);
                $this->CI->db->from($tabla);
                $this->CI->db->where($campo, $valor);
                $this->CI->db->limit(1);
                $query = $this->CI->db->get();
                if ($query->row()) {
                    return FALSE;
                } else {
                    return TRUE;
                }
            }
        } else {
            show_error('Se necesita el parametro de que tabla y que campo se desea evaluar');
        }
    }

}
