<?php

class Fotos_model extends CI_Model{
    
    public function grabarFoto($foto){
        return $this->db->insert('fotos',array('foto'=>$foto));
    }
    
    public function getLastFoto(){
        return $this->db->order_by('id','desc')->get('fotos')->row()->foto;
    }
}

