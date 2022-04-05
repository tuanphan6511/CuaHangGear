<?php include("../view/top.php"); 

?>

<h3>Danh sách người dùng</h3>
<a class="btn btn-primary" href="?action=dangky"><i class="fas fa-plus"></i>Thêm người dùng</a>
<table id="phantrang" class="table table-bordered table-hover table-sm mb-0">
<thead>
    <tr class="bg-primary">
        <th>STT</th>
        <th>Email</th>
        <th>Tên</th>
        <th>Phân quyền</th>
        <th>Mật khẩu</th>
        <th>Trạngthái</th>
        <th>Khóa</th>
    </tr>
</thead>
<tbody>
    <?php
        $stt=1;
        foreach($nguoidung as $nd):
    ?>
        <tr>
        <td width="5%"><?php echo $stt;$stt++; ?></td>
        <td width="20%"><b><?php echo $nd["email"]; ?></b></td>
        <td width="30%"><?php echo $nd["hoten"]; ?></td>
        <td width="10%" height="50px"><?php if ($nd["loai"] == 1) 
                        echo "Quản trị";
                elseif ($nd["loai"] == 2) echo "Nhân viên";
                else echo "Khách hàng"; ?>
                <?php if($nd["id"]!=$_SESSION["nguoidung"]["id"]){ ?>
                    <?php if($nd["loai"]>1){ ?>
                    <a style="float:right;" href="?action=thangcap&id=<?php echo $nd["id"];?>"><i class="fas fa-chevron-up"></i></a><br>
                    <?php } if($nd["loai"]<3){ ?>
                    <a style="float:right;" href="?action=hacap&id=<?php echo $nd["id"];?>"><i class="fas fa-chevron-down"></i></a>
                    <?php }} ?>
        </td>
        <td width="3%" style="text-align:center;">
            <?php 
                if($nd["email"]!=$_SESSION["nguoidung"]["email"])
                {
            ?> 
            <form method="post">
                <input type="hidden" name="txtid" value="<?php echo $nd["id"]; ?>">
                <input type="hidden" name="txtsdt" value="<?php echo $nd["sodienthoai"]; ?>">
                <input type="hidden" name="action" value="forgot">
               
                <button type="submit" class="btn btn-primary"><i class="fas fa-undo"></i></button>
    
            </form>
            <?php } ?>
        </td>

        <td width="10%" style="text-align:right;"><?php if ($nd["loai"] != 1) {
                    if ($nd["trangthai"] == 1) echo "Kích hoạt";
                    else echo "Khóa";
                } ?></td>
        <td width="10%"><?php
                if ($nd["loai"] != 1) {
                    if ($nd["trangthai"] == 1) { ?>
                        <a class="btn btn-light" href="?action=khoa&trangthai=0&id=<?php echo $nd["id"];?>"><i class="fas fa-user-lock" style="color:red;"></i></a></td>
        

        </tr>
        <?php
                    } else { ?>
        <a class="btn btn-light" style="color:green;" href="?action=khoa&trangthai=1&id=<?php echo $nd["id"];
                                                ?>"><i class="fas fa-lock-open" ></i> </a></td>
        </tr>
    <?php 
                    }}
        endforeach;
     ?>
</tbody>
</table>
<script>
			$(document).ready( function () {
				$('#phantrang').DataTable({
          'language': {
						'sProcessing':   'Đang xử lý...',
						'sLengthMenu':   'Hiển thị _MENU_ dòng',
						'sZeroRecords':  'Không tìm thấy dòng nào phù hợp',
						'sInfo':         'Đang xem _START_ đến _END_ trong tổng số _TOTAL_ dòng',
						'sInfoEmpty':    'Đang xem 0 đến 0 trong tổng số 0 dòng',
						'sInfoFiltered': '(được lọc từ _MAX_ dòng)',
						'sInfoPostFix':  '',
						'sSearch':       'Tìm kiếm:',
						'sUrl':          '',
						'oPaginate': {
							'sFirst':    '<i class="fad fa-arrow-alt-to-left"></i>',
							'sPrevious': '<i class="fas fa-backward"></i>',
							'sNext':     '<i class="fas fa-forward"></i>',
							'sLast':     '<i class="fad fa-arrow-alt-to-right"></i>'
						}
					}
        });
			} );
</script>
<script>
    <?php if (isset($thongbao)) { ?>
        window.alert("<?php echo $thongbao ?>");
    <?php } ?>
</script>

<?php include("../view/bottom.php"); ?>