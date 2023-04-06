<?php
class thanhtoan extends DControlller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function showthanhtoan()
    {
        //$this->load->model('thanhtoanmodel');0
        Session::checkSession();
        $emailUser = Session::get('email');
        $tableName = 'tkuser';
        $thanhtoanmodel = $this->load->model('thanhtoanmodel');
        $result = $thanhtoanmodel->getuser($tableName, $emailUser);
        //print_r($data['sanpham']);
        if ($result != null) {
            $data['User'] = $result[0];
            $this->load->view('thanhtoan',$data);
        }
        // $this->load->view('thanhtoan');
    }
    public function insertOrder()
    {
        $thanhtoanmodel = $this->load->model('thanhtoanmodel');
        $tableHoadon = 'hoadon';
        $tableChitiethd = 'chitiethd';
        Session::checkSession();
        $data = array(
            'hovaten' => $_POST['hovaten'],
            'diachi' => $_POST['diachi'],
            'sodienthoai' => $_POST['sodienthoai'],
            'email' => $_POST['email'],
            'ghichu' => $_POST['ghichu'],
            'thanhtoan' => $_POST['thanhtoan'],
            'tongtien' => $_POST['tongtien'],
            'trangthai' => 'Chờ xác nhận',
            'user_id' =>  $_POST['iduser']
        );
        // print_r($data);
        // echo (Session::get('userid'));
        // // thong tin chi tiết hoa đơn
        // echo $_POST['idsp'].'</br>';
        $arrayIdsp = explode(',', $_POST['idsp']);
        // print_r($arrayIdsp);
        // echo'</br>';
        // echo $_POST['soluong'].'</br>';
        $arraySoluong = explode(',', $_POST['soluong']);
        // print_r($arraySoluong);

        //Thêm vào bảng hóa đơn
        $thanhtoanmodel->insertOrderMD($tableHoadon, $data);
        // echo json_encode($data);

        //thêm vào bảng chi tiết hóa đơn
        $dataHD['hoadon'] = $thanhtoanmodel->selectOrderMD($tableHoadon);
        $idhd = '';

        foreach ($dataHD['hoadon'] as $key => $value) {
            $idhd = $value['idhd'];
        }

        foreach ($arrayIdsp as $key => $value) {
            $dataInChitiethd = array(
                'idhd' => $idhd,
                'idsp' => $value,
                'soluong' => $arraySoluong[$key],
            );
            $resultcthd = $thanhtoanmodel->insertChitiethd($tableChitiethd, $dataInChitiethd);
        }
        if ($resultcthd == 1) {
            header("Location:/?url=thanhtoan/showthanhtoan");
        } else {
            echo 'lỗi';
        }
    }
}
