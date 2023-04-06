<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/public/css/dangnhapuser.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/public/css/Trangchu.css">
    <link rel="stylesheet" href="/public/css/base.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php
        include 'app/views/layout/header.php'
    ?>
    <div style="width:500px; margin: 50px auto 50px; background-color: rgb(236, 234, 234); padding: 20px; border-radius: 4px;">
        <div id="login">
            <h3 style="text-align: center; margin:20px 0 40px;">ĐĂNG NHẬP</h3>
            <form style="font-size: 16px;" action="/?url=dangnhap/userdangnhap" method="POST">
                <!-- Email input -->
                <div class="form-outline mb-4">
                  <input style="font-size: 16px;" type="email" id="form2Example1" name="email" class="form-control" />
                  <label class="form-label" for="form2Example1">Email</label>
                </div>
              
                <!-- Password input -->
                <div class="form-outline mb-4">
                  <input style="font-size: 16px;" type="password" id="form2Example2" name="password" class="form-control" />
                  <label class="form-label" for="form2Example2">Mật khẩu</label>
                </div>
              
                <!-- 2 column grid layout for inline styling -->
                <div class="row mb-4">
                  <div class="col d-flex justify-content-center">
                    <!-- Checkbox -->
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                      <label class="form-check-label" for="form2Example31"> Ghi nhớ tôi </label>
                    </div>
                  </div>
              
                  <div class="col">
                    <!-- Simple link -->
                    <a href="#!">Quên mật khẩu?</a>
                  </div>
                </div>
              
                <!-- Submit button -->
                <input style="font-size: 16px;" type="submit" class="btn btn-primary btn-block mb-4" value="Đăng nhập"></input>
              
                <!-- Register buttons -->
                <div class="text-center">
                  <p>Chưa có tài khoản? <a onclick="dangky()" href="#!">Đăng ký</a></p>
                </div>
              </form>
        </div>
        <div id="signup" style="display: none;">
            <h3 style="text-align: center; margin:20px 0 40px;">ĐĂNG KÝ</h3>
            <form style="font-size: 16px;" action="/?url=dangnhap/dangky" method="post">
                <!-- Email input -->
                <div class="form-outline mb-4">
                <input style="font-size: 16px;" name="email" type="email" id="form2Example1" class="form-control" />
                <label class="form-label" for="form2Example1">Email</label>
                </div>
            
                <!-- Password input -->
                <div class="form-outline mb-4">
                    <input style="font-size: 16px;" name="password" type="password" id="form2Example2" class="form-control" />
                    <label class="form-label" for="form2Example2">Mật khẩu</label>
                </div>

                <div class="form-outline mb-4">
                    <input style="font-size: 16px;" type="password" id="form2Example2" class="form-control" />
                    <label class="form-label" for="form2Example2">Nhập lại mật khẩu</label>
                </div>

                <div class="form-outline mb-4">
                  <input style="font-size: 16px;" name="ten" id="form2Example1" class="form-control" />
                  <label class="form-label" for="form2Example1">Tên đầy đủ</label>
                </div>

                <div class="form-outline mb-4">
                  <input style="font-size: 16px;" name="diachi" id="form2Example1" class="form-control" />
                  <label class="form-label" for="form2Example1">Địa chỉ</label>
                </div>

                <div class="form-outline mb-4">
                  <input style="font-size: 16px;" name="sdt" id="form2Example1" class="form-control" />
                  <label class="form-label" for="form2Example1">Số điện thoại</label>
                </div>
            
                <!-- 2 column grid layout for inline styling -->
            
                <!-- Submit button -->
                <input style="font-size: 16px;" type="submit" class="btn btn-primary btn-block mb-4" value="Đăng ký">
            
                <!-- Register buttons -->
                <!-- <div class="text-center" style="text-transform: upercase;">
                    <p><a href="#!">Đăng nhập</a></p>
                </div> -->
            </form>
        </div>
            
    </div>
    <?php
        include 'app/views/layout/footer.php'
    ?>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="/public/js/dangnhap.js"></script>
</body>
</html>