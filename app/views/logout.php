<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/public/css/Trangchu.css">
    <link rel="stylesheet" href="/public/css/base.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <p style=" font-size: 20px;text-align: right; margin-right: 20px; margin-top:10px;"><a style="text-decoration:none;" href="/?url=dangnhap/dangxuat">Đăng xuất</a></p>
    <div style="width:60%; margin: 0 auto; background-color: #fff;">
        <div >
            <h3 style="font-size: 24px; text-align:center;">ĐƠN HÀNG CỦA BẠN</h3>
            <div>
                <div style="border:1px solid #ccc; border-radius: 2px; box-shadow: 0 0 4px 2px #ddd; margin-bottom: 20px; padding: 20px 10px;">
                    <?php
                    if ($data) {
                        //print_r($soluong);
                        //print_r($value);
                    foreach ($data as $key => $value) {
                        //print_r($value);
                        foreach ($value as $key => $giatri) {
                            print_r('<form class="form__feature" action="/?url=dangnhap/updateStatus" method="POST">
                        <div id="infor_receipt-update">
                            <h5 style="text-align: center; font-size: 24px;">Thông tin đơn hàng</h5>
                            <p style="font-size: 20px;">ID đơn hàng: ' . $giatri['idhd'] . '</p>
                            <p style="font-size: 20px;">Tên: ' . $giatri['hovaten'] . '</p>
                            <p style="font-size: 20px;">Địa chỉ: ' . $giatri['diachi'] . '</p>
                            <p style="font-size: 20px;">Số điện thoại: ' . $giatri['sodienthoai'] . '</p>
                            <p style="font-size: 20px;">Email: ' . $giatri['email'] . '</p>
                            <p style="font-size: 20px;">Ghi chú: ' . $giatri['ghichu'] . '</p>
                            <p style="font-size: 20px;">Thanh toán: ' . $giatri['thanhtoan'] . '</p>
                            <p style="font-size: 20px;">Tổng tiền: ' . $giatri['tongtien'] . '</p>
                            <p style="font-size: 20px;">Trạng thái: ' . $giatri['trangthai'] . '</p>
                            </div>
                    </form>
                    <hr>
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
    </div>
</body>
</html>