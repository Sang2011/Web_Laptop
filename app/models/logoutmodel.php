<?php
class logoutmodel extends DModel {

    public function __construct(){
        parent::__construct();
    }

    public function getHD($tableName, $idUser){
        return $this->db->selectHD($tableName, $idUser);
    }
    
}