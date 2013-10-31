<?php

class Usuarios_model extends CI_Model{
    
    public function getUsuarios(){
        return $this->db
                ->get('usuarios')
                ->result();
    }
    public function crearUsuario(){
        foreach($this->input->post() as $key => $value){
            $data[$key] = $value;
        }
        return $this->db->insert('usuarios',$data);
    }
    
    public function getUsuario($id){
        return $this->db
                ->where('id',$id)
                ->get('usuarios')
                ->row();
    }
    
    public function actualizarUsuario(){
        return $this->db
                ->where('id',$this->input->post('id'))
                ->update('usuarios',array('nombre' => $this->input->post('nombre')
                        ,'usuario'=>$this->input->post('usuario')
                        ,'password' => $this->input->post('password')));
    }
    
}

