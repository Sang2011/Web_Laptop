<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/public/css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="header">
        <div>
            <h3>LAPTOPPRO</h3>
            <span>Admin</span>
        </div>
        <a title="Logout" class="login__link" href="/?url=dangnhap/dangxuat"><i style="font-size: 20px;" class="login-link-icon fa-solid fa-right-from-bracket"></i></a>
    </div>
    <div class="main__content">
        <div class=" main__content-left">
            <div class="main__content-left-user">
                <div class="user-icon">
                    <i class="icon fa-solid fa-user"></i>
                </div>
                <span>Minh Sang</span>
            </div>
            <div class="main__content-left-feature">
                <p onclick="hienThiChucNang1()" class="main__content-left-prdname"><a href="/?url=dangnhap/dashboard">Quay lại chỉnh sửa</a> <i class="fa-solid fa-caret-down"></i></p>
            </div>
        </div>
        <div class="main__content-right">

            <div>
                <h4>Cập nhật thông tin đơn hàng</h4>
                <?php
                if ($data) {
                    //print_r($soluong);
                    //print_r($value);
                   foreach ($data as $key => $value) {
                    //print_r($value);
                    foreach ($value as $key => $giatri) {
                        print_r('<form class="form__feature" action="/?url=dangnhap/updateStatus" method="POST">
                    <div id="infor_receipt-update">
                        <h5 style="text-align: center;">Thông tin đơn hàng đã cập nhật</h5>
                        <p>ID đơn hàng: ' . $giatri['idhd'] . '</p>
                        <p>Tên: ' . $giatri['hovaten'] . '</p>
                        <p>Địa chỉ: ' . $giatri['diachi'] . '</p>
                        <p>Số điện thoại: ' . $giatri['sodienthoai'] . '</p>
                        <p>Email: ' . $giatri['email'] . '</p>
                        <p>Ghi chú: ' . $giatri['ghichu'] . '</p>
                        <p>Thanh toán: ' . $giatri['thanhtoan'] . '</p>
                        <p>Tổng tiền: ' . $giatri['tongtien'] . '</p>
                        <p>Trạng thái: ' . $giatri['trangthai'] . '</p>
                        </div>
                </form>
                ');
                    }
                   }
                } else {
                    print_r('
                    <div class="form__feature-group">
                       <p>Hiện chưa có đơn hàng</p> 
                    </div>');
                }
                ?>
            </div>
        </div>
    </div>
    <script src="/public/js/admin.js"></script>
</body>

</html>