<?php include("../view/top.php"); ?>

<h3>Quản lý mặt hàng</h3>
<br>
<a class="btn btn-primary" href="index.php?action=them"><i class="fas fa-plus"></i>Thêm mặt hàng</a>
<br>

<table id="phantrang" class="table table-bordered table-hover table-sm mb-0">
<thead>
    <tr class="bg-primary">
        <th>STT</th>
        <th>Tên mặt hàng</th>
        <th>NSX</th>
        <th>Tình trạng</th>
        <th>Giá bán(đ)</th>
        <th>Bảo hành</th>
        <th>Số lượng</th>
        <th>Hình</th>
        <th>Sửa</th>
        <th>Xóa</th>
    </tr>
</thead>
<form method="POST">
<tbody>
    <?php
        $stt=1;
        foreach($mathang as $m):
            $kt1=$mh->kiemtramathangtrongdanhgia($m["id"]); $kt2=$mh->kiemtramathangtrongdonhangct($m["id"]);
    ?>
        <tr>
        <td width="5%"><?php echo $stt;$stt++; ?></td>
        <td width="25%"><a href="../../index.php?action=detail&id=<?php echo $m["id"] ?>"><?php echo $m["tenmathang"];?></a></td>
        <td width="10%"><?php echo $m["nsx"] ?></td>
        <td width="10%"><?php echo $m["tinhtrang"] ?></td>
        <td width="10%"><?php echo number_format($m["giaban"]); ?></td>
        <td width="10%"><?php echo $m["baohanh"] ?></td>
        <td width="10%"><?php echo $m["soluongton"]; ?></td>
        <td width="10%"><img width="50px" src="../../<?php echo $m["hinhanh1"] ?>" ></td>
        <td width="5%"><a href="index.php?action=sua&id=<?php echo $m["id"] ?>"><i class="far fa-edit"></i></a></td>
        
        <td width="5%"><?php if($kt1==0 && $kt2==0){ ?><a data-toggle="modal" data-target="#exampleModal<?php echo $m["id"]; ?>" href=""><i class="far fa-trash-alt"></i></a><?php } ?></td>
                <div class="modal fade" id="exampleModal<?php echo $m["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Cảnh báo</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <img width="100px" src="../../<?php echo $m["hinhanh1"] ?>" >
                            <hr>
                                Bạn có chắc muốn xóa <?php echo $m["tenmathang"] ?> ?
                                
                                
                            </div>
                            <div class="modal-footer">
                                <a class="btn btn-danger" href="index.php?action=xoa&id=<?php echo $m["id"]; ?>">Xóa</a>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
    
    </tr>
    <?php 
        endforeach;
     ?>

</tbody>
</form>
</table>

<a href="#" style="float:right;"><i class="far fa-hand-point-up"></i>Về đầu trang</a>
<?php include("../view/bottom.php"); ?>
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