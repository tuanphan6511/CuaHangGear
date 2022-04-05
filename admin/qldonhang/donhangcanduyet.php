<?php include("../view/top.php"); ?>

<h3>Đơn hàng cần duyệt</h3>
<br>
<a class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Nhận tất cả đơn hàng</a>
<br><br>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Hỏi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Nhận tất cả đơn hàng
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        <a class="btn btn-primary" href="?action=tiepnhantatca">Chấp nhận</a>
      </div>
    </div>
  </div>
</div>
<table id="phantrang" class="table table-bordered table-hover table-sm mb-0">
  <thead>
    <tr class="bg-primary">
      <th>STT</th>
      <th>Tên người dùng</th>
      <th>SDT</th>
      <th>Địa chỉ</th>
      <th>Giá trị</th>
      <th>Chi tiết đơn</th>
      <th>Tiếp nhận</th>
      
    </tr>
  </thead>
  <tbody>
    <?php
    $stt = 1;
    $dsdonhang = $ct->laydonhangcantiepnhan();
    foreach ($dsdonhang as $d) {

    ?>
      <tr>
        <td><?php echo $d["id"] ?></td>
        <td><?php echo $d["hoten"] ?></td>
        <td><?php echo $d["sodienthoai"] ?></td>
        <td><?php
            foreach ($dsdiachi as $dc) {
              if ($d["diachi_id"] == $dc["id"]) {
                echo $dc["diachi"];
                break;
              }
            }
            ?></td>

        <?php
        $ct = new DONHANGCT();
        $dsdhct = $ct->laydonhangctmh($d["id"]);
        $trangthai = $ct->laytrangthaict($d["id"]);
        ?>


        <td><?php echo  $d["tongtien"]  ?></td>
        <td><?php
            foreach ($dsdhct as $ct) {
              echo $ct["tenmathang"] . " ";
              echo "SL:" . $ct["soluong"] . "</br>";
            }
            ?>

        </td>
        <td><?php $tt = true;
                  $ttt=false;
            foreach ($trangthai as $a) {
              if ($a["trangthai"] == 1 && $a["donhang_id"] == $d["id"]) {
                $tt = false;
                break;
              }
            } 
            foreach ($trangthai as $a) {
              if ($a["trangthai"] == 2 && $a["donhang_id"] == $d["id"]) {
                $ttt = true;
                break;
              }
            }
            ?>
          <?php
          if ($tt == true && $ttt==false) {
          ?>
            <a class="btn btn-success" href="?action=tiepnhan&id=<?php echo $d["id"] ?>"><i class="fas fa-check" style="color:red;"></i>Tiếp nhận đơn<a>
            <!-- href="?action=huydon&id=<?php echo $d["id"] ?>" -->
            <a class="btn btn-warning" data-toggle="modal" data-target="#fhuydon<?php echo $d["id"] ?>"><i class="fas fa-window-close" style="color:red;"></i>Hủy đơn<a>
            <div class="modal fade" id="fhuydon<?php echo $d["id"] ?>" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title">Hồ sơ cá nhân</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

              </div>
              <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                  <div class="form-group">
                   
                    <input class="form-control" type="hidden" name="txtid"  value="<?php echo $d["id"]?>" required>
                  </div>
                  <div class="form-group">
                    <label>Lý do hủy</label>
                    <input class="form-control" type="text" name="txtlido" placeholder="Lí do" required>
                  </div>
                 

                  <div class="form-group">
                    
                    <input type="hidden" name="action" value="huydon">

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
              <?php

            } else {
             
              if($ttt==true)
              {
                ?>
                <b style="color: red;">Đã hủy <i class="fas fa-ban"></i></b>
                <?php
              }else{
              ?>
                
                <b style="color:green;">Đang giao hàng <i class="fas fa-shipping-fast"></i><b>
              <?php
           } } ?>
        </td>
       
        
      </tr>
    <?php
    }
    ?>
  </tbody>

</table>

<script>
  $(document).ready(function() {
    $('#phantrang').DataTable({

      'language': {
        'sProcessing': 'Đang xử lý...',
        'sLengthMenu': 'Hiển thị _MENU_ dòng',
        'sZeroRecords': 'Không tìm thấy dòng nào phù hợp',
        'sInfo': 'Đang xem _START_ đến _END_ trong tổng số _TOTAL_ dòng',
        'sInfoEmpty': 'Đang xem 0 đến 0 trong tổng số 0 dòng',
        'sInfoFiltered': '(được lọc từ _MAX_ dòng)',
        'sInfoPostFix': '',
        'sSearch': 'Tìm kiếm:',
        'sUrl': '',
        'oPaginate': {
          'sFirst': '<i class="fad fa-arrow-alt-to-left"></i>',
          'sPrevious': '<i class="fas fa-backward"></i>',
          'sNext': '<i class="fas fa-forward"></i>',
          'sLast': '<i class="fad fa-arrow-alt-to-right"></i>'

        }
      },
      'order': [
        [0, 'desc']
      ]
    });
  });
</script>
<?php include("../view/bottom.php"); ?>