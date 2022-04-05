<div class="container-fuild">
  <div class="modal fade" id="fcapnhatthongtin" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">

          <h3 class="modal-title">Hồ sơ cá nhân</h3><button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form method="post" enctype="multipart/form-data">
            <div class="text-center">
              <img class="rounded-circle" src="<?php if ($_SESSION["nguoidung"]["hinhanh"] == "") {
                                                  echo "images/icon/user.jpg";
                                                } else echo $_SESSION["nguoidung"]["hinhanh"]; ?>" width="100px">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input class="form-control" value="<?php echo $_SESSION["nguoidung"]["email"]; ?>" disabled>
              <input type="hidden" class="form-control" type="email" name="txtemail" placeholder="Email" value="<?php echo $_SESSION["nguoidung"]["email"]; ?>">
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
    $(document).ready(function(){
      $('.toast').toast('show');
    });
  </script>
</div>
  <a href="#">
    <img src="images/bannerbot.png" class="img-fluid" style="width: 100%; height: 2rem;"></a>
  <div class="row">

    <div class="col-sm-4">
      <p class="font-weight-bold">Liên hệ: </p>
      <p>Email:<a class="font-weight-bold"> pntuan_19th1@student.agu.edu.vn</a></p>
    </div>

  </div>
</div>