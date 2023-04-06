<?php
class dangnhap extends DControlller
{
    public function __construct()
    {
        $data = array();
        parent::__construct();
    }
    public function login()
    {
        //$this->load->model('dangnhapmodel');
        Session::init();
        if (Session::get('login') == true) {
            header("Location:/?url=dangnhap/dashboard");
        }
        $this->load->view('dangnhap');
    }

    public function loginuser()
    {
        // $this->load->model('dangnhapmodel');
        Session::init();
        if (Session::get('login') == true) {
            header("Location:/?url=dangnhap/logout");
        }
        $this->load->view('dangnhapuser');
    }

    public function dangnhapuser()
    {
        Session::checkSession();
        $this->load->view('dangnhapuser');
    }

    public function logout()
    {
        Session::checkSession();
        $idlUser = Session::get('email');
        $tableName = 'hoadon';
        $logoutmodel = $this->load->model('logoutmodel');
        $result = $logoutmodel->getHD($tableName, $idlUser);
        if ($result != null) {
            $data['PD'] = $result;
            $this->load->view('logout', $data);
        } else {
            $this->load->view('logout');
        }
    }

    public function dashboard()
    {
        Session::checkSession();
        $this->load->view('dashboard');
    }
    public function dangnhap()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $table = 'user_admin';
        $loginmodel = $this->load->model('loginmodel');
        $count = $loginmodel->login($table, $username, $password);
        if ($count == 0) {
            header("Location:/?url=dangnhap/login");
        } else {
            $result = $loginmodel->getLogin($table, $username, $password);
            Session::init();
            Session::set('login', true);
            Session::set('email', $result[0]['email']);
            Session::set('userid', $result[0]['admin_id']);
            header("Location:/?url=dangnhap/dashboard");
        }
    }

    public function userdangnhap()
    {
        $username = $_POST['email'];
        $password = $_POST['password'];
        $table = 'tkuser';
        $loginmodel = $this->load->model('loginmodel');
        $count = $loginmodel->login($table, $username, $password);
        if ($count == 0) {
            header("Location:/?url=dangnhap/loginuser");
        } else {
            $result = $loginmodel->getLogin($table, $username, $password);
            Session::init();
            Session::set('login', true);
            Session::set('email', $result[0]['email']);
            Session::set('userid', $result[0]['user_id']);
            header("Location:/?url=trangchu/showtrangchu");
        }
    }

    public function dangky(){
        Session::checkSession();
        $dangkymodel = $this->load->model('dangkymodel');
        $tableKH = 'tkuser';
        $data = array(
            'email' => $_POST['email'],
            'matkhau' => $_POST['password'],
            'ten' => $_POST['ten'],
            'diachi' => $_POST['diachi'],
            'sodienthoai' => $_POST['sdt']
        );
        $resulthd = $dangkymodel->addTaiKhoan($tableKH, $data);
       
        if ( $resulthd == 1) {
            header("Location:/?url=dangnhap/loginuser");
        } else {
            echo 'Cập nhật không thành công';
        }
    }


    public function dangxuat()
    {
        Session::init();
        Session::destroy();
        header("Location:/?url=dangnhap/loginuser");
    }

    /// Hàm để thêm hóa đơn
    public function addProduct()
    {
        Session::checkSession();
        $adminmodel = $this->load->model('adminmodel');
        $tablePD = 'sanpham';
        $data = array(
            'ten' => $_POST['ten'],
            'gia' => $_POST['gia'],
            'mausac' => $_POST['mausac'],
            'nhasanxuat' => $_POST['nhasanxuat'],
            'xuatxu' => $_POST['xuatxu'],
            'img' => $_POST['img']
        );
        $resulthd = $adminmodel->addSanpham($tablePD, $data);
       
        if ( $resulthd == 1) {
            header("Location:/?url=sanpham/showsanpham");
        } else {
            echo 'Cập nhật không thành công';
        }
    }

    //hàm seclet sảm phẩm theo ID
    public function productById()
    {
        Session::checkSession();
        $adminmodel = $this->load->model('adminmodel');
        $tablePD = 'sanpham';
        $idsp = $_POST['idsp'];

        $result = $adminmodel->selectPD_ById($tablePD, $idsp);

        if ($result != null) {
            $data['PD'] = $result[0];
            $this->load->view('dashboard', $data);
        } else {
            $this->load->view('dashboard');
        }
    }
    // hàm Update giá SP
    public function updatePrice()
    {
        Session::checkSession();
        $adminmodel = $this->load->model('adminmodel');
        $tableUD = 'sanpham';
        $data = array(
            'giamoi' => $_POST['giamoi'],
            'idsp' => $_POST['idsp'],
        );
        $resutl = $adminmodel->updatePriceMD($tableUD, $data);
        if ($resutl == 1) {
            header("Location:/?url=sanpham/showsanpham");
        } else {
            echo 'Cập nhật không thành công';
        }
    }
    // Xóa đơn hàng
    public function deleteProduct()
    {
        Session::checkSession();
        $adminmodel = $this->load->model('adminmodel');
        $tableUD = 'sanpham';
        $data = array(
            'idsp' => $_POST['idsp'],
        );
        $resutl = $adminmodel->deleteProductMD($tableUD, $data);
        if ($resutl == 1) {
            header("Location:/?url=sanpham/showsanpham");
        } else {
            echo 'Cập nhật không thành công';
        }
    }

    //dơn hàng theo ID
    public function orderById()
    {
        Session::checkSession();
        $adminmodel = $this->load->model('adminmodel');
        $tableOD = 'hoadon';
        $idhd = $_POST['idhd'];

        $result = $adminmodel->selectOD_ById($tableOD, $idhd);
        //$dataHD['HD'] = $result[0];

        if ($result != null) {
            $data['HD'] = $result;
            //print_r($data);
            $this->load->view('updateHD', $data);
        } else {
            header("Location:/?url=dangnhap/dashboard");
        }
    }

    // cập nhật trạng thái
    public function updateStatus()
    {
        Session::checkSession();
        $adminmodel = $this->load->model('adminmodel');
        $tableHD = 'hoadon';
        $data = array(
            'trangthai' => $_POST['trangthaimoi'],
            'idhd' => $_POST['idhd'],
        );
        //print_r($data);
        $resutl = $adminmodel->updateStatusMD($tableHD, $data);
        if ($resutl == 1) {
            header("Location:/?url=dangnhap/dashboard");
        } else {
            echo 'Cập nhật không thành công';
        }
    }
    public function showhoadon()
    {
        Session::checkSession();
        $adminmodel = $this->load->model('adminmodel');
        $result = $adminmodel->showAllOD_MD();
        if ($result != null) {
            $data['hoadon'] = $result;
            //print_r($data);
            $this->load->view('donhang',$data);
        } else {
            header("Location:/?url=dangnhap/dashboard");
        }
    }
}
