<?php
    //$isLogin = isset($_SESSION["nguoidung"]);
    // Xét xem có thao tác nào được chọn
    if(isset($_REQUEST["action"])){
        $action = $_REQUEST["action"];
    }else{
        $action="xem";
    }
    
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <i class="fas fa-chalkboard" style="color: red;"></i>
    <a class="navbar-brand" href="index.php" style="color: red;">GearShop</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Trang Chủ <span class="sr-only"></span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Danh mục
                </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php $inv = 1;
                    foreach ($danhmuc as $d) : ?>
                        <a class="dropdown-item" href="?action=group&m=<?php echo $d["id"] ?>"><?php echo $d["tendanhmuc"]; ?></a>


                    <?php endforeach; ?>
                    <a class="dropdown-item" href="#">Xem thêm</a>
                </div>

            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Hãng
                </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php
                    foreach ($hang as $h) : ?>
                        <a class="dropdown-item" href="?action=group&h=<?php echo $h["id"] ?>"><?php echo $h["tenhang"]; ?></a>


                    <?php endforeach; ?>
                    <a class="dropdown-item" href="#">Xem thêm</a>
                </div>

            </li>
            <?php
            if (isset($_SESSION["nguoidung"])) {
                if ($_SESSION["nguoidung"]["loai"] != 3) {
            ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Quản trị
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="admin/qldanhmuc">Quản lý danh mục</a>
                            <a class="dropdown-item" href="admin/qlhang">Quản lý hãng</a>
                            <a class="dropdown-item" href="admin/qlmathang">Quản lý mặt hàng</a>
                            <?php
                                if($_SESSION["nguoidung"]["loai"]==1)
                                {
                                    ?>
                                        <a class="dropdown-item" href="admin/qlnguoidung">Quản lý người dùng</a>
                                    <?php
                                }
                            ?>
                            
                            <a class="dropdown-item" href="#">Xem thêm</a>
                        </div>

                    </li>
            <?php
                }
            }
            ?>

            <!--<a class="btn btn-primary" href="admin/">Quản trị</a>-->
        </ul>
        <div>
            <div id="buttontim"><a class="nav-link" style="color:yellow;"><i class="fas fa-search"></i></a></div>
        </div>
        <div id="formtim" style="float: right;">
            <form action="?action=group" method="POST">
                <input id="txttim" style="width: 400px;" type="text" name="txttimkiem" value="<?php if (isset($_POST["txttimkiem"])) echo $_POST["txttimkiem"]; ?>" placeholder="Tìm kiếm" required autofocus>
                <button id="search" type="submit" class="btn btn-primary" value=""><i class="fas fa-search"></i></button>
            </form>
        </div>
        <a class="nav-link" href="?action=xemgiohang"><i class="fas fa-shopping-cart" style="color:Yellow;"></i><span class="sr-only"></span><sub><span class="badge badge-pill badge-info"><?php echo demhangtronggio(); ?></span></sub></a>
        <?php
        if (isset($_SESSION["nguoidung"]) == null) {
        ?>
            <a class="nav-link" href="admin/"><i class="far fa-user " style="color:red;"></i><span class="sr-only"></span></a>
            
        <?php
        } else {
        ?>
            <!-- khi da dang nhap -->
            
            <div width="200pt" class="dropdown" style="text-align: right;">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <span class="glyphicon glyphicon-user"></span>
                    <?php if ($_SESSION["nguoidung"]["hinhanh"] == null) { ?>
                        <i class='fas fa-user-tie'></i>
                    <?php
                    } else {
                    ?>
                       
                        <img style="float:left;" src='<?php echo $_SESSION["nguoidung"]["hinhanh"] ?>' class='rounded-circle' width="20" width='20'>
                    <?php } ?>
                    <?php
                    if (isset($_SESSION["nguoidung"]))
                        echo "". $_SESSION["nguoidung"]["hoten"];
                    ?>
                    <span class="caret"></span>
                    
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="?action=dsdonhang">
                            <span class="glyphicon glyphicon-edit"></span>Trạng thái đơn hàng</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#fcapnhatthongtin">
                            <span class="glyphicon glyphicon-edit"></span> Hồ sơ cá nhân</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#fdoimatkhau">
                            <span class="glyphicon glyphicon-wrench"></span> Đổi mật khẩu</a></li>
                    <li class="divider"></li>
                    <li><a href="index.php?action=dangxuat"><span class="glyphicon glyphicon-log-out"></span> Thoát</a></li>

                </ul>
           
            </div>
            


            

           
        <?php
        }
        ?>
       

    </div>
 
    <script>
        $(document).ready(function() {
            //Mặc đinh ẩn form
            $("#formtim").hide();

            //Hien thị form khi ấn thêm mới
            $("#buttontim").click(function() {
                $("#formtim").toggle(1000); //toggle nếu ẩn là sẽ hiện và ngược lại
                $("#buttontim").hide();
                $("#txttim").focus();
            });


        });
    </script>
    <br>
   
</nav>
<?php if(isset($thongbao)) 
if($thongbao!=""){ ?>
<div role="alert" aria-live="assertive" aria-atomic="true" class="toast" data-autohide="true" data-delay="2000" style="float:right; width:200px;">
  <div class="toast-header">
    <i class="fas fa-info"></i>
    <strong class="mr-auto">Thông báo</strong>
    <small>Hiện tại</small>
    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="toast-body">
    <?php echo $thongbao ?>
  </div>
</div>
<br>
<?php } ?>

