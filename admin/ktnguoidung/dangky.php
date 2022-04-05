<!DOCTYPE html>
<html lang="en">

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <title>Đăng ký-GearShop</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="stylesheet" href="css/css.css" />

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <!-- Custom styles for this template -->
</head>

<body style="background-image: url('../../images/hinhnendengo.jpg');background-repeat:repeat;background-position:right;color:white;">
    <div class="container-fuild" >
    <div class="container" >
        <div class="row" >

            <div class="col-sm-2">
                <?php
                if(isset($_SESSION["nguoidung"]))
                {
                    if($_SESSION["nguoidung"]["loai"]==1)
                    {
                        ?>
                             <h3><a href="?action=xemdanhsach"><i class="fas fa-long-arrow-alt-left"></i>Xem danh sách</a></h3>
                        <?php
                    }
                }
                else{
                    ?>
                         <h3><a href="index.php?action=dangnhap"><i class="fas fa-long-arrow-alt-left"></i>Về trang đăng nhập</a></h3>
                    <?php
                }
                ?>
               
            </div>
            <div class="col-sm-8" >
                <h1>Đăng ký tài khoản</h1>
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Họ và tên</label>
                        <input type="text" class="form-control" name="txthoten" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="txtemail" required>
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input type="password" class="form-control" name="txtmatkhau" required>
                    </div>
                    <div class="form-group">
                        <label>Nhập lại mật khẩu</label>
                        <input type="password" class="form-control" name="txtmatkhau2" required>
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input type="number" class="form-control" name="txtsodienthoai" maxlength="10" required>
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <input type="file" class="form-control" name="filehinhanh1">
                    </div>
                    <?php
                    if (isset($_SESSION["nguoidung"])) {
                        if ($_SESSION["nguoidung"]["loai"] == 1) {
                    ?>
                            <div class="form-group">
                                <label>Quyền</label>
                                <select type="text" class="form-control" name="optquyen">
                                    <option value="1">Quản trị</option>
                                    <option value="2">Nhân viên</option>
                                    <option value="3">Người dùng</option>
                                </select>
                            </div>
                    <?php
                        }
                    }

                    ?>
                    <input type="hidden" name="action" value="themtaikhoan">
                    <input style="width:730px;" type="submit" class="btn btn-primary" value="Đăng ký tài khoản">

                </form>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div>
    </div>
    
</body>
<script>
    <?php if (isset($thongbao)) { ?>
        window.alert("<?php echo $thongbao ?>");
    <?php } ?>
</script>

</html>