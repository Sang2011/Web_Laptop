<?php
class dangkymodel extends DModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function addTaiKhoan($tableKH, $data)
    {
        return $this->db->addTK($tableKH, $data);
    }
}
?>