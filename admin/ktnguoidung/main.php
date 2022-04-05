<?php include("../view/top.php"); ?>
<style>
    .nut {
        width: 300px;
        height: 100px;
        text-align: left;
        background-image: url('../../images/nenadmin.jpg');
        background-size: cover;
        color: burlywood;
        background-position: center;
    }

    .nut:hover {
        background-image: url("../../images/nenadmin1.jpg");
        background-size: cover;
        color: red;
        background-position: center;
        width: 300px;
        height: 100px;
        text-align: left;
        transition-delay: 0.25s;
    }
</style>

<?php if(isset($thongbao)) 
if($thongbao!=""){ ?>
<div role="alert" aria-live="assertive" aria-atomic="true" class="toast2" data-autohide="true" data-delay="2000">
  <div class="toast-header">
    <i class="fas fa-info"></i>
    <strong class="mr-auto">Thông báo</strong>
    <small>Hiện tại</small>
    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast2" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="toast-body">
    <?php echo $thongbao ?>
  </div>
</div>
<br>
<?php } ?>
<!-- style="background-image: url('../../images/nenadmin.jpg');background-size: cover; color:red;background-position: center; text-align:left; width:300px; height:100px;"-->
<h3>Hồ sơ cá nhân</h3>
<a class="nut" type="button" class="btn btn-primary" data-toggle="modal" data-target="#fcapnhatthongtin">Quản lý hồ sơ</a>
<a class="nut" type="button" class="btn btn-primary" data-toggle="modal" data-target="#fdoimatkhau">Đổi mật khẩu</a>
<a class="nut" type="button" class="btn btn-primary" href="index.php?action=dangxuat">Đăng xuất</a>


<?php if (isset($_SESSION["nguoidung"]) && $_SESSION["nguoidung"]["loai"] == 1) {
?>
    <h3>Công cụ nhanh</h3>
    <a class="nut" type="button" class="btn btn-primary" href="index.php?action=dangky">Đăng ký tài khoản</a>
    <a class="nut" type="button" class="btn btn-primary" href="index.php?action=themsanpham">Thêm sản phẩm</a>
<?php
}
?>


<?php include("../view/bottom.php"); ?>