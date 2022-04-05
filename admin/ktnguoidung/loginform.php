<!DOCTYPE html>
<html lang="en">

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">

  <title>Login-GearShop</title>
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
  <link rel="stylesheet" href="css/css.css" />

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  <!-- Custom styles for this template -->
  <link href="../../css/signin.css" rel="stylesheet">
</head>

<body class="text" style="background-image: url('../../images/hinhnendengo.jpg');background-repeat:repeat;background-position:right;">
    <div class="container-fluid">
    <div class="row">
     <a type="button" style="color:royalblue; margin-left: 100px; " width="100px" height="100px" href="../../"><i class="fas fa-arrow-left"></i>Trang chủ</a>
    </div>
     <div class="row">
     <form class="form" style="float:left; padding-left:100px;" method="post">
        <!--<img class="mb-4" src="" alt="" width="72" height="72">-->
        <h1 class="h3 mb-3 font-weight-normal" style="color:crimson; ">Đăng nhập</h1>
        <input type="hidden" name="action" value="xulythem">
        <input class="form-control" style="width: 250pt;" type="text" name="txtemail" placeholder="Email" required>
        <div class="form-row">
          <div class="col-9">
            <input class="form-control ml-4" style="width: 250pt;" type="password" name="txtmatkhau" placeholder="Mật khẩu" required>
          </div>
          <div class="col-3">
            <input type="hidden" name="action" value="xldangnhap">
            <input class="btn btn-info" type="submit" value="Đăng nhập">         
          </div>
        </div>
        <?php
       if(isset($thongbao)){
       ?>
        <p style="color:red;"> <?php echo $thongbao; ?> </p>
        
       <?php
       }
     ?> 
     <a   class="nut" type="button" class="btn btn-primary" data-toggle="modal" data-target="#formforgot">Quên mật khẩu</a></br>
        <a href="index.php?action=dangky">Đăng ký</a>
        <p class="mt-5 mb-3 text-muted text-center">&copy;<i class="fas fa-chalkboard" style="color: red;"></i><a style="color:orangered;" href="../../">GearShop</a> </p>
      </form>
     </div>
     
     </div>
      
     
      
    
    
      
     <div class="modal fade" id="formforgot" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title">Quên mật khẩu</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

              </div>
              <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" type="email" name="txtemail" placeholder="Email đã đăng ký" required>
                  </div>
                  <div class="form-group">
                    <label>Số điện thoại</label>
                    <input class="form-control" type="number" name="txtsodienthoai" placeholder="Số điện thoại đăng ký" required>
                  </div>
                  <div class="form-group">
                    <label>Mật khẩu mới</label>
                    <input class="form-control" type="password" name="txtmatkhaumoi" placeholder="Mật khẩu" required>
                  </div>
                  <div class="form-group">
                    <label> Nhập lại mật khẩu mới</label>
                    <input class="form-control" type="password" name="txtmatkhaumoi2" placeholder="Mật khẩu" required>
                  </div>

                  <div class="form-group">
                    
                    <input type="hidden" name="action" value="forgot">

                    <div type="hidden">
                      <input class="btn btn-primary" type="submit" value="Lưu">
                    </div>



                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
              </div>
            </div>
          </div>
        </div>   
</body>

</html>