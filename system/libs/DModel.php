<?php

class DModel {
    protected $db =array();
    public function __construct(){
        $connect = 'mysql:dbname=laptoppro;host:localhost';
        $user = 'root';
        $pass = 'sangminh122';
        $this->db = new Database($connect,$user,$pass);
    }
 

}
?>
