<!DOCTYPE html>
<html lang="en">

<head>

  <title>Trang quản trị- GearShop</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/core.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/md5.js"></script>

  <!-- table phantrang -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" />
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

  <style>
    .row.content {
      height: 900px
    }

    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }

    @media screen and (max-width: 767px) {
      .row.content {
        height: auto;
      }
    }

    #qldm:active,
    #qlh:active,
    #qlmh:active {
      background-color: cornflowerblue;

    }

    #qldm,
    #qlh,
    #qlmh {
      transition: font-size 0.5s;
      transition: color 1s;
    }

    #qldm:hover,
    #qlh:hover,
    #qlmh:hover {
      font-size: 15pt;
      color: red;
    }
  </style>
</head>

<body>

  <!-- Menu mh nhỏ - kết thúc -->
  <div class="container-fluid">
    <div class="row content">
      <!-- Menu mh lớn -->
      <img src="../../images/bannerbot.png" class="img-fluid sticky-top" style="width: 100%; height: 2rem;">
      <div class="col-sm-2 sidenav hidden-xs">
        <div>
          <h1><span class="badge badge-danger">Gear</span>Shop</h1>
        </div>
        <div><a class="btn btn-success" href="../../index.php"><i class="far fa-hand-point-left"></i> Giao diện người dùng</a></div>
        <br>
        <p>
          <button style="width: 100%;" class="btn btn-danger" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Trang chủ
          </button>
        </p>
        <div class="collapse" id="collapseExample">
          <div class="card card-body">
            <li><a id="qldm" class="btn btn-link" href="index.php?action=index">Trang chủ quản lý</a>
            </li>
          </div>
        </div>
        <?php
        if (isset($_SESSION["nguoidung"]) && ($_SESSION["nguoidung"]["loai"] == 1||$_SESSION["nguoidung"]["loai"] == 2)) {
        ?>
        <p>
          <button style="width:  100%;" class="btn btn-warning" type="button" data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">
            Bảng điều khiển
          </button>
        </p>
        <div class="collapse" id="collapseExample2">
          <div class="card card-body">
            <li class="content" class="nav-item">
              <a id="qldm" ata-toggle="list" class="btn btn-link" href="../qldanhmuc/">Quản lý danh mục</a>
            </li>
            <li class="content" class="nav-item">
              <a id="qlh" ata-toggle="list" class="btn btn-link" href="../qlhang/">Quản lý tên hãng</a>
            </li>
            <li class="content" class="nav-item">
              <a id="qlmh" ata-toggle="list" class="btn btn-link" href="../qlmathang/">Quản lý mặt hàng</a>
            </li>
            
          </div>
        </div>
        <?php
        }
        ?>
        <?php
        if (isset($_SESSION["nguoidung"]) && $_SESSION["nguoidung"]["loai"] == 1) {
        ?>
          <p>
            <button style="width: 100%;" class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample3" aria-expanded="false" aria-controls="collapseExample">
              Quản trị tài khoản
            </button>
          </p>
          <div class="collapse" id="collapseExample3">
            <div class="card card-body">
              <li class="content" class="nav-item">
                <a id="qldm" ata-toggle="list" class="btn btn-link" href="../qlnguoidung/">Quản lý tài khoản</a>
              </li>
            </div>
          </div>
        <?php
        }
        ?>
        <?php
        if (isset($_SESSION["nguoidung"]) && $_SESSION["nguoidung"]["loai"] == 2) {
        ?>
          <p>
            <button style="width: 100%;" class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample3" aria-expanded="false" aria-controls="collapseExample">
              Quản lý đơn hàng
            </button>
          </p>
          <div class="collapse" id="collapseExample3">
            <div class="card card-body">
              <li class="content" class="nav-item">
                <a ata-toggle="list" class="btn btn-link" href="../qldonhang/index.php?action=donhangcanduyet">Đơn hàng cần duyệt</a>
              </li>
             
            </div>
          </div>
        <?php
        }
        ?>

        <br>
      </div>
      <!-- Menu mh lớn - kết thúc -->
      <br>

      <div class="col-sm-10" style="background-image:url('../../images/background.jpg');background-size: 100% 100%; ">

        <div class="container-fluid sticky-top">


          <div class="dropdown" style="text-align: right;">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
              <span class="glyphicon glyphicon-user"></span>
              <?php if ($_SESSION["nguoidung"]["hinhanh"] == null) { ?>
                <i class='fas fa-user-tie'></i>
              <?php
              } else {
              ?>
                <img src='../../<?php echo $_SESSION["nguoidung"]["hinhanh"] ?>' class='rounded-circle' width="20" width='20'>
              <?php } ?>
              <?php
              if (isset($_SESSION["nguoidung"]))
                echo $_SESSION["nguoidung"]["hoten"];
              ?>
              <span class="caret"></span>
            </a>

            <ul class="dropdown-menu dropdown-menu-right">
              <li class="divider"></li>
              <li><a href="../ktnguoidung/index.php?action=dangxuat" style="color:red;" class="btn"><span class="glyphicon glyphicon-log-out"></span> Thoát</a></li>

            </ul>
          </div>
        </div>

        <div class="modal fade" id="fcapnhatthongtin" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">

                <h3 class="modal-title">Hồ sơ cá nhân</h3><button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                  <div class="text-center">
                    <img class="rounded-circle" src="../../<?php if ($_SESSION["nguoidung"]["hinhanh"] == null) {
                                                            } else echo $_SESSION["nguoidung"]["hinhanh"];  ?>" alt="<?php echo
                                                                                                                      $_SESSION["nguoidung"]["hoten"]; ?>" width="100px">
                  </div>
                  <div class="form-group">
                    <input class="form-control" type="hidden" name="txtemail" placeholder="Email" value="<?php echo $_SESSION["nguoidung"]["email"]; ?>">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" value="<?php echo $_SESSION["nguoidung"]["email"]; ?>" disabled>
                  </div>

                  <div class="form-group">
                    <label>Số điện thoại</label>
                    <input class="form-control" type="number" name="txtdienthoai" placeholder="Email" value="<?php echo $_SESSION["nguoidung"]["sodienthoai"]; ?>">
                  </div>
                  <div class="form-group">
                    <label>Họ tên</label>
                    <input class="form-control" type="text" name="txthoten" placeholder="Họ tên" value="<?php echo $_SESSION["nguoidung"]["hoten"]; ?>" required>
                  </div>
                  <div class="form-group">
                    <label>Đổi hình đại diện</label>
                    <input type="file" name="fhinh">
                  </div>
                  <div class="form-group">
                    <input type="hidden" name="txtid" value="<?php echo $_SESSION["nguoidung"]["id"]; ?>">

                    <input type="hidden" name="txthinhanh" value="<?php echo $_SESSION["nguoidung"]["hinhanh"]; ?>">
                    <input type="hidden" name="action" value="capnhat">
                    <input class="btn btn-primary" type="submit" value="Lưu">
                    <input class="btn btn-warning" type="reset" value="Hủy">
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="fdoimatkhau" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title">Hồ sơ cá nhân</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

              </div>
              <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                  <input class="form-control" type="hidden" name="txtmatkhaucu" value="<?php echo $_SESSION["nguoidung"]["matkhau"]; ?>">
                  <div class="form-group">
                    <label>Mật khẩu cũ</label>
                    <input class="form-control" type="password" name="txtmatkhaucunhap" placeholder="Mật khẩu" required>
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
                    <input type="hidden" name="txtemail" value="<?php echo $_SESSION["nguoidung"]["email"]; ?>">
                    <input type="hidden" name="action" value="doimatkhau">

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
        <script>
          /*function ktmkc(){
              var mkc1= document.getElementById("mkc1").value;
              var mkc2= CryptoJS.MD5(document.getElementById("mkc2").value).toString();
              
              if (mkc1!=mkc2) {
                  
              } 
            }
            function password() {
              var mkc1= document.getElementById("mkc1").value;
              var mkc2= CryptoJS.MD5(document.getElementById("mkc2").value).toString();
              var pw1 = document.getElementById("password").value;
              var pw2 = document.getElementById("cpassword").value;
              if (pw1==pw2 && mkc1==mkc2 ) {
                  
              } 
          }*/
        </script>